<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
  public function index()
  {
    $user_id = Auth::user()->id;
        $houses = House::select('id','user_id','title','cover_image','description', 'rooms','sq_meters','beds','bathrooms','address')
        ->with('extras:id,name,color,icon,icon_vue', 'sponsorships:id,name,price,duration')
        ->orderby('id', 'desc')
        ->where('user_id', $user_id)
        ->paginate(12);
        foreach ($houses as $house) {
            $house->description = strlen($house->description) > 100 ? substr($house->description, 0, 100) . '...' : $house->description;
        }
        return view("admin.houses.index", compact("houses"));
  }
}