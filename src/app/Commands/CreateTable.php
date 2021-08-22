<?php

namespace Superhiro\App\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:table {name} {--model=Model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new Laravel LiveWire table component.';

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
     * @return void
     */
    public function handle()
    {
        $stub = File::get(__DIR__ . '/../../resources/stubs/component.php');
        $stub = str_replace('DummyComponent', $this->argument('name'), $stub);
        $stub = str_replace('User', $this->argument('model'), $stub);
        $path = app_path('Http/Livewire/' . $this->argument('name') . '.php');

        File::ensureDirectoryExists(app_path('Http/Livewire'));

        if (!File::exists($path) || $this->confirm($this->argument('name') . ' already exists. Overwrite it?')) {
            File::put($path, $stub);
            $this->info($this->argument('name') . ' was made!');
        }
    }
}
