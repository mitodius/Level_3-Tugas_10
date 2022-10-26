<?php

    define('DB_SERVER','localhost');
    define('username','root');
    define('password','');
    define('database','pijarcamp');

    $connect = mysqli_connect(DB_SERVER, username, password, database);

    if($connect === false ){
        die("ERROR".mysqli_connect_error());
    }

?>
