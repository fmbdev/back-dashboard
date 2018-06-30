<?php

namespace App\Http\Controllers\Permissions;

use App\Executives;
use App\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    /**
     * Return a listing of the resource.
     *
     */
    public function setPermissions(Request $request)
    {
        $table = $request->input('table');
        $fields = implode(', ', $request->input('fields'));
        $executiveId = $request->input('executiveId');

        $register = DB::table('permissions')->where(['table' => $table, 'executiveId' => $executiveId])->get();
        if(count($register) > 0){
            $permission = DB::table('permissions')->where(['table' => $table, 'executiveId' => $executiveId])->update(
                array(
                    'table' => $table,
                    'fields' => $fields,
                    'executiveId' => $executiveId
                )
            );
        }else{
            $permission = Permissions::create([
               'table' => $table,
               'fields' => $fields,
               'executiveId' => $executiveId
            ]);
        }

         if($permission){
            return response()->json(['message' => 'Correctly assigned permission.'], 200);
        }else{
            return response()->json(['message' => 'The permission could not be created.'], 404);
        }
    }

    /**
     * Return a listing of executive permissions.
     *
     */
    public function getExecutivePermissions($id){
        $executive = Executives::find($id);
        if($executive){
            $executive->permissions;
            return response()->json($executive, 200);
        }else{
            return response()->json(['message' => 'There are no permissions assigned for this executive.'], 401);
        }
    }

    public function deleteExecutivePermission($id){
        if(Permissions::find($id)->delete()){
            return response()->json(['message' => 'Permission successfully removed.'], 200);
        }else{
            return response()->json(['message' => 'The permission could not be eliminated'], 401);
        }
    }

}
