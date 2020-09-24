<?php

namespace App\Http\Controllers;

use App\Models\Chicken;
use Illuminate\Http\Request;
use DB;

class ChickenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$chickens = DB::table('chickens')->where('name',$name)->first();
        //return view('chickens', ['chickens' => $chickens]);
        //$chickens = Chicken::take(4)->get();  //::all()  or paginate(2)
        return view('/chickens.chicken', [
            'chickens' => Chicken::orderBy('updated_at', 'desc')->paginate(4)
        ]);  
        //return view('chicken');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('chickens.add');
        //add events/things that happen to them
        //add new chickens
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:chickens|max:100',
            'DOB' => 'required|date',
            'chicken_sex' => 'required',
            'breed' => 'required',
            'egg_color' => 'required',
            'comments' => 'nullable'
        ]);


        
        $chicken = new Chicken();

        $chicken->name = Request('name');
        $chicken->DOB = Request('DOB');
        $chicken->chicken_sex = Request('chicken_sex');
        $chicken->breed = Request('breed');
        $chicken->egg_color = Request('egg_color');
        $chicken->comments = Request('comments');
        $chicken->save();
        

        return back()->with('success', 'Record Created Successfully.');
        //return redirect('/chickens');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chicken  $chicken
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        return view('chickens.profile', [
            'chicken' => Chicken::where('name', $name)->firstOrFail()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chicken  $chicken
     * @return \Illuminate\Http\Response
     */
    public function edit($chicken)
    {
        return view('chickens.edit', ['chicken' => Chicken::where('name', $chicken)->firstOrFail()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chicken  $chicken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $chicken = Chicken::where('name', $name)->first();

        $chicken->name = Request('name');
        if (Request('DOB') !== null) {
            $chicken->DOB = Request('DOB');
        }
        $chicken->DOD = Request('DOD');
        $chicken->breed = Request('breed');
        $chicken->egg_color = Request('egg_color');
        $chicken->comments = Request('comments');

        $chicken->save();


        return redirect('/chickens');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chicken  $chicken
     * @return \Illuminate\Http\Response
     */
    public function destroy(chicken $chicken)
    {
        //
    }
}
