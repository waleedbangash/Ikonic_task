<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;

class SugestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $crntUser = auth()->user();
        $sent_request = Friend::where('user_id', $crntUser->id)->pluck('friend_id'); 
        $recived_request = Friend::where('friend_id', $crntUser->id)->pluck('user_id');
        // all the other users, who I have not sent an invitation, and who have not sent me an invitation
        $firends_ids = array_merge($sent_request->toArray(), $recived_request->toArray());
        $sugestionUsers = User::whereNotIn('id', $firends_ids)->whereNot('id', $crntUser->id)->paginate(10);

        if(!request()->page)
        {
            $sugestions = view('render_files.show_sugestion', compact('sugestionUsers'))->render();
        }
        else
        { 
            $sugestions = view('render_files.show_sugestion_data', compact('sugestionUsers'))->render();
        
        }  
        return $sugestions;
    }

   
}

