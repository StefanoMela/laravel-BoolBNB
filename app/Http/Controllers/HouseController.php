<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseStoreRequest;
use App\Http\Requests\HouseUpdateRequest;
use App\Models\Extra;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

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
        $extra_house = $house->extras->pluck('id')->toArray();
        return view("admin.houses.create", compact("house", "extras", "extra_house"));
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

        $house = new House;       
        
        $house->user_id = Auth::user()->id;
        if($request->hasFile('cover_image')){
            $data['cover_image'] = Storage::put('uploads/houses/cover_image', $data['cover_image']);
        }           
        
        
        
        // $address = urlencode($data['address']);

        $response = Http::get('https://api.tomtom.com/search/2/geocode/&address=Via Pietro Micca 38 Sassari.json?key=5uNY3BSE9gSMXl2atJSMJJrZAbfvhazZ');

        dd($response);
        
        // $response = Http::get('https://api.tomtom.com/search/2/geocode/'.'.$address.'.'.json', [
        //     'query' => [
        //         'key' => '0rTLHeC6A9vwS6HFMZTV1xEuCF56dTTt',
        //         'limit' => 1,
        //     ]
        // ]);
        // error_log(print_r($response,true));
        // $data = json_decode($response->getBody(), true);
        // $latitude = $data['results'][0]['position']['lat'];
        // $longitude = $data['results'][0]['position']['lon'];
        // $house->latitude = $latitude;
        // $house->longitude = $longitude;

        // $response = Http::get("https://api.tomtom.com/search/2/geocode/&address=Via Pietro Micca 38 Sassari.json?key=5uNY3BSE9gSMXl2atJSMJJrZAbfvhazZ");

        


        $house->fill($data);
        $house->save();
        
        if(Arr::exists($data, "extras")) $house->extras()->attach($data["extras"]);

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
        $user_id = Auth::user()->id;
        if($user_id==$house->user_id){
            $extras = Extra::orderBy('name')->get();
            $extra_house = $house->extras->pluck('id')->toArray();
            return view("admin.houses.edit", compact("house", "extras", "extra_house"));

        }
        return redirect()->route('admin.houses.index');

        
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(HouseUpdateRequest $request, House $house)
    {
        $data = $request->validated();
        
        if ($request->hasFile('cover_image')) {
            if ($house->cover_image) {
                Storage::delete($house->cover_image);
            }
            $data['cover_image'] = Storage::put('uploads/houses/cover_image', $data['cover_image']);
        };

        $house->fill($data);
        $house->save();

        if(Arr::exists($data, "extras"))
            $house->extras()->sync($data["extras"]);
        else
            $house->extras()->detach();
        

        return redirect()->route('admin.houses.index', $house);
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