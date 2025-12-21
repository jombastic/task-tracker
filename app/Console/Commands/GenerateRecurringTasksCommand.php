<?php

namespace App\Console\Commands;

use App\Services\RecurringTaskGenerator;
use Illuminate\Console\Command;

class GenerateRecurringTasksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-recurring-tasks {--date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate recurring taks';

    /**
     * Execute the console command.
     */
    public function handle(RecurringTaskGenerator $generator)
    {
        $date = $this->option('date')
            ? now()->parse($this->option('date'))
            : now();

        $count = $generator->generateForDate($date);

        $this->info("✔ {$count} recurring tasks generated.");

        return self::SUCCESS;
    }
}
