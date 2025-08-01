<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\PersonAttended;
use App\Http\Controllers\PersonAttendedMongo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LpaJobMongoProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 2;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        /* 
        $request = new Request([]);
        
        $person_attended = new PersonAttendedMongo();

        $response = $person_attended->process($request);

        return $response; 
        */

        
        $request = new Request([]);

        /* $person_attended = new PersonAttendedMongo();

        $response = $person_attended->refreshMigrations($request);

        echo json_decode($response);

        if (is_null($response)) {
            // Si los datos no se obtienen, volver a poner el trabajo en la cola
            $this->release(10); // Esperar 10 segundos antes de reintentar
        } else {
            // Procesar los datos obtenidos
            Log::info('Datos obtenidos:' . json_decode($response));
            // Guardar los datos en la base de datos o procesarlos
        } */
        $token = $request->bearerToken() ?? "Bearer 90|ntdy46DZlQkxiEUgvco2iDfARHSzUZYbsV4F9hUy";

        $response = Http::withHeaders([
            'Authorization' => $token, // Reemplaza con tu token real
            'Content-Type' => 'application/json', // Ejemplo de un encabezado adicional, puedes agregar los que necesites
        ])->post('http://localhost/api/mongo/lpa/process', []);

        echo "Response received!";
        echo substr($response->body(), 10);
        echo $response->successful();
        //echo $response->json();
        echo $token;
        //Bearer 90|ntdy46DZlQkxiEUgvco2iDfARHSzUZYbsV4F9hUy
        Log::info('$token' . $token);
        Log::info('successfu' . $response->successful());
        //Log::info('Datos obtenidos:' . json_encode($response->body()));

        // Verificar el estado de la respuesta
        if (strpos($response->body(), 'Es posible que la migracion sea demasiado grande por lo que la informacion sera procesada periodicamente') !== false   ) {
            // La solicitud fue exitosa
            $data = $response->json();
            // Procesa los datos como sea necesario
            return $data;
        } else {
            // La solicitud falló
            // Puedes manejar el error aquí
            $error = $response->body();

            throw ValidationException::withMessages(['your error message' . json_encode($error)]);
        }
        
    }
}
