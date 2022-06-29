<?php
    require('../src/functions.php');
    require('../src/config.php');
    $pageTitle = "My Page";
    include('./layout/header.php');

    $message="";
    $deletemessage="";
     

    if (!isset($_SESSION['id'])) {
        print_r($_SESSION);
        header('Location: login.php?mustLogin');
        exit;
    }

    

    if (isset($_POST['deleteUserBtn'])) {
        deleteUsers();

        header("Location: logout.php");
        

    }

    if(isset($_POST['newPasswordBtn'])) {
        $password           = trim($_POST['password']);
        $confirmPassword    = trim($_POST['confirmPassword']);

            // $sql = "
            //     UPDATE users
            //     SET password = :password
            //     WHERE id = :id
            // ";

            // $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            // $state = $pdo->prepare($sql);
            // $state->bindParam(':id', $encryptedPassword);
            // $state->bindParam(':password', $encryptedPassword);
            // $state->execute();
            // $user = $state->fetch();

            $user = UpdateUserPassword($password,$encryptedPassword);

            $message .= '
                <div class="">
                    Password has been updated.
                </div>
            ';
        }
    

    
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
            updateUsersFnLn($firstName, $lastName);

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
            updateInformation($phone, $street, $postalCode, $city, $country);

             $message .= '
                 <div>
                 Update success.
                 </div>
             ';
        }
    }


    if(isset($_POST['newPasswordBtn'])) {
        $password           = trim($_POST['newpassword']);
        $confirmPassword    = trim($_POST['confirmnewpassword']);
            updatePassword($password);
            $message .= '

                <div class="">

                    Password has been updated.

                </div>

            ';

        }

    $user = FetchUserBySession();

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
    <title>My page</title>
</head>
<body>

<legend>Welcome to your page <?=$user['first_name']?> <?=$user['last_name']?>!</legend>


<?=$message?>
<hr>

<div class="main-box-mypage">
<div class="flex-box">
<div class="white-box">

<div>
    <legend>Our information about you.</legend><br>
    <b>Firstname: </b> <?=$user['first_name']?> <br>
    <b>Lastname: </b> <?=$user['last_name']?> <br><br>
    <b>E-mail: </b> <?=$user['email']?> <br>
    <b>Phone: </b> <?=$user['phone']?><br><br>
    <b>Street: </b> <?=$user['street']?><br>
    <b>Postal code: </b> <?=$user['postal_code']?><br>
    <b>City: </b> <?=$user['city']?><br>
    <b>Country: </b> <?=$user['country']?> <br><br>
    
    <b>Password </b> <?=$user['password']?> <br>
    
</div><br>
</div>
    <div class="white-box">
            <div>
            <legend>Update address</legend>
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
                    <input type="submit" class="button" name="informationBtn" value="Update">
                    </div>
                </form>

</div>
</div>
</div>
<div class="flex-box">
    <div class="white-box">
    <legend>Update name</legend>
 

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
             <input type="submit" class="button" name="nameUpdateBtn" value="Update">
         </div>
     </form>
     </div>


            
    </div>
    <div class="white-box">
    <legend>Update password</legend>
                <form action="" method="POST">
                    <div>
                        <label for="input1">New password:</label><br>
                        <input type="text"  name="password"><br>
                    </div>
                    <div>
                        <label for="input1">Confirm new password:</label><br>
                        <input type="text" name="confirmPassword"><br>
                    </div>
                    <div>
                        <br>
                        <input class="button" type="submit" name="newPasswordBtn" value="Update">
                        </form> <br>
                    </div>
    </div>
    </div>
    <div class="flex-box">
    <div class="white-box">
                <legend>Delete user</legend>

                <form action="" method="POST">

            <div class="alert alert-danger"  width="450px" role="alert">
            You can not regret this action later. 
            Do you want to logout instead? <a href="logout.php" class="alert-link">Log out</a>
            <br>

            </div>
            <input type="hidden" name="userId" value="<?=htmlentities($user['id']) ?>">
                        <input type="submit" class="button" name="deleteUserBtn" value="Delete">
            </form>
    
    </div>
    <div class="white-box">

    <legend>Log out </legend>
    
    <div class="alert alert-light"  width="450px" role="alert">
            Thanks for your visit,
            you´re welcome back anytime!
            
            <br>
                <form action="logout.php" method="POST"> <br>
                        <input type="submit" class="button" name="logOutBtn" value="Log out">

                </form>
               
</div>
    </div>        
    </div>

<?php include('./layout/footer.php'); ?>
</body>
</html>
<script>

if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script> 



            

