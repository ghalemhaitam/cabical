<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
*/


$factory->define(App\Ville::class, function (Faker\Generator $faker) {

    return [
        'nom' => $faker->unique()->city
    ];

});
/*
$factory->define(App\Patient::class, function (Faker\Generator $faker) {

    return [

        'nom' => $faker->name,
        'prenom' => $faker->lastName,
        'cin' => 'M'.$faker->unique()->numberBetween($min = 100000, $max = 999999),
        'sexe' => $faker->randomElement($array = array ('Masculin','Féminin')),
        'date_naissance' => $faker->dateTime,
        'tel1' => '06'.$faker->unique()->numberBetween($min = 10000000, $max = 99999999),
        'tel2' => '05'.$faker->unique()->numberBetween($min = 10000000, $max = 99999999),
        'email' => $faker->unique()->email,
        'mutuelle' => '---',
        'ville_id' => rand(50,109)

    ];

});
*/
$factory->define(App\RendezVous::class, function (Faker\Generator $faker) {

    return [

        'date_rendez_vous' => $faker->dateTime,
        'accepte' => 'OUI',
        'patient_id' => $faker->unique()->numberBetween($min = 50, $max = 700),
        'motif_id' => rand(1,3),
        'annuller' => 'NON',

    ];

});


/*
 *  Faker Information type random
 *
randomDigit // 7
randomDigitNotNull // 5
randomNumber($nbDigits = NULL) // 79907610
randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) // 48.8932
numberBetween($min = 1000, $max = 9000) // 8567
randomLetter // 'b'
randomElements($array = array ('a','b','c'), $count = 1) // array('c')
randomElement($array = array ('a','b','c')) // 'b'
numerify($string = '###') // '609'
lexify($string = '????') // 'wgts'
bothify($string = '## ??') // '42 jz'
 */