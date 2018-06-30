<?php

namespace App\Http\Controllers\Leads;

use App\Leads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadsController extends Controller
{
    /**
     * Return a listing of the resource.
     *
     */
    public function getAll()
    {   
        $leads = Leads::orderBy('id', 'desc')->get();
        if(count($leads) > 0){
            return response()->json($leads, 200);
        }else{
            return response()->json(['message' => 'there are no leads table records'], 200);
        }
    }

    /**
     * Return a lead base on id
     *
     */
    public function getRegisterLead($id){
        $lead = Leads::find($id);
        if($lead){
            return response()->json($lead, 200);
        }else{
            return response()->json(['message' => 'No record was found'], 401);
        }
    }
}
