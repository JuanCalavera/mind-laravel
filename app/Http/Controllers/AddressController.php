<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::query()
            ->join("cities", "cities.id,", "=", "addresses.city_id")
            ->get();

        return response()->json($addresses);
    }

    public function store(Request $request)
    {

        // response()->json([1, 2]);

        $request->validate([
            "street" => "required",
            "number" => "required",
            "neighbor" => "required",
            "zip_code" => "required",
            "city_id" => "required",
            "user_id" => "required",
        ]);

        $address = Address::create($request->all());

        return response()->json($address);
    }

    public function update(Request $request, $id)
    {
        $address = Address::find($id);
        $address->street = $request->street ? $request->street : $address->street;
        $address->number = $request->number ? $request->number : $address->number;
        $address->complement = $request->complement ? $request->complement : $address->complement;
        $address->neighbor = $request->neighbor ? $request->neighbor : $address->neighbor;
        $address->zip_code = $request->zip_code ? $request->zip_code : $address->zip_code;
        $address->city_id = $request->city_id ? $request->city_id : $address->city_id;
        $address->user_id = $request->user_id ? $request->user_id : $address->user_id;


        if ($address->save()) {
            return response()->json("Address " . $request->name . "edited!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $address = Address::query()
            ->orderBy("street")
            ->where('addresses.id', $id)
            ->join("cities", "cities.id,", "=", "addresses.city_id")
            ->get();

        return response()->json($address);
    }

    public function destroy(int $id)
    {
        Address::destroy($id);

        return response()->json(["message" => "Address id: " . $id . " remove"]);
    }
}
