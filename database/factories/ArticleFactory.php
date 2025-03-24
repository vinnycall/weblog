<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            "body" => $this->faker->paragraph,
            
        ];
    }
}
/* Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text("body")->nullable();
            $table->timestamps();*/