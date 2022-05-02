<?php
    if($isValid){
        try {
            $conn = new PDO( "mysql:host=$servername;dbmane=$dbname",
                $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("INSERT INTO registration(username, psw, firstName, lastName,
                         address1, address2, city, state, zipCode, phone, email, gender, martialStatus,
                         dateOfBirth)
                         VALUES (:username,'','','', :address1,'',:city,'','', '',:email, :gender,'',CURDATE())");
            $sql->bindParam(':username',$username);
            $sql->bindParam(':psw',$psw);
            $sql->bindParam(':firstName',$firstName);
            $sql->bindParam(':lastName',$lastName);
            $sql->bindParam(':address1',$address1);
            $sql->bindParam(':address2',$address2);
            $sql->bindParam(':city',$city);
            $sql->bindParam(':zipCode',$zipCode);
            $sql->bindParam(':phone',$phone);
            $sql->bindParam(':email',$email);
            $sql->bindParam(':gender',$gender);
            $sql->bindParam(':martialStatus',$martialStatus);
            $sql->bindParam(':dateOfBirth',$dateOfBirth);

            $sql->execute();

            $last_id = $conn->lastInsertId();
            $_SESSION["last_id"] = "$last_id";

            header("Location: confirmation.php");
        }
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
?>