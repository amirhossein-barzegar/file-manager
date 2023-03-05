<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use League\CommonMark\Normalizer\SlugNormalizer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        $sluger = new SlugNormalizer;
        return [
            'name' => $name = $sluger->normalize(fake()->unique()->name()),
            'type' => $type = fake()->randomElement(['png','jpg','mkv','pdf','pptx']),
            'link' => Str::random(6),
            'size' => 12345,
            'user_id' => $user->id,
            'password' => bcrypt('secret'),
            'file' => 'uploads/'.$name.'.'.$type;
        ];
    }
}
