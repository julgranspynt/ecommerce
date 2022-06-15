<?php
    require('../src/config.php');
    $pageTitle = "My Page";


    $message="";
    $deletemessage="";
     

    if (!isset($_SESSION['id'])) {
        print_r($_SESSION);
        exit;
        header('Location: login.php?mustLogin');
    }

    if (isset($_POST['deleteUserBtn'])) {
    
        $sql = "
            DELETE FROM users 
            WHERE id = :id;
        ";
        $state = $pdo->prepare($sql);
        $state->bindParam(':id', $_POST['userId']);
        $state->execute();

        header("Location: logout.php");
        

    }


    // header( 'Location: http://www.yoursite.com/new_page.html' );
    // exit;
    // $id = $_POST['deleteUserBtn'];
    // $sql = $pdo->prepare('DELETE FROM users WHERE id = :id')->execute(['id' => $id]);

    // if ($sql) header;

    
    if(isset($_POST['nameUpdateBtn'])) {
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);

        if (empty($firstName)) {
			$message .= '
                <div>
                    Please fill in your first name.
                </div>
            ';
		}
        
        if (empty($lastName)) {
			$message .= '
                <div>
                Please fill in your last name.
                </div>
            ';
		}

        if (empty($message)) {
            $sql = "
                UPDATE users
                SET
                    first_name = :firstName,
                    last_name = :lastName
                WHERE id = :id
            ";
        
            $state = $pdo->prepare($sql);
            $state->bindParam(':firstName', $firstName);
            $state->bindParam(':lastName', $lastName);
            $state->bindParam(':id', $_SESSION['id']);
            $state->execute();

            $message .= '
                <div>
                    Update success.
                </div>
            ';
        }
    }

    if(isset($_POST['informationBtn'])) {
        $phone = trim($_POST['phone']);
        $street = trim($_POST['street']);
        $postalCode = trim($_POST['postalCode']);
        $city = trim($_POST['city']);
        $country = trim($_POST['country']);

        if (empty($phone)) {
			$message .= '
                <div>
                Please fill in your phone number.
                </div>
            ';
		}
        
        if (empty($street)) {
			$message .= '
                <div>
                Please fill in your street name.
                </div>
            ';
		}

        if (empty($postalCode)) {
			$message .= '
                <div>
                Please fill in your postal code.
                </div>
            ';
		}

        if (empty($city)) {
			$message .= '
                <div>
                Please fill in your city.
                </div>
            ';
		}

        if (empty($country)) {
			$message .= '
                <div>
                Please fill in your country.
                </div>
            ';
		}

        if (empty($message)) {
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
        
            $state = $pdo->prepare($sql);
            $state->bindParam(':id', $_SESSION['id']);
            $state->bindParam(':phone', $phone);
            $state->bindParam(':street', $street);
            $state->bindParam(':postal_code', $postalCode);
            $state->bindParam(':city', $city);
            $state->bindParam(':country', $country);

            $state->execute();

            // $message .= '
            //     <div>
            //     Update success.
            //     </div>
            // ';
        }

    if(isset($_POST['newPasswordBtn'])) {
        $oldpassword = trim($_POST['oldpassword']);
        $newpassword = trim($_POST['newpassword']);
        $confirmnewpassword = trim($_POST['confirmnewpassword']);

        $sql = "
            SELECT password FROM users
            WHERE id = :id
        ";

        $state = $pdo->prepare($sql);
        $state->bindParam(':id', $_SESSION['id']);
        $state->execute();
        $currentpassword = $state->fetch();

        if ( !password_verify($oldpassword, $currentpassword['password']) ) {
            $message = '
                <div>
                    The old password is incorrect.
                </div>
            ';
        } else {
            if (empty($newpassword)) {
                $message .= '
                    <div>
                    Please fill in new password.
                    </div>
                ';
            }
            
            if (empty($confirmnewpassword)) {
                $message .= '
                    <div>
                    Please confirm your new password.
                    </div>
                ';
            }
    
            if (!empty($confirmnewpassword) && !empty($newpassword) && $newpassword !== $confirmnewpassword) {
                $message .= '
                    <div>
                        "Password" and "Confirm password" dont match, please try again!
                    </div>
                ';
            } 
            
            if (empty($message)) {
                $encryptedPassword = password_hash($newpassword, PASSWORD_BCRYPT, ['cost' => 12]);

                $sql = "
                    UPDATE users
                    SET
                    password = :password
                    WHERE id = :id
                ";
            
                $state = $pdo->prepare($sql);
                $state->bindParam(":password", $encryptedPassword);
                $state->bindParam(':id', $_SESSION['id']);
                $state->execute();

                $message .= '
                    <div>
                    Update success.
                    </div>
                ';
            }
        }
    }


    }

    $sql = "
        SELECT * FROM users
        WHERE id = :id
    ";
    $state = $pdo->prepare($sql);
    $state->bindParam(':id', $_SESSION['id']);
    $state->execute();
    $user = $state->fetch();
?>  


<h2>Welcome to your page <?=$user['first_name']?> <?=$user['last_name']?>!</h2>


<?=$message?>
<hr>


<div>
    <h3>Our information about you.</h3>
    <b>Firstname: </b> <?=$user['first_name']?><br> 
    <b>Lastname: </b> <?=$user['last_name']?> <br>
    <b>E-mail: </b> <?=$user['email']?> <br>
    <b>Phone: </b> <?=$user['phone']?><br>
    <b>Street: </b> <?=$user['street']?><br>
    <b>Postal code: </b> <?=$user['postal_code']?><br>
    <b>City: </b> <?=$user['city']?><br>
    <b>Country: </b> <?=$user['country']?> <br>
</div>


            <div>
                <h2>Update information<h2>
 
                </button>
            </div>
            <div>
                <form action="" method="POST">
                    <div>
                        <label>Firstname:</label><br>
                        <input type="text" name="firstName" value="<?=htmlentities($user['first_name']) ?>">
                    </div>
                    <div>
                        <label for="lastName">Lastname:</label><br>
                        <input type="text"name="lastName" value="<?=htmlentities($user['last_name']) ?>">
                    </div>
                    <div>
                        <br>
                        <input type="submit"name="nameUpdateBtn" value="Update">
                    </div>
                </form>

            <div>
                <form action="" method="POST">
                    <div>
                        <label for="phone">Phone:</label><br>
                        <input type="text"name="phone" value="<?=htmlentities($user['phone']) ?>">
                    </div>
                    <div>
                        <label for="street">Street:</label><br>
                        <input type="text" name="street" value="<?=htmlentities($user['street']) ?>">
                    </div>
                    <div>
                        <label for="postalCode">Postal code:</label><br>
                        <input type="text"name="postalCode" value="<?=htmlentities($user['postal_code']) ?>">
                    </div>
                    <div>
                        <label for="city">City:</label><br>
                        <input type="text" name="city" value="<?=htmlentities($user['city']) ?>">
                    </div>
                    <div>
                        <label for="country">Country:</label><br>
                        <input type="text" name="country" value="<?=htmlentities($user['country']) ?>"><br>
                    </div>
                    <div>
                    <br>
                    <input type="submit" name="informationBtn" value="Update">
                    </div>
                </form>
            </div>

            <div class="modal-body">
                <form action="" method="POST">
                    <div>
                        <label for="input1">Old password:</label><br>
                        <input type="text" name="oldpassword"><br>
                    </div>
                    <div class="form-group">
                        <label for="input1">New password:</label><br>
                        <input type="text" class="form-control" name="newpassword"><br>
                    </div>
                    <div class="form-group">
                        <label for="input1">Confirm new password:</label><br>
                        <input type="text" class="form-control" name="confirmnewpassword"><br>
                    </div>
                    <div>
                        <br>
                        <input type="submit" name="newPasswordBtn" value="Update">
                    </div>

                </form> <br><h2>Delete user</h2>

                <form action="" method="POST">
                        <input type="hidden" name="userId" value="<?=htmlentities($user['id']) ?>">
                        <input type="submit" name="deleteUserBtn" value="Delete">
                </form>

                
                <form action="logout.php" method="POST">
                        <input type="submit" name="logOutBtn" value="Logout">

                </form>
               
        
            </div>
<!-- 
            <a href='logout.php'>Logga ut</a> -->
            <!-- 

            if ($deletemessage) {
                echo "<p>
                     $deletemessage;
                </p> ";
            }; -->
        
<?php include('./layout/footer.php'); ?>


            

