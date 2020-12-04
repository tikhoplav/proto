<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'first_name' => $this->faker->firstName($gender),
            'last_name' => $this->faker->lastName,
            'gender' => $gender,
            'title' => rand(0, 10) > 6 ? $this->faker->title($gender) : null,
            'middle_name' => rand(0, 10) > 9
                ? $this->faker->suffix($gender)
                : null
            ,
            'birthday' => $this->faker->dateTimeBetween(
                '-60 years',
                '-16 years'
            ),
        ];
    }
}
