<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
  public function index()
  {
    $user_id = Auth::user()->id;
    $houses = House::select('id','user_id','title','cover_image','description', 'rooms','sq_meters','beds','bathrooms','address')
    ->where('user_id', $user_id)
    ->with('messages:id,text,house_id')
    ->paginate(12);
    foreach ($houses as $house) {
        $house->description = strlen($house->description) > 100 ? substr($house->description, 0, 100) . '...' : $house->description;
    }

    $houses_sponsorship = House::select('id','user_id')
      ->where('user_id', $user_id)
      ->join('house_sponsorship', 'houses.id', '=', 'house_sponsorship.house_id')
      ->select('houses.id')
      ->paginate(12);


    return view('admin.dashboard', compact("houses", "houses_sponsorship"));
  }
}