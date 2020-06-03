<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encounter;
use App\User;

class EncounterController extends Controller
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
    public function create($user_id)
    {
        return view('encounter.create', [
            'user' => User::find($user_id),
            'practitioners' => User::where('is_practitioner', ">=", 1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $encounter = Encounter::create([
            'reason' => $request->reason,
            'practitioner_id' => $request->practitioner_id,
            'patient_id' => $request->patient_id,
            'practitioner_role' => $request->practitioner_role,
            'date' => $request->date
        ]);

        return redirect('/patient/' . $user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $user_id)
    {
        return view('encounter.edit', [
            'encounter' => Encounter::find($id),
            'user' => User::find($user_id),
            'practitioners' => User::where('is_practitioner', ">=", 1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $user_id)
    {
        $encounter = Encounter::find($id);

        $encounter->reason = $request->reason;
        $encounter->practitioner_id = $request->practitioner_id;
        $encounter->patient_id = $request->patient_id;
        $encounter->practitioner_role = $request->practitioner_role;
        $encounter->date = $request->date;

        $encounter->save();

        return redirect('/patient/' . $user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
