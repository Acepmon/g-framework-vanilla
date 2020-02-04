<?php

namespace App\Managers;

use Illuminate\Support\Facades\DB;

class Manager
{
    protected static function handle($callback) {
        try {
            DB::beginTransaction();

            if (is_callable($callback)) {
                return $callback();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
