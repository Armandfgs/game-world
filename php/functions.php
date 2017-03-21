<?php
    function is_ajax_request() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    function checkAccountExist($collection,$email)
    {
        $accountExist = false;

        $result = $collection -> find(["email" => $email]);
        foreach ($result as $entry)
        {
            if (strcmp($entry['email'], $email) === 0) ;
            {
                $accountExist = true;
            }
            return $accountExist;
        }
        return $accountExist;
    }

    function checkAdminAccountExist($collection, $username)
    {
        $accountExist = false;
        $result = $collection -> find(["username" => $username]);
        foreach ($result as $entry) {
            if (strcmp($entry['username'], $username) == 0) ;
            {
                $accountExist = true;
            }
            return $accountExist;
        }
        return $accountExist;
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