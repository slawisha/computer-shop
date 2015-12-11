<?php  namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait DbTrait {

    /**
     * Empty table
     *
     * @param $table
     */
    private function cleanTable($table)
    {
        //uncomment if using mysql, comment if using sqlite
        //DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table($table)->truncate();
        //uncomment if using mysql, comment if using sqlite
        //DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}