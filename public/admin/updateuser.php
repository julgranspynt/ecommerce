<?php
        require('../../src/config.php');
        $pageTitle = "Update User";

        /* echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        echo "<pre>";
        print_r($_GET);
        echo "</pre>"; */


    $message = "";
    $messageuser = "";
    $error     ="";
    if (isset($_POST['updateUserBtn'])) {
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

        $userDbHandler->updateUsersAdmin($firstname, $lastname, $street, $postalcode, $city, $country, $email, $phone, $password, $confirmPassword);
        $messageuser = "User successfully updated! <br>";
    }

    $user = $userDbHandler->FetchUser();
    
?>

<?php ?>
        <article class="border">
            <form method="POST" action="#">

                <fieldset>
                    <legend>Update User </legend>

                    <?=$message ?>
                    <br><?=$messageuser ?>
                    
                    <p>
                        <label for="input1">First Name:</label> <br>
                        <input type="text" class="text" name="first_name" value="<?=htmlentities($user['first_name']) ?>">
                    </p>

                    <p>
                        <label for="input1">Last Name:</label> <br>
                        <input type="text" class="text" name="last_name" value="<?=htmlentities($user['last_name']) ?>">
                    </p>

                    <p>
                        <label for="input1">Street:</label> <br>
                        <input type="text" class="text" name="street" value="<?=htmlentities($user['street'])?>">
                    </p>

                    <p>
                        <label for="input1">Postal Code:</label> <br>
                        <input type="text" class="text" name="postal_code" value="<?=htmlentities($user['postal_code']) ?>">
                    </p>

                    <p>
                        <label for="input1">City:</label> <br>
                        <input type="text" class="text" name="city" value="<?=htmlentities($user['city']) ?>">
                    </p>

                    <p>
                        <label for="input1">Country:</label> <br>
                        <input type="text" class="text" name="country" value="<?=htmlentities($user['country']) ?>">
                    </p>

                    <p>
                        <label for="input1">Phone:</label> <br>
                        <input type="text" class="text" name="phone" value="<?=htmlentities($user['phone']) ?>">
                    </p>

                    <p>
                        <label for="input1">Email:</label> <br>
                        <input type="text" class="text" name="email" value="<?=htmlentities($user['email']) ?>">
                    </p>

                    <p>
                        <label for="input2">New password:</label> <br>
                        <input type="password" class="text" name="password">
                    </p>

                    <p>
                        <label for="input2">Confirm new password:</label> <br>
                        <input type="password" class="text" name="confirmPassword">
                    </p>
                    <p>
                        <input type="submit" name="updateUserBtn" value="Update"> | 
                        <a href="admin.php">&#x2190; back</a>
                    </p>
                </fieldset>
            </form>
        
            <hr>
        </article>

<?php ?>
        