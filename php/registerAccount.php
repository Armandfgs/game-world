<?php
    session_start();


    require '../phpmongodb/vendor/autoload.php';
    require_once 'functions.php';

    $client = new MongoDB\Client;

    $db = $client->gameworld;

    $collection = $db->accounts;


    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'emailSignUp', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'passwordSignUp', FILTER_SANITIZE_STRING);
    $repass = filter_input(INPUT_POST, 'repass', FILTER_SANITIZE_STRING);
    $sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING);
    $addressLine1 = filter_input(INPUT_POST, 'addressLine1', FILTER_SANITIZE_STRING);
    $addressLine2 = filter_input(INPUT_POST, 'addressLine2', FILTER_SANITIZE_STRING);
    $postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
    $mobileNo = filter_input(INPUT_POST, 'mobileNo', FILTER_SANITIZE_STRING);
    $isAdmin = filter_input(INPUT_POST, 'isAdmin', FILTER_SANITIZE_STRING);

    $errors = [];
    if($name == ''){$errors[] = 'name';}
    if($lastName == ''){$errors[] = 'lastName';}
    if($email == ''){$errors[] = 'emailSignUp';}
    if($password == ''){$errors[] = 'passwordSignUp';}
    if($repass == ''){$errors[] = 'repass';}
    if($addressLine1 == ''){$errors[] = 'addressLine1';}
    if($addressLine2 == ''){$errors[] = 'addressLine2';}
    if($postcode == ''){$errors[] = 'postcode';}
    if($city == ''){$errors[] = 'city';}
    if($country == ''){$errors[] = 'country';}
    if($mobileNo == ''){$errors[] = 'mobileNo';}

    if (strcmp($repass, $password) != 0){$errors[] = 'repass';}

    if(checkAccountExist($collection,$email)){$errors[] = 'emailSignUp';}

    if(!empty($errors))
    {
        if(is_ajax_request())
        {
            $resultArray = array('errors' => $errors);
            echo json_encode($resultArray);
        }
        exit;
    }



    if (strcmp($password, $repass) == 0 && !checkAccountExist($collection, $email))
    {
        $account = ['firstName' => $name,
                    'lastName' => $lastName,
                    'email' => $email,
                    'password' => $password,
                    'address' => ['address1' => $addressLine1,
                                    'address2' => $addressLine2,
                                    'postcode' => $postcode,
                                    'city' => $city,
                                    'country' => $country],
                    'mobileNumber' => $mobileNo, 'sex' => $sex,
                    'isAdmin' => $isAdmin];

        $returnVal = $collection->insertOne($account);
    }

    if(is_ajax_request())
    {
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
        echo json_encode(array('result' => "account added"));
    }

?>