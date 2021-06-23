<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->name,
            'start_date'=>$this->faker->dateTime,
            'deadline'=>$this->faker->dateTime,
            'status'=>$this->faker->randomElement([
                'Not Start',
                'On hold',
            ]),
            'created_at'=>$this->faker->randomElement([now()->subDay(), now()->subDays(3), now()->addDay(), now()]),
        ];
    }
}
