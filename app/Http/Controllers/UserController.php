<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id','name','surname')->where('id','!=',Auth::user()->id)->get();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id,Request $request)
    {
        User::where('id',$user_id)->delete();
        return redirect()
            ->back()
            ->withSuccess('User '.$request->name.' '.$request->surname.' was deleted');
    }

    public function assignAdminRole(Request $request, $user_id)
    {
        User::where('id',$user_id)->first()->assignRole('admin')->removeRole('controller');
        return redirect()
            ->back()
            ->withSuccess('User '.$request->name.' '.$request->surname.' is admin!');
    }

    public function assignControllerRole(Request $request, $user_id)
    {
        User::where('id',$user_id)->first()->assignRole('controller')->removeRole('admin');
        return redirect()
            ->back()
            ->withSuccess('User '.$request->name.' '.$request->surname.' is controller!');
    }
}
