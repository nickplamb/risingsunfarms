<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/pets.pets', [
            'pets' => Pet::orderBy('created_at', 'desc')->get()
        ]); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('pets.add');
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
            'DOD' => 'nullable|date'
            '' => 'required',
            'breed' => 'required',
            'egg_color' => 'required',
            'chicken_photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'comments' => 'nullable'
        ]);
        
        
        $chicken = new Chicken();

        $chicken->name = Request('name');
        $chicken->DOB = Request('DOB');
        $chicken->chicken_sex = Request('chicken_sex');
        $chicken->breed = Request('breed');
        $chicken->egg_color = Request('egg_color');
        $chicken->comments = Request('comments');

        if ($request->has('chicken_photo')) {
            $image = Request('chicken_photo');
            $extension = Request('chicken_photo')->extension();             
            $name = Request('name').'_'.time().'.'.$extension;
            $path = $image->storePubliclyAs('images/chickens', $name);
        }
        $chicken->photo_url = $path;

        $chicken->save();
        

        return back()->with('success', 'Record Created Successfully.');

        // 'name' 
        // 'DOB'
        // 'DOD'
        // 'species'
        // 'breed'
        // 'favorites'
        // 'dislikes'
        // 'origin_story'
        // 'locations'
        // 'description'
        // 'photo_url'
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coop  $coop
     * @return \Illuminate\Http\Response
     */
    public function show(Coop $coop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coop  $coop
     * @return \Illuminate\Http\Response
     */
    public function edit(Coop $coop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coop  $coop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coop $coop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coop  $coop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coop $coop)
    {
        //
    }}
