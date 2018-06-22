<?php

namespace App\Http\Controllers\Tables;

use Illuminate\Http\Request;
use Illuminate\Database\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TablesController extends Controller
{
    /**
     * Display a listing of tables on database.
     *
     */
    public function getAll()
    {
        $tables = DB::select('SHOW TABLES');
        $all_tables = array();

        foreach($tables as $table){
            if($table->Tables_in_analytic_puntoventa != 'executives' && $table->Tables_in_analytic_puntoventa != 'roles' && $table->Tables_in_analytic_puntoventa != 'executives_roles' ){
                array_push($all_tables, array('name' => $table->Tables_in_analytic_puntoventa));
            }
        }
        return response()->json($all_tables, 200);
    }

    /**
     * Return table info.
     *
     */
    public function getInfoTable($table)
    {
      /*$columns = DB::getSchemaBuilder()->getColumnListing($table);*/
       $data = DB::table($table)->get();
       return response()->json($data, 200);
    }

   
}
