<?php
    try {
        $last_id = $_SESSION["last_id"];
        $conn = new PDO( "mysql:host=$servername;dbmane=$dbname",
            $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT username, psw, firstName, lastName,
                         address1, address2, city, state, zipCode, phone, email, gender, martialStatus,
                         dateOfBirth".
            " FROM registration WHERE id = :last_id");
        $stmt->bindParam(':last_id',$last_id);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $assocArray = $stmt->fetchAll()[0];
        $username = $assocArray["username"];
        $psw = $assocArray["psw"];
        $firstName = $assocArray["firstName"];
        $lastName = $assocArray["lastName"];
        $address2 = $assocArray["address2"];
        $address1 = $assocArray["address1"];
        $state = $assocArray["state"];
        $city = $assocArray["city"];
        $zipCode = $assocArray["zipCode"];
        $phone = $assocArray["phone"];
        $martialStatus = $assocArray["martialStatus"];
        $email = $assocArray["email"];
        $gender = $assocArray["gender"];
        $dateOfBirth = $assocArray["dateOfBirth"];

    }
    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    } finally {
        $conn = null;
    }
?>