<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Research;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        return view('research.create', [
            'user' => User::find($user_id),
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
        Research::create([
            'name' => $request->name,
            'result' => $request->result,
            'patient_id' => $request->patient_id,
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
        return view('research.edit', [
            'research' => Research::find($id),
            'user' => User::find($user_id),
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
        $research = Research::find($id);

        $research->name = $request->name;
        $research->result = $request->result;
        $research->patient_id = $request->patient_id;
        $research->date = $request->date;

        $research->save();

        return redirect('/patient/' . $user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $user_id)
    {
        //
    }
}
