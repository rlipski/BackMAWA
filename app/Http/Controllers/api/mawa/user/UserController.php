<?php

namespace App\Http\Controllers\api\mawa\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  User::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return  User::find($id);
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
          $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'unique:users,phone,'.$id,
            'city' => 'required_with_all:zip_code,street,building_number',
            'zip_code' => 'required_with_all:city,street,building_number',
            'street' => 'required_with_all:city,zip_code,building_number',
            'building_number' => 'required_with_all:city,zip_code,street',
            'apartment_number' => 'required_with_all:city,zip_code,street,building_number',
            ]);

        $user = User::whereId($id)->update([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'city' => $request->city,
          'zip_code' => $request->zip_code,
          'street' => $request->street,
          'building_number' => $request->building_number,
          'apartment_number' => $request->apartment_number,
          ]);

      $accessToken = Auth::user()->createToken('authToken')->accessToken;

      return response(['user' => User::find($id), 'access_token' => $accessToken]);
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
