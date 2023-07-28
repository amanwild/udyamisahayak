<?php
// require "./Components/create_session_login_account.php";
// echo" 3Session is Destroyed ";    echo"<br>";
// if (($_SERVER["REQUEST_METHOD"] == "POST") &&  isset($_POST["Logout"])) {

    // echo" Session is Destroyed ";    echo"<br>";

    try {

        //logout.php

        include('./config.php');

        //Reset OAuth access token
        $google_client->revokeToken();

        $_SESSION["loggedout"] = true;
        //Destroy entire session data.

        session_unset();
        session_destroy();
        $Logout_result = 1;
        $login_button = "";
        echo " Session is Destroyed ";
        echo "<br>";

        // echo"Please set Session variables from "set or start session"to log in";    echo"<br>";
        header("location: /udyamisahayak/index.php");
    } catch (\Throwable $th) {
        $Logout_result = 0;
    }
// }
