<?php

namespace Database\Factories;

use App\Models\Notebook;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Notebook::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'full_name' => ucfirst($faker->words(2,true)),
            'company' => ucfirst($faker->word),
            'phone_number' => $faker->e164PhoneNumber,
            'email' => $faker->unique()->safeEmail,
            'date_of_birth' => $faker->date('Y-m-d H:i:s'),
            'photo_path' => $faker->image(),
        ];
    }
}
