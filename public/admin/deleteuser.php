<?php
    require('../../src/config.php');
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    deleteUsers ();

?>

<!-- <?=$message?> -->


<h2>Are you sure you want to delete your account? </h2>
<form action="" method="POST">
    <input type="submit" name="deleteUserBtn" value="Delete">
</form>


