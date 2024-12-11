<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
       
        foreach(User::all() as $user){
            for($i=1; $i < rand(4, 9); $i++){
                Link::factory()->create([
                    'order'=> $i,
                    'user_id'=> $user->id
                ]);
            }
        }
    }
}
