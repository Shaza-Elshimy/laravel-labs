<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    public function definition(): array
    {
        return [
            //
            'title' =>fake()->text(rand(10,20)),
            'body' => fake()->sentence(rand(3,6)),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
