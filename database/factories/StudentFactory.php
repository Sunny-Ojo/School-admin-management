<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        //
         'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'dob' => $faker->date(),
        'gender' => $faker->title(),
        'homeAddress' => $faker->streetAddress(),
        'emailAddress' => $faker->unique()->safeEmail,
        'passport' => 'https://via.placeholder.com/150',
        'phone' => $faker->e164PhoneNumber,
        'fathersName' => $faker->firstNameMale,
        'studentsCourse' => $faker->randomElement(['Computer Science', 'Physics', 'Chemistry', 'Biology']),
    ];
});