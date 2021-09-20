<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
//use Illuminate\Hashing\BcryptHasher\needRehash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=User::all()->where('role','employee');
        return view('employeesf.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employeesf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            
            'email' => 'required',
            'password' => 'required|alphaNum|min:5'
        ]);
        $user = new User([
            'name'=> $request->get('name'),
            'email'=> $request->get('email'),
            'gender'=> $request->get('gender'),
            'address'=> $request->get('address'),
            'mobile'=> $request->get('mobile'),
            'role'=> $request->get('role'),
            'password'=> Hash::make($request->get('password')),
            'remember_token' => Str::random(10),
        ]);
        $user ->save();

        return redirect() ->route('employees.index')->with('success','Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $employee)
    {
        return view('employeesf.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $employee)
    {
        return view('employeesf.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $employee->update($request->all());
        if(Hash::needsRehash($employee->password))
        {
            $pw=bcrypt($request->password);
            $employee->update(array('password' => $pw));
        }
        //$pw=bcrypt($request->password);
        //$employee->update(array('password' => $pw));
        /*
        if (Hash::needsRehash($hashed)) {
            $hashed = Hash::make('plain-text');
        }
        */
        return redirect()->route('employees.index')->with('success','Employee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')-> with('success','Employee deleted successfully!');
    }
}
