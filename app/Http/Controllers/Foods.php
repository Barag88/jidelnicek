<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Foods extends Controller
{
    //
    function dbOperations()
    {
        $data = DB::table('food')
                    ->join('pivot_alergen_food', 'pivot_alergen_food.food_id', '=', 'food.food_id')
                    ->join('alergen', 'alergen.alergen_id', '=', 'pivot_alergen_food.alergen_id')
                    ->join('datumy', 'food.food_id', '=', 'datumy.food_id')
                    //->where('datum', '=', '4')
                    ->select('datumy.datum','datumy.food_id', 'food.food_id as foodId', 'food.food_name as foodName', DB::raw('(GROUP_CONCAT(DISTINCT alergen_name SEPARATOR ", ")) as alergen'))
                    ->groupBy('food.food_id')
                    ->orderBy('datumy.datum')
                    ->get();
        return view('index', ['data'=>$data]);
    }
}
