<?php

namespace App\Console\Commands;

use App\Models\Skolinimasis;
use Illuminate\Console\Command;

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
            // Send notification to the user about the approaching due date
            // Example: $book->vartotojas->notify(new DueDateApproachingNotification($book));
        }
    }
}
