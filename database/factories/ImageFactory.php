<?php

namespace Database\Factories;

use App\Models\AdListing;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    protected static $type;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageable = self::$type ?? User::class;
        //dd($imageable);

        return [
            'imageable_id' => $imageable::factory(),
            'imageable_type' => $imageable,
            'url' => $this->faker->url()
        ];
    }

    public function defineable($model = 'user')
    {
        switch ($model):
            case 'user':
               self::$type =  User::class;
               break;
            case 'AdListing':
                self::$type = AdListing::class;
                break;
            default:
                break;
        endswitch;

        return $this;
    }
}
