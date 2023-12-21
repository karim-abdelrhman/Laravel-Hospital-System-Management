<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
         * 1- Get all patients from DB to show them in => index.blade.php
         * */
        $patients = Patient::all();
        return view('patients.index' , compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
         * 1- validate the user input.
         * 2- store the data into database.
         * 3- return to patients page.
         * */
        $request->validate([
           'fname' => 'required|string|max:55|min:3',
            'lname' => 'required|string|max:55|min:3',
            'age' => 'required|numeric',
            'gender' => 'required|max:1',
            'address' => 'required|max:255',
            'phone' => 'required|numeric'
        ]);

        Patient::create([
            'Fname' => $request->fname,
            'Lname' => $request->lname,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        session()->flash('Add', 'تم اضافة المريض بنجاح');
        return redirect('/patients');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $patient = Patient::find($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        /*
         * 1- get the patient by id, then update his data that's came from the request
         * */
        $patient = Patient::where('id' , $id)->firstOrFail();

        $patient->Fname = $request->fname;
        $patient->Lname = $request->lname;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->address = $request->address;
        $patient->phone = $request->phone;

        $patient->save();

        return redirect('/patients');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        /*
         * 1- delete the patient by id.
         * */
        $patient = Patient::where('id' , $request->id)->delete();
        return redirect('/patients');
    }
}
