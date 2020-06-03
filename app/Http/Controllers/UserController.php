<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function setRole(Request $request) {
        session(['role' => $request->role]);

        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        return view('user.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            return redirect('/user/create')
                ->withErrors(['msg' => 'Пользователь с таким паспортом уже существует!'])
                ->withInput($request->input());
        }
        else {
            $user = User::create([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'patronymic' => $request->patronymic,
                'serial' => $request->serial,
                'number' => $request->number,
                'gender' => $request->gender,
                'active' => true,
                'is_patient' => $request->is_patient == 'on' ? true : false,
                'is_practitioner' => $request->is_practitioner == 'on' ? true : false,
                'is_admin' => $request->is_admin == 'on' ? true : false,
            ]);

            if ($user) {
                return redirect('/user');
            }
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
        //
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

        return view('user.edit', ['user' => $user]);
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
            return redirect('/user/' . $id . '/edit')
                ->withErrors(['msg' => 'Пользователь с таким паспортом уже существует!',]);
        }
        else {

            $user->lastname = $request->lastname;
            $user->firstname = $request->firstname;
            $user->patronymic = $request->patronymic;
            $user->serial = empty($request->serial) ? null : trim($request->serial);
            $user->number = $request->number;
            $user->gender = $request->gender;
            $user->active = $request->active == 'on' ? true : false;
            $user->is_patient = $request->is_patient == 'on' ? true : false;
            $user->is_practitioner = $request->is_practitioner == 'on' ? true : false;
            $user->is_admin = $request->is_admin == 'on' ? true : false;

            $user->save();

            return redirect('/user');
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
