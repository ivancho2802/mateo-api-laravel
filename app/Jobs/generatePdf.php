<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class generatePdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $paramsPdf;
    private $filename;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Collection $paramsPdf, String $filename)
    {
        //
        $this->paramsPdf = $paramsPdf;
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        echo "trabajo desplegado <br>";

        Log::info("trabajo desplegado");

        $pdf = Pdf::loadView('pdf.formulario', ["data" => $this->paramsPdf]);
        $content = $pdf->download()->getOriginalContent();
        Storage::put($this->filename, $content);
    }
}
