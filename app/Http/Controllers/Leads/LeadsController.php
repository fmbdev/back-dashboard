<?php

namespace App\Http\Controllers\Leads;

use App\Leads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function getAll()
    {   
        $leads = Leads::all();
        if(count($leads) > 0){
            return response()->json($leads, 200);
        }else{
            return response()->json(['message' => 'there are no leads table records'], 200);
        }
    }
}
