<?php

namespace App\Http\Controllers;

use App\Models\Mind;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::query()->orderBy("name")->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "Address" => "required",
            "city" => "required",
            "state" => "required",
        ]);
        $user = User::create($request->all());

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = User::query()->where('id', $id)->get();

        return response()->json($user);
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
        $user->name = $request->name ? $request->name : $user->name;
        $user->Address = $request->Address ? $request->Address : $user->Address;
        $user->city = $request->city ? $request->city : $user->city;
        $user->state = $request->state ? $request->state : $user->state;


        if ($user->save()) {
            return response()->json("User " . $request->name . "edited!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        User::destroy($id);

        return response()->json(["message" => "User id " . $id . " remove"]);
    }
}
