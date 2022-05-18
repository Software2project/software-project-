<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $users = User::all();

        if(session()->has('success')) {
            Alert::success('Success', session()->get('success'));
        }

        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session()->has('success')) {
            Alert::success('نجاح', session()->get('success'));
        }

        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->usersRoles();

        dd($request->all());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'department' => $request->department,
            'country' => $request->country,
            'univeristy' => $request->univeristy,
        ]);

        Session()->flash('success' , 'تم إنشاء المستخدم بنجاح!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(session()->has('success')) {
            Alert::success('نجاح', session()->get('success'));
        }

        $user = User::findOrFail($id);

        return view('user.form')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $user = User::findOrFail($id);

        return view('user.view')->with('user', $user);
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

        $this->usersRoles();
        
        $user = User::findOrFail($id);
        
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'department' => $request->department,
            'country' => $request->country,
            'univeristy' => $request->univeristy,
        ])->save();

        Session()->flash('success' , 'تم تعديل المستخدم بنجاح!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy(array('id', $id));
        return response()->json(['status'=>'تم حذف المستخدم بنجاح']);
    }

    public function usersRoles() {
        return request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
    }
}
