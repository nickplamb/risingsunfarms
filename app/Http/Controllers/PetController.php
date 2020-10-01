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
            'pets' => Pet::orderBy('created_at', 'desc')->paginate(4)
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
            'DOD' => 'nullable|date',
            'species' => 'required',
            'breed' => 'nullable',
            'sex' => 'nullable',
            'favorites' => 'nullable',
            'dislikes' => 'nullable',
            'origin_story' => 'nullable',
            'locations' => 'nullable',
            'description' => 'nullable',
            'pet_photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'comments' => 'nullable'
        ]);
        
        
        $pet = new Pet();

        $pet->name = Request('name');
        $pet->DOB = Request('DOB');
        $pet->DOD = Request('DOD');
        $pet->breed = Request('breed');
        $pet->species = Request('species');
        $pet->sex = Request('sex');
        $pet->favorites = Request('favorites');
        $pet->dislikes = Request('dislikes');
        $pet->origin_story = Request('origin_story');
        $pet->locations = Request('locations');
        $pet->description = Request('description');
        $pet->comments = Request('comments');

        if ($request->has('pet_photo')) {
            $image = Request('pet_photo');
            $extension = Request('pet_photo')->extension();             
            $name = Request('name').'_'.time().'.'.$extension;
            $path = $image->storePubliclyAs('images/pets', $name);
        }
        $pet->photo_url = $path;

        $pet->save();
        

        return back()->with('success', 'Record Created Successfully.');

        // 'name' 
        // 'DOB'
        // 'DOD'
        // 'species'
        // 'breed'
        // 'sex'
        // 'favorites'
        // 'dislikes'
        // 'origin_story'
        // 'locations'
        // 'description'
        // 'photo_url'
        // 'comments'
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return view('pets.profile', [
            'pet' => Pet::where('name', $pet)->firstOrFail()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit', ['pet' => Pet::where('name', $pet)->firstOrFail()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:chickens|max:100',
            'DOB' => 'nullable|date',
            'DOD' => 'nullable|date',
            'species' => 'required',
            'breed' => 'nullable',
            'sex' => 'nullable',
            'favorites' => 'nullable',
            'dislikes' => 'nullable',
            'origin_story' => 'nullable',
            'locations' => 'nullable',
            'description' => 'nullable',
            'pet_photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'comments' => 'nullable'
        ]);
        
        
        $pet = Pet::where('name', $pet)->firstOrFail();

        $pet->name = Request('name');
        if (Request('DOB') !== null) {
            $pet->DOB = Request('DOB');
        }
        if (Request('DOD') !== null) {
            $pet->DOD = Request('DOD');
        }
        $pet->breed = Request('breed');
        $pet->species = Request('species');
        $pet->sex = Request('sex');
        $pet->favorites = Request('favorites');
        $pet->dislikes = Request('dislikes');
        $pet->origin_story = Request('origin_story');
        $pet->locations = Request('locations');
        $pet->description = Request('description');
        $pet->comments = Request('comments');

        if ($request->has('pet_photo')) {
            $image = Request('pet_photo');
            $extension = Request('pet_photo')->extension();             
            $name = Request('name').'_'.time().'.'.$extension;
            $path = $image->storePubliclyAs('images/pets', $name);
        }
        $pet->photo_url = $path;

        $pet->save();
        

        return back()->with('success', 'Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }}
