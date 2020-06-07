<?php

namespace App\Option;

use Faker\Factory;

class DataTypeOption
{
    private $choice;
    private $faker;

    public function __construct(string $choice)
    {
        $this->choice = $choice;
        $this->faker = Factory::create();
    }

    public function __toString()
    {
        switch ($this->choice) {
            case 'name':
                return $this->faker->name;
            case 'email':
                return $this->faker->email;
            default:
                return "Moznost '{$this->choice}' neexistuje.";
        }
    }
}
