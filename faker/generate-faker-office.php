<?php

    require('vendor/autoload.php');
    require_once('../config/config.php');
    require_once('../config/db.php');
    

    $faker = Faker\Factory::create('en_PH');
    for ($i = 1; $i <= 30; $i++) {

        $officeName = mysqli_real_escape_string($conn, $faker->company);
        $contactnum = mysqli_real_escape_string($conn, $faker->phoneNumber);
        $email = mysqli_real_escape_string($conn, $faker->email);
        $address = mysqli_real_escape_string($conn, $faker->streetAddress);
        $city = mysqli_real_escape_string($conn, $faker->city);
        $country = mysqli_real_escape_string($conn, $faker->country);
        $postal = mysqli_real_escape_string($conn, $faker->postcode);


        $query = "INSERT INTO recordapp_db.office(name, contactnum, email, address, city, country, postal) VALUES ('$officeName','$contactnum','$email','$address','$city', '$country', '$postal')";
        mysqli_query($conn, $query);
    }   

?>