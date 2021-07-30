<?php

 // error handler

    set_exception_handler(function($e) {
        error_log($e->getMessage());
        exit('Something weird happened');
        //exit($e);
    });

// this is the connection string for the server. no need to change this, it should just work.
    $dsn = 'mysql:dbname=mydb;host=localhost;';

// these variables are required to connect to the database mentioned above.
// please fill these out with the correct information. Don't forget to change your passwords.
    $db_user=''; // DB Username
    $db_password=''; // Password for the DB Username

//options for DB Connection
    $db_options = array(
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //make the default fetch be an associative array
    );


// connecting to the db
    $db = new PDO($dsn, $db_user, $db_password, $db_options);
?>
