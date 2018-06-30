<?php

namespace App\Http\Controllers\Executives;

use App\Executives;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExecutivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function getAll()
    {
        $executives = Executives::all();
        $executives->each(function($executives){
            $executives->roles;
        });

        if(count($executives) > 0){
            return response()->json($executives, 200);
        }else{
            return response()->json(['message' => 'there are no executive table records'], 401);
        }
    }

    public function getExecutiveById($id){
        $executive = Executives::find($id);
        $executive->roles;
        if($executive){
            return response()->json($executive, 200);
        }else{
            return response()->json(['message' => 'No record was found'], 401);
        }
    }

   
}
