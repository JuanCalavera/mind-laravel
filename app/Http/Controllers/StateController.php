<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->select("state")->orderBy("state")->get();
        return response()->json($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = User::query()->select("state")->where('id', $id)->get();

        return response()->json($user);
    }

    public function countState()
    {
        $states = User::query()->select("state")->orderBy("state")->distinct()->get();

        foreach($states as $state){
            $count[$state->state] = User::query()->where("state", $state->state)->count();
        }
        
        return response()->json($count);
    }

}
