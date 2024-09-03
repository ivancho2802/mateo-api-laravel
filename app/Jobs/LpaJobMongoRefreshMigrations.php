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

        $person_attended = new PersonAttendedMongo();

        $response = $person_attended->refreshMigrations($request);

        echo json_decode($response);

        if (is_null($response)) {
            // Si los datos no se obtienen, volver a poner el trabajo en la cola
            $this->release(10); // Esperar 10 segundos antes de reintentar
        } else {
            // Procesar los datos obtenidos
            Log::info('Datos obtenidos:' . json_decode($response));
            // Guardar los datos en la base de datos o procesarlos
        }


        return $response;
    }
}
