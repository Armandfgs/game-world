<?php
    //include "registerAccount.php";

    session_start();

    require '../phpmongodb/vendor/autoload.php';
    require_once 'functions.php';

    $client = new MongoDB\Client;

    $db = $client->gameworld;

    $collection = $db->accounts;

    $email = filter_input(INPUT_POST, 'emailLogin', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'passwordLogin', FILTER_SANITIZE_STRING);

    $account = [];
    $errors = [];
    if ($email == ''){$errors[] = 'emailLogin';}
    if ($password == ''){$errors[] = 'passwordLogin';}

    if(!checkAccountExist($collection,$email))
    {
        $errors[] = 'emailLogin';
        $errors[] = 'passwordLogin';
    }
    else
    {
        $result = $collection->find(['email' => $email]);

        foreach ($result as $entry) {
            $account = $entry;
        }

        if (!passwordMatch($password, $account['password']))
        {
            $errors[] = 'emailLogin';
            $errors[] = 'passwordLogin';
        }
    }

    if(!empty($errors))
    {
        if(is_ajax_request())
        {
            $resultArray = array('errors' => $errors);
            echo json_encode($resultArray);
        }
        exit;
    }

    if(passwordMatch($password, $account['password']))
    {
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $account["firstName"];
        echo json_encode($account);
    }

    function passwordMatch($enteredPassword,$accountPassword)
    {
        $passwordsMatch = false;

        if(strcmp($enteredPassword,$accountPassword) == 0)
        {
            $passwordsMatch = true;
        }

        return $passwordsMatch;
    }

?>