<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarAuthPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //------------- car web reset password -----------------------

        $stub = 'stubs/carResetPassword.stub';
        $newStub = resource_path('views/auth/passwords/reset.blade.php');
        $file_content = file_get_contents(resource_path($stub));
        file_put_contents($newStub, $file_content);

        //------------- car web login -----------------------

        $stub = 'stubs/carHomeLogin.stub';
        $newStub = resource_path('views/auth/login.blade.php');
        $file_content = file_get_contents(resource_path($stub));
        file_put_contents($newStub, $file_content);
    }
}
