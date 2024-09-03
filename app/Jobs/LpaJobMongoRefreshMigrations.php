<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Http\Controllers\PersonAttendedMongo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class LpaJobMongoRefreshMigrations implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
    public function  handle()
    {
        //
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
        $token = $request->bearerToken();

        $response = Http::withHeaders([
            'Authorization' => $token, // Reemplaza con tu token real
            'Content-Type' => 'application/json', // Ejemplo de un encabezado adicional, puedes agregar los que necesites
        ])->post('http://localhost/api/mongo/lpa/refreshMigrations', []);

        echo "Response received!";
        //echo substr($response->body(), 10);
        echo $response->successful();
        //echo $response->json();
        echo $token;
        //Bearer 90|ntdy46DZlQkxiEUgvco2iDfARHSzUZYbsV4F9hUy

        // Verificar el estado de la respuesta
        if (strpos($response->body(), '"restanteParte"') !== false) {
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
        //Log::info('Datos obtenidos:' . json_encode($response->body()));
    }
}
