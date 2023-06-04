<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sentRequests = Friend::where('user_id', auth()->user()->id)->with('user')->where('status', Friend::INACTIVE)->paginate(10);
      
        if(!request()->page)
        {
            $sentRequest = view('render_files.show_sent_request', compact('sentRequests'))->render();
        }
        else
        {
            $sentRequest = view('render_files.show_sent_request_data', compact('sentRequests'))->render();         
        } 
        return $sentRequest;
    }
 
    public function sendRequest(Request $request)
    {
        try{
            $friendId= decrypt($request->id); 
           
            $crntUser = auth()->user();
            if(!Friend::where(['user_id' => $crntUser->id, 'friend_id' => $friendId])->exists())
            {
                
                $friend = Friend::create([
                    'user_id' => $crntUser->id,
                    'friend_id' => $friendId
                ]);
            return [
                'status' => 200,
                'message' => 'Successfully sended request',
                'data' => $friend,
            ];
            }
            else
            {
                return [
                    'status' => 403,
                    'message' => 'Already sent request',
                ];
            }
          
        }
        catch(\Throwable $th)
        {
            return [
                'status' => 500,
                'error' => 'enternal  server error',
            ];
        }
        
    }

  
    public function RecivedRequest()
    {
        $crntUser = auth()->user();
        $recivedRequests = Friend::where('friend_id', $crntUser->id)->where('status', Friend::INACTIVE)->with('recivedFriend')->paginate(10);
        if(!request()->page)
        {   
            $recivedRequests = view('render_files.show_recived_request', compact('recivedRequests'))->render();
        }
        else
        {
            $recivedRequests = view('render_files.show_recived_request_data', compact('recivedRequests'))->render();
        } 

        return $recivedRequests;
    }

    public function acceptRequest(Request $request)
    {
        $crntUser = auth()->user();
        $id = decrypt($request->id);
        $recivedRequests = Friend::where(['friend_id' => $crntUser->id, 'user_id' => $id]);
        $recivedRequests->update([
            'status' => 1,
        ]);

         //if the current already sent request then it will be update else create
        if(Friend::where(['friend_id' => $id,'user_id' => $crntUser->id,])->exists())
        {
            Friend::where(['friend_id' => $id,'user_id' => $crntUser->id,])->update([
              'status' => 1,
            ]); 
        }
        else
        {
            Friend::create([
                'friend_id' => $id, 
                'user_id' => $crntUser->id,
                'status' => 1,
            ]);
        }
       return[
            'status' => 200,
            'message' => 'Succefully accepted Request',
        ];
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $id = decrypt($id);
            Friend::where(['friend_id' => $id, 'user_id' => auth()->user()->id])->first()->delete();
            return [
             'status' => 200,
             'message' => 'successfully deleted request'
            ];
        }
        catch(Throwable $th)
        {
            return [
                'status' => 500,
                'message' => 'internal error',
               ];
        }
        
    }


}
