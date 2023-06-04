<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;

class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crntUser = auth()->user();
        $friendsIds= Friend::where('user_id', $crntUser->id)->where('status', Friend::ACTIVE)->whereNot('friend_id', $crntUser->id)->pluck('friend_id');
        $connections = User::whereIn('id', $friendsIds)->withCount(['friends'=>function($q) use($friendsIds){
                $q->whereIn('friend_id', $friendsIds);
        }])->paginate(10);
       
        if(!request()->page)
        {
            $response = view('render_files.show_connection',compact('connections'))->render();
        }
        else
        {
            
            $response = view('render_files.show_connection_data',compact('connections'))->render();
        
        }  
       return $response;
    }
    
    public function gitCommenConnection($id)
    {
        $frienId = decrypt($id);
        $crntUser = auth()->user();

        $friendsOfFriends = Friend::where('user_id', $frienId)->where('status', Friend::ACTIVE)->pluck('friend_id')->toArray();
        $myFriends = Friend::where('user_id', $crntUser->id)->where('status', Friend::ACTIVE)->pluck('friend_id')->toArray();
       
        $mutualFirends = array_intersect($friendsOfFriends, $myFriends);
        $mutualFirends = User::whereIn('id', $mutualFirends)->paginate(10);

        if(!request()->page)
        {
            $response = view('render_files.show_commen_connection', compact('mutualFirends'))->render();
        }
        else
        {
           
            $response = view('render_files.show_commen_connection_data', compact('mutualFirends'))->render();
        
        } 
        return $response;
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $crntUser = auth()->user();
        Friend::where(['user_id' => $crntUser->id, 'friend_id' => $id])->where('status', Friend::ACTIVE)->first()->delete();
        Friend::where(['friend_id' => $crntUser->id, 'user_id' => $id])->first()->delete();
       return [
        'status' => 200,
       ];
    }
}
