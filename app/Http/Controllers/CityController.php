<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::query()->orderBy("name")->get();
        return response()->json($cities);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);

        $city = City::create($request->all());

        return response()->json($city);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $city = City::query()->orderBy("name")->where('id', $id)->get();

        return response()->json($city);
    }

    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $city->name = $request->name ? $request->name : $city->name;


        if ($city->save()) {
            return response()->json("City " . $request->name . "edited!");
        }
    }

    public function countCity()
    {
        $cities = City::query()->select("name")->orderBy("name")->distinct()->get();

        foreach ($cities as $city) {
            $count[$city->name] = User::query()
            ->join("cities", "cities.id", 'users.city')
            ->count();
        }

        return response()->json($count);
    }

    public function countState()
    {
        $cities = City::query()->select("state")->orderBy("state")->distinct()->get();

        foreach ($cities as $city) {
            $count[$city->state] = User::query()
            ->join("cities", "cities.id", 'users.city')
            ->count();
        }

        return response()->json($count);
    }

    public function destroy(int $id)
    {
        City::destroy($id);

        return response()->json(["message" => "City id: " . $id . " remove"]);
    }
}
