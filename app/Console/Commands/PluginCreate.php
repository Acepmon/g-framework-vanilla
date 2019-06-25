<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;
use File;

class PluginCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:create
    {name : The name of the plugin you want to create}
    {--app : Generates application directories like base laravel}
    {--database : Generates migrations, seeders and factories}
    {--views : Generates js, css, and blade views}
    {--config : Generates a default configuration file for you plugin}
    {--routes : Generates routes for your plugin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new plugin';

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
        $name = $this->argument('name');
        $options = $this->options();
    }

    public function generatePluginCore()
    {
    }

    public function generatePluginApp()
    {
    }

    public function generatePluginDatabase()
    {
    }

    public function generatePluginViews()
    {
    }

    public function generatePluginConfig()
    {
    }

    public function generatePluginRoutes()
    {
    }
}
