<?php

$argKeys = array_keys($_GET);
$additionalArgKeys = array_diff($argKeys, array('var'));
var_dump($additionalArgKeys);
