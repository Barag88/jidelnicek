<?php

namespace App\Http\Controllers;

use App\Models\Alergen;
use App\Models\FoodAlergen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlergenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('alergen')
                    ->get();

        return view('alergenindex', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data2 = DB::table('alergen')
        ->orderBy('id')
        ->get()
        ->last();

        return view('alergencreate', ['data2'=>$data2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pomoc = $request->input('ajdy');
        $pomoc = $pomoc + 1;

        $post = Alergen::create([
            'alergen_name' => $request->input('alergen'),
            'alergen_id' => $pomoc
        ]);

        return redirect('/alergen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alergen  $alergen
     * @return \Illuminate\Http\Response
     */
    public function show(Alergen $alergen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alergen  $alergen
     * @return \Illuminate\Http\Response
     */
    public function edit($alergen)
    {
        $post = Alergen::findOrFail($alergen);

        

        return view('/alergenedit', ['data'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alergen  $alergen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $alergen)
    {
        $post = Alergen::where('alergen_id', $alergen)
                ->update([
                    'alergen_name' => $request->input('alergen')
                ]);

        return redirect('/alergen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alergen  $alergen
     * @return \Illuminate\Http\Response
     */
    public function destroy($alergen)
    {
        $prom = Alergen::where('alergen_id', $alergen)->delete();

        $prom = FoodAlergen::where('alergen_id', $alergen)->delete();

        return redirect('/alergen');
    }
}
