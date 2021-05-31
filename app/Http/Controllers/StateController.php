<?php

namespace App\Http\Controllers;

use App\Models\State;
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
        $states = State::query()->orderBy("name")->get();
        return response()->json($states);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);

        $state = State::create($request->all());

        return response()->json($state);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $state = State::query()->orderBy("name")->where('id', $id)->get();

        return response()->json($state);
    }

    public function update(Request $request, $id)
    {
        $state = State::find($id);
        $state->name = $request->name ? $request->name : $state->name;


        if ($state->save()) {
            return response()->json("State " . $request->name . "edited!");
        }
    }

    public function countState()
    {
        $states = State::query()->orderBy("name")->distinct()->get();

        foreach ($states as $state) {
            $count[$state->name] = User::query()
            ->join("states", "states.id", 'users.state')
            ->count();
        }

        return response()->json($count);
    }

    public function destroy(int $id)
    {
        State::destroy($id);

        return response()->json(["message" => "State id: " . $id . " remove"]);
    }
}
