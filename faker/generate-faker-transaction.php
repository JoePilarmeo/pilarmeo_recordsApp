<?php

    require('vendor/autoload.php');
    require_once('../config/config.php');
    require_once('../config/db.php');

    $actions = array('IN', 'OUT', 'COMPLETE');
    $remarks = array('Signed', 'For approval', 'In Progress','Rejected', 'On Hold', '');

    $faker = Faker\Factory::create();
    for ($i = 1; $i <= 200; $i++) {

        $datelog = mysqli_real_escape_string($conn, date("Y-m-d H:i:s"));
        $documentcode = mysqli_real_escape_string($conn, $faker->numberBetween($min = 100, $max = 105));
        $action = mysqli_real_escape_string($conn, $actions[rand(0, 2)]);
        $officeid = mysqli_real_escape_string($conn, $faker->numberBetween($min = 1, $max = 200));
        $employeeid = mysqli_real_escape_string($conn, $faker->numberBetween($min = 1, $max = 200));
        $remark = mysqli_real_escape_string($conn, $remarks[rand(0, 5)]);


        $sql = "INSERT INTO recordapp_db.transaction(datelog, documentcode, action, office_id, employee_id, remarks) VALUES ('$datelog','$documentcode','$action','$officeid','$employeeid','$remark')";
        mysqli_query($conn, $sql);
    }   

?>