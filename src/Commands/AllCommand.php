<?php

namespace Ben182\AutoTranslate\Commands;

use Illuminate\Console\Command;
use Ben182\AutoTranslate\AutoTranslate;
use Illuminate\Support\Arr;

class AllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'autotrans:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $targetLanguages = Arr::wrap(config('auto-translate.target_language'));

        foreach ($targetLanguages as $targetLanguage) {
            $translated = app('auto-translate')->translateSourceTranslations($targetLanguage);

            app('auto-translate')->fillLanguageFiles($targetLanguage, $translated);
        }
    }
}