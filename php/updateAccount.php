<?php
    session_start();


    require '../phpmongodb/vendor/autoload.php';
    require_once 'functions.php';

    $client = new MongoDB\Client;

    $manager = new MongoDb\Driver\Manager('mongodb://localhost:27017');
    $bulk = new MongoDB\Driver\BulkWrite;

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'passwordUpdate', FILTER_SANITIZE_STRING);
    $repass = filter_input(INPUT_POST, 'repassUpdate', FILTER_SANITIZE_STRING);
    $sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING);
    $addressLine1 = filter_input(INPUT_POST, 'addressLine1', FILTER_SANITIZE_STRING);
    $addressLine2 = filter_input(INPUT_POST, 'addressLine2', FILTER_SANITIZE_STRING);
    $postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
    $mobileNo = filter_input(INPUT_POST, 'mobileNo', FILTER_SANITIZE_STRING);
    $errors = [];

    if($name == ''){$errors[] = 'name';}
    if($lastName == ''){$errors[] = 'lastName';}
    if($password == ''){$errors[] = 'passwordUpdate';}
    if($repass == ''){$errors[] = 'repassUpdate';}
    if($addressLine1 == ''){$errors[] = 'addressLine1';}
    if($addressLine2 == ''){$errors[] = 'addressLine2';}
    if($postcode == ''){$errors[] = 'postcode';}
    if($city == ''){$errors[] = 'city';}
    if($country == ''){$errors[] = 'country';}
    if($mobileNo == ''){$errors[] = 'mobileNo';}

    if (strcmp($repass, $password) != 0){$errors[] = 'repassUpdate';}

    if(!empty($errors))
    {
        if(is_ajax_request())
        {
            $resultArray = array('errors' => $errors);
            echo json_encode($resultArray);
        }
        exit;
    }

    $account = ['firstName' => $name,
                'lastName' => $lastName,
                'password' => $password,
                'email' =>$_SESSION{"email"},
                'address' => ['address1' => $addressLine1,
                    'address2' => $addressLine2,
                    'postcode' => $postcode,
                    'city' => $city,
                    'country' => $country],
                'mobileNumber' => $mobileNo, 'sex' => $sex,
                'isAdmin' => false];

    $bulk->update(["email" => $_SESSION["email"]], $account);
    $manager->executeBulkWrite('gameworld.accounts', $bulk);

    $_SESSION["name"] = $name;

    echo json_encode(array('result' => "account added"));

