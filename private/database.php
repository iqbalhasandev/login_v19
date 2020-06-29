<?php

require_once 'db_credentials.php';

function db_connect()
{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // confirm($connection);
    return $connection;
}

function confirm($connection)
{
    if ($connection) {
        echo 'successful';
    } else {
        echo 'failed';
    }

}