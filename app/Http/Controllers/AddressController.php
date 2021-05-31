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
        $addresses = Address::query()->orderBy("name")->get();
        return response()->json($addresses);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "number" => "required",
        ]);

        $address = Address::create($request->all());

        return response()->json($address);
    }

    public function update(Request $request, $id)
    {
        $address = Address::find($id);
        $address->name = $request->name ? $request->name : $address->name;
        $address->number = $request->number ? $request->number : $address->number;
        $address->complement = $request->complement ? $request->complement : $address->complement;


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
        $address = Address::query()->orderBy("name")->where('id', $id)->get();

        return response()->json($address);
    }

    public function destroy(int $id)
    {
        Address::destroy($id);

        return response()->json(["message" => "Address id: " . $id . " remove"]);
    }

}
