<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeManager extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:manager {name : The name of the class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new manager class';

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
        $dirName = 'Managers';
        $stub = resource_path('stubs/commands/MakeManager/manager.stub');
        $name = trim($this->argument('name'));

        // Studly Case
        $name = \Str::studly($name);

        // Check for 'Manager' string
        $name = \Str::endsWith($name, 'Manager') ? $name : $name . 'Manager';

        // Insert class name
        $modelTemplate = str_replace(
            ['{{className}}'],
            [$name],
            $this->getStub($stub)
        );

        // Create class file
        file_put_contents(app_path($dirName . "/{$name}.php"), $modelTemplate);

        // Output message
        $this->info("Manager created successfully.");
    }

    protected function getStub($stub)
    {
        return file_get_contents($stub);
    }
}
