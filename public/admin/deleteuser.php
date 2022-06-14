<?php
    require('../src/dbconnect.php');
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    function deleteUser () {
        global $pdo;

        $sql = "
            DELETE FROM users 
            WHERE id = :id;
        ";
        $state = $pdo->prepare($sql);
        $state->bindParam(':id', $_POST['userId']);
        $state->execute();
        

    }

?>

<!-- <?=$message?> -->


<h2>Are you sure you want to delete your account? </h2>
<form action="" method="POST">
    <input type="submit" name="deleteUserBtn" value="Delete">
</form>


