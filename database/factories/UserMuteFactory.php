<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserMute;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserMuteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserMute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'muter_user_id' => User::all()->random()->id,
            'muted_user_id' => User::all()->random()->id,
        ];
    }

}
