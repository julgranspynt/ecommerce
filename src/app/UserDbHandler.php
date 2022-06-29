<?php

class UserDbHandler {
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function fetchAllUsers() {
        $sql = "SELECT * FROM users;";
        $state = $this->pdo->query($sql);
        return $state->fetchAll();
    }


    public function FetchUser(){
        $sql = "
        SELECT * FROM users
        WHERE id = :id
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':id', $_GET ["userId"]);
        $state->execute();
        return $state->fetch();
    }


    public function FetchUserByEmail($email){
        $sql = "
        SELECT * FROM users
        WHERE email = :email
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':email', $email);
        $state->execute();
        return $state->fetch();
    }


    public function deleteUsers() {
        $sql = "
        DELETE FROM users 
        WHERE id = :id;
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':id', $_POST['userId']);
        $state->execute();
    }


    public function updateUsersFnLn($firstName, $lastName) {
        $sql = "
        UPDATE users
        SET
            first_name = :firstName,
            last_name = :lastName
        WHERE id = :id
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':firstName', $firstName);
        $state->bindParam(':lastName', $lastName);
        $state->bindParam(':id', $_SESSION['id']);
        $state->execute();
    } 


    public function updateInformation($phone, $street, $postalCode, $city, $country) {
        $sql = "
        UPDATE users
        SET
        phone = :phone,
        street = :street,
        postal_code = :postal_code,
        city = :city,
        country = :country
        WHERE id = :id
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':id', $_SESSION['id']);
        $state->bindParam(':phone', $phone);
        $state->bindParam(':street', $street);
        $state->bindParam(':postal_code', $postalCode);
        $state->bindParam(':city', $city);
        $state->bindParam(':country', $country);
        $state->execute();
    }


    public function UpdateUserPassword($password){
        $sql = "
        UPDATE users
        SET password = :password
        WHERE id = :id
        ";
        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':id', $_SESSION['id']);
        $state->bindParam(':password', $encryptedPassword);
        $state->execute();
        return $state->fetch();
    }


    public function FetchUserBySession(){
        $sql = "
        SELECT * FROM users
        WHERE id = :id
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':id', $_SESSION['id']);
        $state->execute();
        return $state->fetch();  
    }


    public function updatePassword ($password) {
        $sql = "
            UPDATE users
            SET password = :password
            WHERE id = :id
        ";
        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':id', $_SESSION['id']);
        $state->bindParam(':password', $encryptedPassword);
        $state->execute();
        return $state->fetch();
    }


    /* public function updatePassword ($password, $encryptedPassword) {
        $sql = "
        UPDATE users
        SET password = :password
        WHERE id = :id
        ";
        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':id', $_SESSION['id']);
        $state->bindParam(':password', $encryptedPassword); 
        $state->execute();
        return $state->fetch();
    } */


    public function updateUsersAdmin($firstname, $lastname, $street, $postalcode, $city, $country, $email, $phone, $password, $confirmPassword){
        $sql = "
        UPDATE users
        SET  
        first_name      = :first_name, last_name = :last_name,
        street          = :street, postal_code = :postal_code, city = :city,
        country         = :country, email = :email, phone = :phone, password = :password
        WHERE id = :id 
        ";
        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':id', $_GET["userId"]);
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


    public function insertIntoUser($firstName, $lastName, $email, $password, $phone, $street, $postalCode, $city, $country) {
        $sql = "
        INSERT INTO users (first_name, last_name, email, password, phone, street, postal_code, city, country)
        VALUES (:first_name, :last_name, :email, :password, :phone, :street, :postal_code, :city, :country)
        ";
        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $encryptedPassword);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':street', $street);
        $stmt->bindParam(':postal_code', $postalCode);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':country', $country);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }


    public function newUser($firstname, $lastname, $street, $postalcode, $city, $country, $email, $phone, $password) {  
        $sql = "
        INSERT INTO users (first_name, last_name, street, postal_code, city, country, email, phone, password) 
        VALUES (:first_name, :last_name, :street, :postal_code, :city, :country, :email, :phone, :password) ;
        ";
        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $this->pdo->prepare($sql);
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

}

?>