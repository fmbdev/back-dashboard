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
            if($table->Tables_in_analytic_puntoventa != 'executives' && 
               $table->Tables_in_analytic_puntoventa != 'roles' && 
               $table->Tables_in_analytic_puntoventa != 'executives_roles' && 
               $table->Tables_in_analytic_puntoventa != 'permissions' &&
               $table->Tables_in_analytic_puntoventa != 'tables' ){
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
       $data = DB::table($table)->get();
       return response()->json($data, 200);
    }

    /**
     * Return table register by id.
     *
     */
    public function getRegisterTable($table, $id){
        $register = DB::table($table)->where('id', $id)->first();
        if($register){
            return response()->json($register, 200);
        }else{
            return response()->json(['message' => 'No record was found'], 401);
        }
    }

    /**
     * Return table fields
     *
     */
    public function getTableFields($table){
        $columns = DB::getSchemaBuilder()->getColumnListing($table);
        return response()->json($columns, 200);
    }

    /**
     * Update table register
     *
     */
    public function updateRegister(Request $request){
        $table = $request->input('table'); 
        $registerId = $request->input('registerId');
        $form = (array) json_decode($request->input('formValues'));

        $register = DB::table($table)->where('id', $registerId)->first();
        if($table != 'leads'){
            if($register){
                $update = DB::table($table)->where('id', $registerId)->update(
                    array(             
                        'Cliente' => $form['Cliente'],
                        'Asesor_Contacto' => $form['Asesor_Contacto'],
                        'Vendedor_atendera' => $form['Vendedor_atendera'],
                        'Medio_gral' => $form['Medio_gral'],
                        'Nombre' => $form['Nombre'],
                        'Fecha_Nacimiento' => $form['Fecha_Nacimiento'],
                        'Telefono_Casa' => $form['Telefono_Casa'],
                        'Telefono_Celular' => $form['Telefono_Celular'],
                        'Tiene_Correo' => $form['Tiene_Correo'],
                        'Email' => $form['Email'],
                        'Lugar_Trabajo' => $form['Lugar_Trabajo'],
                        'Ciudad' => $form['Ciudad'],
                        'Colonia' => $form['Colonia'],
                        'Estado_Civil' => $form['Estado_Civil'],
                        'Valor_Vivienda' => $form['Valor_Vivienda'],
                        'Tipo_Ingreso' => $form['Tipo_Ingreso'],
                        'Semana' => $form['Semana'],
                        'Viable' => $form['Viable'],
                        'Comentarios' => $form['Comentarios'],
                        'Fecha_Registro' => $form['Fecha_Registro']
                    )
                );
            }else{
                return response()->json(['message' => 'The record was not found.'], 401);
            }
        }else{
            if($register){
                $update = DB::table($table)->where('id', $registerId)->update(
                    array(             
                        'Nombre' => $form['Nombre'],
                        'Apellidos' => $form['Apellidos'],
                        'Telefono' => $form['Telefono'],
                        'Celular' => $form['Celular'],
                        'Email' => $form['Email'],
                        'FechaNacimiento' => $form['FechaNacimiento'],
                        'Semana' => $form['Semana'],
                        'Viable' => $form['Viable'],
                        'FechaCreacion' => $form['FechaCreacion'],
                        'DesarrolloInteres' => $form['DesarrolloInteres'],
                        'Tipificacion' => $form['Tipificacion'],
                        'OtraTipificacion' => $form['OtraTipificacion'],
                        'Comentarios' => $form['Comentarios']                      
                    )
                );
            }else{
                return response()->json(['message' => 'The record was not found.'], 401);
            }
        }
        if($update){
            return response()->json(['message' => 'Successfully updated record.'], 200);
        }
    }
}
