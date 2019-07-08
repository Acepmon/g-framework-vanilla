<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EnvFileInstaller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'env:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Env file installer and generates application key for it';

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
        $envExample = base_path('.env.example');
        $envFile = base_path('.env');

        file_put_contents($envFile, file_get_contents($envExample));

        $this->call('key:generate');
    }
}
