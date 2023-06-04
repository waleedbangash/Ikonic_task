<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $crntUser = auth()->user();
        $sentReq = Friend::where('user_id', $crntUser->id);
        $recivedReq = Friend::where('friend_id', $crntUser->id);
        $array1 = $sentReq->pluck('friend_id');
        $array2 = $recivedReq->pluck('user_id');
        $sentRequests = $sentReq->with('user')->where('status', Friend::INACTIVE)->count();
        $recivedRequests = $recivedReq->where('status', Friend::INACTIVE)->with('recivedFriend')->count();
        // all the other users, who I have not sent an invitation, and who have not sent me an invitation
        $friendsIds = array_merge($array1->toArray(), $array2->toArray());
        $sugestionUsers = User::whereNotIn('id', $friendsIds)->whereNot('id', $crntUser->id)->count();
       

        $friendsIds = Friend::where('user_id', $crntUser->id)->where('status', Friend::ACTIVE)->whereNot('friend_id', $crntUser->id)->pluck('friend_id');
        $connections = User::whereIn('id', $friendsIds)->withCount(['friends' => function($q) use($friendsIds){
                $q->whereIn('friend_id', $friendsIds);
        }])->count();
      
        return view('home', compact('sugestionUsers', 'sentRequests', 'recivedRequests', 'connections'));
    }
}
