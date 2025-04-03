<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        if ($users->isEmpty() || $categories->isEmpty()) {
            return;
        }

        
       

        foreach(range(1,10) as $index) {
            $post = Post::factory()->create([
                "user_id" => $users->random()->id,
            ]);
            $post->save();
            $post->categories()->attach(
            $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
       
        
    }
}
