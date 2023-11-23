<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseStoreRequest;
use App\Models\Extra;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $houses = House::orderby('id', 'desc')->where('user_id', $user_id)->paginate(12);
        return view("admin.houses.index", compact("houses"));
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create(House $house)
    {
        $extras = Extra::all();
        return view("admin.houses.create", compact("house", "extras"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HouseStoreRequest $request)
    {
        $data = $request->validated();
        dd($data);

        $house = new House;
        $house->fill($data);
        dd($data);

        
        $house->user_id = Auth::user()->id;
        
        dd($house);
        $house->save();
        if($request->hasFile('cover_image')){
            $data['cover_image'] = Storage::put('uploads/houses/cover_image', $data['cover_image']);
        }
        

        
        if(Arr::exists($data, "extras")) $house->extras()->attach($data["extras"]);
        // $house->extras()->attach($data["extras"]);

        return redirect()->route('admin.houses.index', $house);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        //
    }
}