<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();

        if ($posts->isEmpty() || $users->isEmpty()) {
            return; // Stop de seeder als er geen posts of users zijn
        }
        foreach(range(1, 10) as $index) {
            Comment::factory()->create(
                [
                    'user_id' => $users->random()->id,
                    'post_id' => $posts->random()->id,
                ]
            );
        }
    }
}
