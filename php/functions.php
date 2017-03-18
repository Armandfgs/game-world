<?php
    function is_ajax_request() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    function checkAccountExist($collection,$email)
    {
        $result = $collection -> find(["email" => $email]);
        $accountExist = false;

        foreach ($result as $entry)
        {
            if (strcmp($entry['email'], $email) == 0) ;
            {
                $accountExist = true;
            }

            return $accountExist;
        }
    }