<?php

namespace Database\Factories;
use App\Models\Author;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition()
    {
        return [
            'nameSurname' => $this->faker->name,
            'photo' => $this->faker->imageUrl(400, 600),
            'biography' => $this->faker->paragraph,
            'wikipedia' => $this->faker->url,
        ];
    }
}
