<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\CommenConnection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(DB::table('friends')->count() == 0)
        {
            DB::table('friends')->insert([
            [
                'user_id' => 1,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 3,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 4,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 5,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 6,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 7,
                'status' =>1,
            ],
         
            [
                'user_id' => 1,
                'friend_id' => 8,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 9,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 10,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 11,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 12,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 13,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 14,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 15,
                'status' =>1,
            ],
            [
                'user_id' => 1,
                'friend_id' => 16,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 3,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 4,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 5,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 6,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 7,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 8,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 9,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 10,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 11,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 12,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 13,
                'status' =>1,
            ],
            [
                'user_id' => 2,
                'friend_id' => 14,
                'status' =>1,
            ],
            [
                'user_id' => 3,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 3,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 4,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 4,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 5,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 5,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 6,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 6,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 7,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 7,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 8,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 8,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 9,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 9,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 10,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 10,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 11,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 11,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 12,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 12,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 13,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 13,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 14,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 14,
                'friend_id' => 2,
                'status' =>1,
            ],
            [
                'user_id' => 15,
                'friend_id' => 1,
                'status' =>1,
            ],
            [
                'user_id' => 16,
                'friend_id' => 1,
                'status' =>1,
            ],
            
            


           
          
            
           
        
        ]);
        }
    }
}
