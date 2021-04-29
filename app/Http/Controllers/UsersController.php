<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = User::ofType("tenant")->get();
        $landlords = User::ofType("landlord")->get();
        $agents = User::ofType("agent")->get();
        return view('users.index', compact('tenants', 'landlords','agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->loginUsingId(1);
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->validated();
        $request->save();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, User $user)
    {
        switch ($type){
            case 'tenant':
                return view('users.tenant.index',compact('user'));
                break;
            case 'landlord':
                return view('users.landlord.index',compact('user'));
                break;
            case 'agent':
                return view('users.agent.index',compact('user'));
                break;
            default:
                return view('users.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($type, User $user)
    {
        $data = request()->all();
        if(Arr::exists($data, 'password')){
            $data['password'] = bcrypt(request()->get('password'));
        }
        $user->update($data);
        return redirect(route('users'))->with('message','User profile updated');
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
