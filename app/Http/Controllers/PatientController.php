<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('active', '>=', 1);

        return view('patient.index', [
            'users' => $users->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_user = User::where('serial', empty($request->serial) ? null : trim($request->serial))
            ->where('number', empty($request->number) ? null : trim($request->number))
            ->first();

        if ($check_user) {
            return redirect('/patient/create')
                ->withErrors(['msg' => 'Пациент с таким паспортом уже существует!'])
                ->withInput($request->input());
        }
        else {
            DB::transaction(function() use ($request) {
                $user = User::create([
                    'lastname' => $request->lastname,
                    'firstname' => $request->firstname,
                    'patronymic' => $request->patronymic,
                    'gender' => $request->gender,
                    'serial' => $request->serial,
                    'number' => $request->number,
                    'active' => true,
                    'is_patient' => true,
                    'is_practitioner' => false,
                    'is_admin' => false,
                ]);
    
                $patient = Patient::create([
                    'user_id' => $user->id,
                    'address' => $request->address,
                    'birth_date' => $request->birth_date,
                    'citizenship' => $request->citizenship,
                    'phone' => $request->phone,
                    'enp' => $request->enp,
                    'snils' => $request->snils
                ]);
            });

            return redirect('/patient');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $patient = Patient::where('user_id', $user->id)->first();

        return view('patient.show', [
            'user' => $user,
            'patient' => $patient
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $patient = Patient::where('user_id', $user->id)->first();

        return view('patient.edit', [
            'user' => $user,
            'patient' => $patient
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $check_user = User::where('serial', empty($request->serial) ? null : trim($request->serial))
            ->where('number', empty($request->number) ? null : trim($request->number))
            ->first();

        if (
            empty($request->serial) ? null : trim($request->serial) != $user->serial
            && empty($request->number) ? null : trim($request->number) != $user->number
            && $check_user
        ) {
            return redirect('/patient/' . $id . '/edit')
                ->withErrors(['msg' => 'Пациент с таким паспортом уже существует!',]);
        }
        else {

            DB::transaction(function() use ($user, $request, $id) {
                $user->lastname = $request->lastname;
                $user->firstname = $request->firstname;
                $user->patronymic = $request->patronymic;
                $user->serial = empty($request->serial) ? null : trim($request->serial);
                $user->number = $request->number;

                $user->save();

                Patient::updateOrCreate(
                    [
                        'user_id' => $id
                    ],
                    [
                        'user_id' => $id,
                        'address' => $request->address,
                        'birth_date' => $request->birth_date,
                        'citizenship' => $request->citizenship,
                        'phone' => $request->phone,
                        'enp' => $request->enp,
                        'snils' => $request->snils
                    ]
                );
            });

            return redirect('/patient');
        }
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
