<?php
	$pageTitle = "Login";
	require('../src/config.php');

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    $message = "";
    if (isset($_GET['errorLogin'])) {
        $message = '
            <div>
                To see this you have to login. Try again please!
            </div>
        ';
    }

    if (isset($_GET['mustLogin'])) {
        $message = '
            <div>
                You need to log in to see this page.
            </div>
        ';
    }

    if (isset($_GET['logout'])) {
        $message = '
            <div>
                You have successfully logged out.
            </div>
        ';
    }

    if (isset($_POST['loginBtn'])) {
        $email    = trim($_POST['email']);
        $password = trim($_POST['password']);

        $sql = "
            SELECT * FROM users
            WHERE email = :email
        ";

        $state = $pdo->prepare($sql);
        $state->bindParam(':email', $email);
        $state->execute();
        $user = $state->fetch();

        /* echo "<pre>";
        print_r($user);
        echo "</pre>"; */


        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            header('Location: myPage.php');
            exit;
        } else {
            $message = '
                <div class="">
                    Incorrect credentials, please try again.
                </div>
            ';
        }


    }


?>

<?php include('./layout/header.php'); ?>

<h2>Login</h2>

<?=$message?>

<form action="" method="POST">
    <input type="text" name="email" placeholder="E-mail"><br>
    <br>
    <input type="password" name="password" placeholder="Password"><br>
    <br>
    <input type="submit" name="loginBtn" value="Login">
</form>

<h2>New user? </h2>
<form action="newuser.php" method="POST">
    <input type="submit" name="newUser" value="Register">
</form>

<?php include('./layout/footer.php'); ?>