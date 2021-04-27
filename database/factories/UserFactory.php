<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    protected static $type;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $userType = self::$type ?? 'tenant';
        $type = "\\App\\Models\\".ucfirst($userType);
        $typeable = $type::factory()->create()->first();

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'typeable_id' => $typeable->id,
            'typeable_type' => $userType
        ];
    }

    public function userType($type)
    {
        self::$type = $type;
        return $this;
    }
}

