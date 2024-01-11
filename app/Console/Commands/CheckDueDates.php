<?php

namespace App\Console\Commands;

use App\Models\Skolinimasis;
use Illuminate\Console\Command;
use App\Http\Controllers\ZinutesController;
use Illuminate\Http\Request;

class CheckDueDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-due-dates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $skolinimaisi = Skolinimasis::whereBetween('pabaigos_data', [
            now()->addDays(3)->startOfDay(),
            now()->addDays(3)->endOfDay()
        ])
            ->whereNull('grazinimo_data')
            ->get();

        foreach ($skolinimaisi as $skolinimasis) {
            $data = [
                'siuncia_vartotojas_id' => $skolinimasis->siuncia_vartotojas_id,
                'gauna_vartotojas_id' => $skolinimasis->gauna_vartotojas_id,
                'tekstas' => 'Your default message or customize as needed',
            ];

            // Create an instance of the ZinutesController
            $zinutesController = new ZinutesController;

            // Create Zinute by calling the create method
            $zinutesController->create(new Request($data));
        }
    }
}
