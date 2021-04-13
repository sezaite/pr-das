<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Reservoir;
use Illuminate\Http\Request;
use Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('name')->get();
        return view('member.index', ['members'=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservoirs = Reservoir::all();
        
        return view('member.create', ['reservoirs' => $reservoirs,]);
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
            'member_name' => ['required'],
            'member_surname' => ['required'],
            'member_city' => ['required'],
            'member_experience' => ['required', 'integer', 'min:1', 'max:100'],
            'member_year' => ['required', 'min:1980', 'integer', 'max:2021'],
            'member_notes' => ['max:5000']
        ],
        [
             'member_name.required' => 'Name is required',
             'member_surname.required' => 'Surname is required',
             'member_city.required' => 'Residency is required', 
             'member_experience.required' => 'Experience is required',
             'member_experience.min' => 'Get out!',
             'member_experience.max' => 'Nobody has that much of experience',
             'member_year.experience' => 'Experience field value must be a number',
             'member_year.required' => 'Year is required',
             'member_year.min' => 'The club opened in 1980',
             'member_year.max' => 'Time travelling is illegal',
             'member_year.integer' => 'Starting date must be a number',
             'member_notes.max' => 'Your poem is a bit too long'
        ]
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


       $member = new member;
       $member->name = $request->member_name;
       $member->surname = $request->member_surname;
       $member->city = $request->member_city;
       $member->experience = $request->member_experience;
       $member->year = $request->member_year;
       $member->notes = $request->member_notes;
       $member->reservoir_id = $request->reservoir_id;
       $member->save();
       return redirect()->route('member.index')->with('success_message', 'New member added suxessfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $reservoirs = Reservoir::all();
        
        return view('member.edit', ['member' => $member, 'reservoirs' => $reservoirs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validator = Validator::make($request->all(),
        [
            'member_name' => ['required'],
            'member_surname' => ['required'],
            'member_city' => ['required'],
            'member_experience' => ['required', 'integer', 'integer', 'min:1', 'max:100'],
            'member_year' => ['required', 'min:1980', 'integer', 'max:2021'],
            'member_notes' => ['max:5000']
        ],
        [
             'member_name.required' => 'Name is required',
             'member_surname.required' => 'Surname is required',
             'member_city.required' => 'Residency is required', 
             'member_experience.required' => 'Experience is required',
             'member_experience.min' => 'Get out!',
             'member_experience.max' => 'Nobody has that much of experience',
             'member_year.experience' => 'Experience field value must be a number',
             'member_year.required' => 'Year is required',
             'member_year.min' => 'The club opened in 1980',
             'member_year.max' => 'Time travelling is illegal',
             'member_year.integer' => 'Starting date must be a number',
             'member_notes.max' => 'Your poem is a bit too long'
        ]
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

       $member->name = $request->member_name;
       $member->surname = $request->member_surname;
       $member->city = $request->member_city;
       $member->experience = $request->member_experience;
       $member->year = $request->member_year;
       $member->notes = $request->member_notes;
       $member->reservoir_id = $request->reservoir_id;
       $member->save();
       return redirect()->route('member.index')->with('success_message', 'Editing went right.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('success_message', 'Member deleted successfully');

    }
}
