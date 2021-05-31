<?php

namespace App\Http\Controllers;

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
        $users = User::query()->select("city")->orderBy("city")->get();
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
        $user = User::query()->select("City")->where('id', $id)->get();

        return response()->json($user);
    }

    public function countCity()
    {
        $cities = User::query()->select("city")->orderBy("city")->distinct()->get();

        foreach ($cities as $city) {
            $count[$city->city] = User::query()->where("city", $city->city)->count();
        }

        return response()->json($count);
    }
}
