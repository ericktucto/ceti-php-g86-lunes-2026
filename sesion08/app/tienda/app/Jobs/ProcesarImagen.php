<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcesarImagen implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $pathImage,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        dump($this->pathImage);
        # procesar imagen
        # 1. hacerlo aspecto 1:1
        # 2. comprimir
    }
}
