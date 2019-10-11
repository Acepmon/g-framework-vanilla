<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AuthPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------------- auth / passwords -----------------------
        if (!file_exists(resource_path('views/auth'))) {
            mkdir(resource_path('views/auth'));
        }

        if (!file_exists(resource_path('views/auth/passwords'))) {
            mkdir(resource_path('views/auth/passwords'));
        }

        //------------- auth - login -----------------------

        $stub = 'stubs/auth/login.stub';
        $newStub = resource_path('views/auth/login.blade.php');
        $file_content = file_get_contents(resource_path($stub));
        file_put_contents($newStub, $file_content);

        //------------- auth - register -----------------------

        $stub = 'stubs/auth/register.stub';
        $newStub = resource_path('views/auth/register.blade.php');
        $file_content = file_get_contents(resource_path($stub));
        file_put_contents($newStub, $file_content);

        //------------- auth - verify -----------------------

        $stub = 'stubs/auth/verify.stub';
        $newStub = resource_path('views/auth/verify.blade.php');
        $file_content = file_get_contents(resource_path($stub));
        file_put_contents($newStub, $file_content);

        //------------- auth - passwords - email -----------------------

        $stub = 'stubs/auth/passwords/email.stub';
        $newStub = resource_path('views/auth/passwords/email.blade.php');
        $file_content = file_get_contents(resource_path($stub));
        file_put_contents($newStub, $file_content);

        //------------- auth - passwords - reset -----------------------

        $stub = 'stubs/auth/passwords/reset.stub';
        $newStub = resource_path('views/auth/passwords/reset.blade.php');
        $file_content = file_get_contents(resource_path($stub));
        file_put_contents($newStub, $file_content);
    }
}
