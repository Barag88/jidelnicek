<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodAlergen;
use App\Models\Datum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('alergen')
                    ->orderBy('alergen_id')
                    ->get();

        $data2 = DB::table('food')
        ->orderBy('id')
        ->get()
        ->last();

        return view('create', ['data'=>$data], ['data2'=>$data2]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'jidlo' => 'required',
            'alergen' => 'required',
            'datum' => 'required'
        ]);

        //ddd($request->input('alergen'));
        //ddd($request->all());

        $pomoc = $request->input('ajdy');
        $pomoc = $pomoc + 1;
        //ddd($pomoc);

        
        $post = Food::create([
            'food_name' => $request->input('jidlo'),
            'food_id' => $pomoc
        ]);

        $pomocna = $request->input('alergen');

        foreach ($pomocna as $item) {
        $post2 = FoodAlergen::create([
            'food_id' => $pomoc,
            'alergen_id' => $item
        ]);
        }

        $post3 = Datum::create([
            'datum' => $request->input('datum'),
            'food_id' => $pomoc
        ]);

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($food)
    {
        $post = Food::findOrFail($food);

        //ddd($post);

        $data = DB::table('alergen')
                    ->orderBy('alergen_id')
                    ->get();

        $data2 = DB::table('pivot_alergen_food')
                    ->where('food_id', '=', $food)
                    ->get();

                    //ddd($data);
                    
        $data3 = DB::table('datumy')
                    ->where('food_id', '=', $food)
                    ->get();

        return view('/edit', ['data'=>$post], ['data2'=>$data, 'data3'=>$data2, 'data4'=>$data3]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $food)
    {
        $post = Food::where('food_id', $food)
            ->update([
            'food_name' => $request->input('jidlo')
        ]);

        $pomocna = $request->input('alergen');

        $prom = FoodAlergen::where('food_id', $food)->delete();

        foreach ($pomocna as $item) {
        $post2 = FoodAlergen::create([
            'food_id' => $request->input('ajdy'),
            'alergen_id' => $item
        ]);
        }

        $post3 = Datum::where('food_id', $food)
            ->update([
            'datum' => $request->input('datum')
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($food)
    {
        $prom = FoodAlergen::where('food_id', $food)->delete();

        $prom2 = Food::where('food_id', $food)->delete();

        $prom3 = Datum::where('food_id', $food)->delete();

        return redirect('/');
    }
}
