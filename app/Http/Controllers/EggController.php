<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use App\Models\Chicken;
use Illuminate\Http\Request;

class EggController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/eggs.eggs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('/eggs.add', [
            'chickens' => Chicken::all() //add more specific query to remove dead or male chickens
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'addMore.*.chicken_name' => 'required',
            'addMore.*.weight' => 'required',
            'addMore.*.comments' => 'nullable',
            'addMore.*.layed_on' => 'required|date'
        ]);

        foreach ($request->addMore as $key => $value) {
            /*$egg = new Egg();

            $egg->chicken_name = Request('chicken_name');
            $egg->weight = Request('weight');
            $egg->layed_on = Request('layed_on'); 
            $egg->comments = Request('comments');
            $egg->save();*/
            Egg::create($value);
        };

        return back()->with('success', 'Record Created Successfully.');

        /**$egg = new Egg();

        $egg->chicken_name = Request('chicken_name');
        $egg->weight = Request('weight');
        $egg->layed_on = Request('layed_on'); 
        $egg->comments = Request('comments');
        $egg->save();**/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Egg  $egg
     * @return \Illuminate\Http\Response
     */
    public function show(Egg $egg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Egg  $egg
     * @return \Illuminate\Http\Response
     */
    public function edit(Egg $egg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Egg  $egg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Egg $egg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Egg  $egg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egg $egg)
    {
        //
    }
}
