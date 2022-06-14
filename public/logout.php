<?php
require('../src/dbconnect.php');

$_SESSION = [];
session_destroy();
header('Location: login.php');
exit;


// if (isset($_GET['logout'])) {
//     $message = '
//         <div class="success_msg">
//             Du är nu utloggad.
//         </div>
//     ';

