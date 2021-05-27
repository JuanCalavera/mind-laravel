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

    public function indexState()
    {
        $users = User::query()->select("state")->orderBy("state")->get();
        return response()->json($users);
    }

    public function indexAddress()
    {
        $users = User::query()->select("Address")->orderBy("Address")->get();
        return response()->json($users);
    }

    public function indexCity()
    {
        $users = User::query()->select("city")->orderBy("city")->get();
        return response()->json($users);
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
    public function showUsers(int $id)
    {
        $user = User::query()->where('id', $id)->get();

        return response()->json($user);
    }

    public function showState(int $id)
    {
        $user = User::query()->select("state")->where('id', $id)->get();

        return response()->json($user);
    }

    public function showCity(int $id)
    {
        $user = User::query()->select("City")->where('id', $id)->get();

        return response()->json($user);
    }

    public function showAddress(int $id)
    {
        $user = User::query()->select("Address")->where('id', $id)->get();

        return response()->json($user);
    }

    public function countCity()
    {
        $cities = User::query()->select("city")->orderBy("city")->distinct()->get();

        foreach($cities as $city){
            $count[$city->city] = User::query()->where("city", $city->city)->count();
        }
        
        return response()->json($count);
    }

    public function countState()
    {
        $states = User::query()->select("state")->orderBy("state")->distinct()->get();

        foreach($states as $state){
            $count[$state->state] = User::query()->where("state", $state->state)->count();
        }
        
        return response()->json($count);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
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
