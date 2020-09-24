<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use App\Models\Chicken;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class EggController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $eggsByDay = Egg::orderBy('layed_on', 'desc')->get()->groupBy(function($date) {
        //        return Carbon::parse($date->layed_on)->format('dmY'); // grouping by years
        //         return Carbon::parse($date->layed_on)->format('m'); // grouping by months
        //        });
        
        // $eggsByDay = Egg::where('layed_on', '>=', Carbon::now()->subMonth())->groupBy(DB::raw('Date(layed_on)'))->get();
        //                 ->orderBy('layed_on', 'DESC')->get();
        // $eggsByDay = Egg::select('weight')->whereDate('layed_on', '>=', Carbon::now()->subMonth(3))->groupBy();
        
        // $eggsByDay = Egg::select(DB::raw('DATE(layed_on) as date'), DB::raw('count(*) as eggsPerDay'))->groupBy('date')->get();

        // $eggsByDay = Egg::where('layed_on', '>=', Carbon::now()->subMonth())->groupBy('layed_on')->get();
        //                 ->orderBy('layed_on', 'DESC')->get();

        $eggsByDay = Egg::where('layed_on', '>=', Carbon::now()->subMonth(6))
                ->groupBy('date')
                ->orderBy('date', 'DESC')->get(array(
                            DB::raw('Date(layed_on) as date'),
                            DB::raw('COUNT(*) as "eggsPerDay"'),
                            DB::raw('AVG(weight) as avgWeight')
                        ));                                 //https://stackoverflow.com/questions/20603075/laravel-eloquent-get-results-grouped-by-days

        // dd($eggsByDay);
        return view('/eggs.eggs', ['eggs' => $eggsByDay]);
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
            // $egg = new Egg();

            // $egg->chicken_name = Request('chicken_name');
            // $egg->weight = Request('weight');
            // $egg->layed_on = Request('layed_on'); 
            // $egg->comments = Request('comments');
            // $egg->save();
            Egg::create($value);
        };

        return back()->with('success', 'Record Created Successfully.');

        // $egg = new Egg();

        // $egg->chicken_name = Request('chicken_name');
        // $egg->weight = Request('weight');
        // $egg->layed_on = Request('layed_on'); 
        // $egg->comments = Request('comments');
        // $egg->save();
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
