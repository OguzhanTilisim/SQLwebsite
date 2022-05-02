<?php
    $usernameerr = $stateerr = $doberr = $emailerr = $ziperr = $phoneerr = $gendererr = $martialerr = $pswerr = $pswrepeaterr = $fnameerr = $lnameerr = $address1err = $address2err = $cityerr = "";
    $username = $state = $dob = $email = $zip = $phone = $gender = $martial = $psw = $pswrepeat = $fname = $lname = $address1 =  $address2 = $city = "" ;
    $isValid = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $isValid = true;

        $username = clean_input($_POST["username"]);
        if (empty ($username)) {
            $usernameerr = "User name is required";
            $isValid = false;
        } else{
            if(strlen($username) < 6 || strlen($username) > 50) {
                $usernameerr = "Must be 6 - 50 characters long";
                $isValid = false;
            }
        }

        $psw = $_POST["psw"];
        if (empty ($psw)) {
            $pswerr = "Password is required";
            $isValid = false;
        } elseif(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/", $psw)) {
            $pswerr = "Please Enter 1 capital, 1 lowercase, 1 digit, 1 special character";
            $isValid = false;
        } else{
            if(strlen($psw) < 8 || strlen($psw) > 50) {
                $pswerr = "Must be 8 - 50 characters long";
                $isValid = false;
            }
        }
        $pswrepeat = $_POST["pswrepeat"];
        if (empty ($pswrepeat)) {
            $pswrepeaterr = "Repeated Password is required";
            $isValid = false;
        } elseif(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/", $pswrepeat)) {
            $pswrepeaterr = "Please Enter 1 capital, 1 lowercase, 1 digit, 1 special character";
            $isValid = false;
        } else{
            if($psw != $pswrepeat) {
                $pswrepeaterr = "password and password repeat must be same";
                $isValid = false;
            }
        }

        $fname = clean_input($_POST["fname"]);
        if (empty ($fname)) {
            $fnameerr = "First name is required";
            $isValid = false;
        } elseif(!preg_match("/^[a-zA-z]+$/", $fname)) {
            $fnameerr = "Only letters and White space allowed";
            $isValid = false;
        } else{
            if(strlen($fname) < 1 || strlen($fname) > 50) {
                $fnameerr = "Must be 1 - 50 characters long";
                $isValid = false;
            }
        }

        $lname = clean_input($_POST["lname"]);
        if (empty ($lname)) {
            $lnameerr = "Last name is required";
            $isValid = false;
        } elseif(!preg_match("/^[a-zA-z]+$/", $lname)) {
            $lnameerr = "Only letters and White space allowed";
            $isValid = false;
        } else{
            if(strlen($lname) < 1 || strlen($lname) > 50) {
                $lnameerr = "Must be 1 - 50 characters long";
                $isValid = false;
            }
        }

        $address1 = clean_input($_POST["address1"]);
        if (empty ($address1)) {
            $address1err = "Address is required";
            $isValid = false;
        } else{
            if(strlen($address1) < 1 || strlen($address1) > 100) {
                $address1err = "Must be 1 - 100 characters long";
                $isValid = false;
            }
        }

        $address2 = clean_input($_POST["address2"]);
        if(strlen($address2) > 100) {
            $address2err = "Must be maximum 100 characters long";
            $isValid = false;
        }

        $city = clean_input($_POST["city"]);
        if (empty ($city)) {
            $cityerr = "Address is required";
            $isValid = false;
        } else{
            if(strlen($city) < 1 || strlen($city) > 50) {
                $cityerr = "Must be 1 - 50 characters long";
                $isValid = false;
            }
        }

        $zip = clean_input($_POST["zip"]);
        if (empty ($zip)) {
            $ziperr = "zip is required";
            $isValid = false;
        } else{
            if(strlen($zip) < 5 || strlen($zip) > 10) {
                $ziperr = "Must be 5 - 10 characters long";
                $isValid = false;
            }
        }

        $phone = clean_input($_POST["phone"]);
        if (empty ($phone)) {
            $phoneerr = "Phone number is required";
            $isValid = false;
        } else{
            if(strlen($phone) < 1 || strlen($phone) > 12) {
                $phoneerr = "Must be 1 - 12 characters long";
                $isValid = false;
            }
        }

        $state = $_POST["state"];
        if(isset($_POST["state"]) && $_POST["state"] == '0') {
            $stateerr = "Please select a country.";
        }else{
            if(strlen($state) > 52) {
                $stateerr = "Must be maximum 52 characters long";
                $isValid = false;
            }
        }


        $dob = $_POST["dob"];
        if(isset($_POST["dob"]) && $_POST["dob"] == '0') {
            $doberr = "Please enter your date of birth.";
        }

        $email = clean_input($_POST["email"]);
        if (empty ($email)) {
            $emailerr = "Email name is required";
            $isValid = false;
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailerr = "Invalid email format";
                $isValid = false;
            }
        }

        if (isset($_POST["gender"])){
            $gender = clean_input($_POST["gender"]);
            if (empty ($_POST["gender"])) {
                $gendererr = "Gender is required";
                $isValid = false; }
        }
        else {
            $gendererr = "Gender is required";
            $isValid = false;
        }

        if (isset($_POST["martial"])){
            $martial = clean_input($_POST["martial"]);
            if (empty ($_POST["martial"])) {
                $martialerr = "Martial Status is required";
                $isValid = false; }
        }
        else {
            $martialerr = "Martial Status is required";
            $isValid = false;
        }

    }

        function clean_input ($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
?>