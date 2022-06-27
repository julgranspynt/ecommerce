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

        echo "<pre>";
        print_r($user);
        echo "</pre>";


        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            header('Location: myPage.php');
            exit;
        } else {
            $message = '
                <div class="">
                    Something went wrong, please try again.
                </div>
            ';
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
    <title>Login</title>
</head>
<body>
<?php include('./layout/header.php'); ?>


<div class="main-box">
<div class="white-box">
<legend>Login</legend>

<?=$message?>

<form action="" method="POST">
    <input type="text" name="email" placeholder="E-mail"><br>
    <br>
    <input type="password" name="password" placeholder="Password"><br>
    <br>
    <input class="button" type="submit" name="loginBtn" value="Login">
</form>
</div>
<div class="white-box">
<legend>New user?</legend>
<form action="newuser.php" method="POST">
    <input class="button" type="submit" name="newUser" value="Register">
</form>
</div>


</div>

<?php include('./layout/footer.php'); ?>
    
</body>
</html>
<script>

if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script> 