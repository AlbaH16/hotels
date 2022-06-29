<?php

use App\Models\Room;
use App\Models\User;
use App\Models\Hotel;
use App\Models\RoomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users',function(){
    return response()->json(User::all(),200);
});

Route::get('hotels',function(){
    return response()->json(Hotel::all(),200);
});

Route::get('rooms/{hotel}',function($hotel){
    return response()->json(Room::where('hotel_id','=',$hotel)->get());
});

Route::get('userStays/{user}',function($user){
    $stays = User::where('id','=',$user)->with(['rooms','rooms.hotel'])->get();
    return response()->json($stays,200);
});


Route::post('storeStay',function(Request $request){
    try {
        $stay = new RoomUser();
        $stay->room_id = $request->room_id;
        $stay->user_id = $request->user_id;
        $stay->save();

        return response()->json($stay,201);

    } catch (\Throwable $th) {
        return response()->json($th->getMessage(),500);
    }


    return response()->json($request->room_id,201);
});
