<?php
require('../src/config.php');

$_SESSION = [];
session_destroy();
header('Location: login.php?logout');
exit;


// if (isset($_GET['logout'])) {
//     $message = '
//         <div class="success_msg">
//             Du är nu utloggad.
//         </div>
//     ';

