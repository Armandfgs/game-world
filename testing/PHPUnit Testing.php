<?php
include "../simpletest/autorun.php";
require "../php/functions.php";
require '../phpmongodb/vendor/autoload.php';
include "../includes/common.php";

class passwordChecking extends UnitTestCase
{
    function testMatch()
    {
        $string1 = "Test";
        $string2 = "Test";
        $result = passwordMatch($string1,$string2);
        $this->assertTrue($result);
    }

    function testDoNotMatch()
    {
        $string1 = "Test";
        $string2 = "wont match";
        $result = passwordMatch($string1,$string2);
        $this->assertFalse($result);
    }
}

class accountExists extends UnitTestCase
{
    function testNonExistence()
    {
        $client = new MongoDB\Client;

        $db = $client->gameworld;

        $collection = $db->accounts;

        $result =  checkAccountExist($collection,"thisemailwillneverexist@nonexistent.com");
        $this->assertFalse($result);
    }
    function testExistence()
    {
        $client = new MongoDB\Client;

        $db = $client->gameworld;

        $collection = $db->accounts;

        $result =  checkAccountExist($collection,"armandfgs@gmail.com");
        $this->assertTrue($result);
    }


}

class adminAccountExist extends UnitTestCase
{
    function testNonExistence()
    {
        $client = new MongoDB\Client;

        $db = $client->gameworld;

        $collection = $db->accounts;

        $result =  checkAdminAccountExist($collection,"nonExistentUsername");
        $this->assertFalse($result);
    }
    function testExistence()
    {
        $client = new MongoDB\Client;

        $db = $client->gameworld;

        $collection = $db->accounts;

        $result =  checkAdminAccountExist($collection,"Armandfgs");
        $this->assertTrue($result);
    }
}

class setActive extends UnitTestCase
{
    function testSetActive()
    {
        $result = setActive("Test", "Test");
        $this->assertIdentical(' class="active"', $result);
    }
    function testSetActiveFalse()
    {
        $result = setActive("Test", "not Equal");
        $this->assertNull($result);
    }
}

class cartCount extends UnitTestCase
{
    function testEmptyCart()
    {
        $result = cartCount();
        $this->assertIdentical($result,"");
    }
    function testFullCart()
    {
        $_SESSION["cartCount"] = 999;
        $result = cartCount();
        $this->assertIdentical($result,999);
        unset($_SESSION["cartCount"]);
    }
}

