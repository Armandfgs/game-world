<?php

require '../phpmongodb/vendor/autoload.php';
require_once 'functions.php';

$client = new MongoDB\Client;

$db = $client->gameworld;

$collection = $db->accounts;
print_r($_POST);

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'passwordAdmin', FILTER_SANITIZE_STRING);
print_r($username, $password);
$account = [];
$errors = [];

if ($username == ''){$errors[] = 'username';}
if ($password == ''){$errors[] = 'passwordAdmin';}

if(!checkAdminAccountExist($collection, $username))
{
    $errors[] = 'username';
    $errors[] = 'passwordAdmin';
} else
{
    $result = $collection->find(['username' => $username]);
    foreach ($result as $entry) {
        $account = $entry;
    }

    if (!passwordMatch($password, $account['password']))
    {
        $errors[] = 'username';
        $errors[] = 'passwordAdmin';
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
        $_SESSION["adminName"] = $username;
        echo json_encode($account);
    }
}