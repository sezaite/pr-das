<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Request;
use Validator;

class ReservoirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservoirs = Reservoir::orderBy('title')->get();
        return view('reservoir.index', ['reservoirs'=>$reservoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservoir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     { 
 
        $validator = Validator::make($request->all(),
        [
            'reservoir_title' => ['required', 'min:3', 'max:64'],
            'reservoir_area' => ['required', 'integer', 'min:30', 'max:6400'],
            'reservoir_about' => ['max:5000']
        ],
        [
             'reservoir_title.required' => 'Title is required',
             'reservoir_title.min' => 'Title is too short',
             'reservoir_title.max' => 'Title is too long',
             'reservoir_area.min' => 'Area is too small',
             'reservoir_area.max' => 'Area is too big',
             'reservoir_area.required' => 'Area is required',
             'reservoir_area.integer' => 'Area size must be a number',
             'reservoir_about.max' => 'That was long was not it?',
             
        ]
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
      
    $reservoir = new Reservoir;
    $reservoir->title = $request->reservoir_title;
    $reservoir->area = $request->reservoir_area;
    $reservoir->about = $request->reservoir_about;
    $reservoir->save();
    return redirect()->route('reservoir.index')->with('success_message', 'Added successfully.');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        return view('reservoir.edit', ['reservoir' => $reservoir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $validator = Validator::make($request->all(),
        [
            'reservoir_title' => ['required', 'min:3', 'max:64'],
            'reservoir_area' => ['required', 'integer', 'min:30', 'max:6400'],
            'reservoir_about' => ['max:5000']
        ],
        [
             'reservoir_title.required' => 'Title is required',
             'reservoir_title.min' => 'Title is too short',
             'reservoir_title.max' => 'Title is too long',
             'reservoir_area.min' => 'Area is too small',
             'reservoir_area.max' => 'Area is too big',
             'reservoir_area.required' => 'Area is required',
             'reservoir_area.integer' => 'Area size must be a number',
             'reservoir_about.max' => 'That was long was not it?',
             
        ]
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
       return redirect()->route('reservoir.index')->with('success_message', 'Changed suncceessttully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {
        if($reservoir->reservoirMembers->count()){
            return redirect()->route('reservoir.index')->with('info_message', 'There are some fishermen left there, stop it.');
        }
 
        $reservoir->delete();
        return redirect()->route('reservoir.index')->with('success_message', 'Deletededed successfully.');
    }
}
