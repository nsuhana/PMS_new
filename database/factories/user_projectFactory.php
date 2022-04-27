<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class user_projectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => User::where('status', '1')->join('roles', 'roles.user_id', '=', 'users.id')->where('superuser', '1')->orWhere('admin', '1')->orWhere('staffuser', '1')->inRandomOrder()->first()->id,
            'user_role_project' => 'owner',
        ];
    }
}
