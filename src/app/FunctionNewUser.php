<?php

    function newUser($firstname, $lastname, $street, $postalcode, $city, $country, $email, $phone, $password) {  
        global $pdo;

        $sql = "
            INSERT INTO users (first_name, last_name, street, postal_code, city, country, email, phone, password) 
            VALUES (:first_name, :last_name, :street, :postal_code, :city, :country, :email, :phone, :password) ;
        ";

        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $pdo->prepare($sql);
        $state->bindParam(':first_name', $firstname);
        $state->bindParam(':last_name', $lastname);
        $state->bindParam(':street', $street);
        $state->bindParam(':postal_code', $postalcode);
        $state->bindParam(':city', $city);
        $state->bindParam(':country', $country);
        $state->bindParam(':email', $email);
        $state->bindParam(':phone', $phone);
        $state->bindParam(':password', $encryptedPassword);
        $state->execute();
    }













