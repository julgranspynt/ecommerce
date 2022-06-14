<?php
 require('../src/dbconnect.php');
 session_start();

  $message = "";

 if (isset($_POST['deleteUserBtn'])) {
     $sql = "
         DELETE FROM users 
         WHERE id = :id;
     ";
     $state = $pdo->prepare($sql);
     $state->bindParam(':id', $_POST['userId']);
     $state->execute();
 }

 $sql = "SELECT * FROM users;";
 $state = $pdo->query($sql);
 $users = $state->fetchAll();

?>

 <div>
     <article>
         <h1>Manage users</h1>

         <?=$message ?>

         <form action="#" method="GET">
            	<input type="submit" value="Create a new user">
            </form>

            <br>
         
         <table>
             <thead>
                 <tr>
                     <th>id</th>
                     <th>First name</th>
                     <th>Last name</th>
                     <th>E-mail</th>
                     <th>Password</th>
                     <th>Phone number</th>
                     <th>Street</th>
                     <th>Postal code</th>
                     <th>City</th>
                     <th>Country</th>
                     <th>Registered since </th>
                     <th>Handle</th>
                 </tr>
             </thead>
             <tbody>
                 <?php foreach($users as $user) : ?>
                     <tr>
                         <td><?=htmlentities($user['id']) ?></td>
                         <td><?=htmlentities($user['first_name']) ?></td>
                         <td><?=htmlentities($user['last_name']) ?></td>
                         <td><?=htmlentities($user['email']) ?></td>
                         <td><?=htmlentities($user['password']) ?></td>
                         <td><?=htmlentities($user['phone']) ?></td>
                         <td><?=htmlentities($user['street']) ?></td>
                         <td><?=htmlentities($user['postal_code']) ?></td>
                         <td><?=htmlentities($user['city']) ?></td>
                         <td><?=htmlentities($user['country']) ?></td>
                         <td><?=htmlentities($user['create_date']) ?></td>
                         <td>
                             <form action="#" method="GET">
                                 <input type="hidden" name="userId" value="<?=htmlentities($user['id']) ?>">
                                 <input type="submit" value="Updatera">
                             </form>

                             <form action="" method="POST">
                                 <input type="hidden" name="userId" value="<?=htmlentities($user['id']) ?>">
                                 <input type="submit" name="deleteUserBtn" value="Radera">
                             </form>
                         </td>
                     
                     </tr>
                 <?php endforeach; ?>
             </tbody>
         </table>
            
     </article>
 </div>
