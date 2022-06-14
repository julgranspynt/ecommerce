<?php
    require('../src/config.php');
    require('../src/app/FunctionNewUser.php');
    $pageTitle = "New User";
    // $pageId    = "register";
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $messageuser="";
    $message   ="";
    $error     ="";

    $firstname ="";
    $lastname  ="";
    $street    ="";
    $postalcode="";
    $city      ="";
    $country   ="";
    $email     ="";
    $phone     ="";
    

    if (isset($_POST['newUserBtn'])) {
        $firstname          = trim($_POST['first_name']);
        $lastname           = trim($_POST['last_name']);
        $street             = trim($_POST['street']);
        $postalcode         = trim($_POST['postal_code']);
        $city               = trim($_POST['city']);
        $country            = trim($_POST['country']);
        $email              = trim($_POST['email']);
        $phone              = trim($_POST['phone']);
        $password           = trim($_POST['password']);
        $confirmPassword    = trim($_POST['confirmPassword']);

        if (empty($firstname)) {
            $error .= "Please fill in your first name. <br>";
        }

        if (empty($lastname)) {
            $error .= "Please fill in your last name. <br>";
        }

        if (empty($street)) {
            $error .= "Please fill in your street. <br>";
        }

        if (empty($postalcode)) {
            $error .= "Please fill in your postalcode. <br>";
        }

        if (empty($city)) {
            $error .= "Please fill in your city.<br>";
        }

        if (empty($country)) {
            $error .= "Please fill in your country.<br>";
        }
       
        if (empty($email)) {
            $error .= "Please fill in your email.<br>";
        }

        if (empty($password)) {
            $error .= "Please fill in a password <br>";
        }

        if ($password !== $confirmPassword) {
            $error .= "Please confirm your new password.";
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $error .= "Please try again.<br>";
        }
    
        
        if ($error) {
            $message = "
                <div class='error_msg'>
                    {$error}
                </div>
            ";

        } else {
            try {
                newUser($firstname, $lastname, $street, $postalcode, $city, $country, $email, $phone, $password);
                $messageuser .= "Welcome, you can now login! <br>";
            } catch (\PDOException $e) {
                if ((int) $e->getCode() === 23000) {
                    $message = "
                        <div class='error_msg'>
                            This email-address is already taken, please try another one.
                        </div>
                    ";
                } else {
                    throw new \PDOException($e->getMessage(), (int) $e->getCode());
                }
    }      
           

        

        
        
    }
    }


    



?>
                            

    <h2>Go to Login </h2>
    <form action="login.php" method="POST">
    <input type="submit" name="newUser" value="Login">
    </form> 

    <div id="content">
        <article class="border">
            <form method="POST" action="#">
                <fieldset>
                    <legend>Register here please.</legend>

                    <?=$message ?>
                    
                    <p>
                        <label for="input1">First Name:</label> <br>
                        <input type="text" class="text" name="first_name" value="<?=htmlentities($firstname) ?>">
                    </p>

                    <p>
                        <label for="input1">Last Name:</label> <br>
                        <input type="text" class="text" name="last_name" value="<?=htmlentities($lastname) ?>">
                    </p>

                    <p>
                        <label for="input1">Street:</label> <br>
                        <input type="text" class="text" name="street" value="<?=htmlentities($street) ?>">
                    </p>

                    <p>
                        <label for="input1">Postal Code:</label> <br>
                        <input type="text" class="text" name="postal_code" value="<?=htmlentities($postalcode) ?>">
                    </p>

                    <p>
                        <label for="input1">City:</label> <br>
                        <input type="text" class="text" name="city" value="<?=htmlentities($city) ?>">
                    </p>

                    <p>
                        <label for="input1">Country:</label> <br>
                        <input type="text" class="text" name="country" value="<?=htmlentities($country) ?>">
                    </p>

                    <p>
                        <label for="input1">Phone:</label> <br>
                        <input type="text" class="text" name="phone" value="<?=htmlentities($phone) ?>">
                    </p>

                    <p>
                        <label for="input1">Email:</label> <br>
                        <input type="text" class="text" name="email" value="<?=htmlentities($email) ?>">
                    </p>

                    <p>
                        <label for="input2">Password:</label> <br>
                        <input type="password" class="text" name="password">
                    </p>

                    <p>
                        <label for="input2">Confirm Password:</label> <br>
                        <input type="password" class="text" name="confirmPassword">
                    </p>
                    <p>
                        <input type="submit" name="newUserBtn" value="Registrera"> <br>
                        <br><?=$messageuser ?>
                    </p>
                                             



                </form>
                </fieldset>
            </form>
            

            <hr>
        </article>
    </div>

