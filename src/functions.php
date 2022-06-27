<?
function fetchAllUsers() {
     global $pdo;
    $sql = "SELECT * FROM users;";
    $state = $pdo->query($sql);
    return $state->fetchAll();

 }



 function deleteUsers() {
  global $pdo;
  $sql = "
  DELETE FROM users 
  WHERE id = :id;
";
  $state = $pdo->prepare($sql);
  $state->bindParam(':id', $_POST['userId']);
  $state->execute();

}



function selectPassword() {
  global $pdo;
  $sql = "
       SELECT password FROM users
        WHERE id = :id
        ";
        $state = $pdo->prepare($sql);
        $state->bindParam(':id', $_SESSION['id']);
        $state->execute();
        $currentpassword = $state->fetch();

}


 function updateUsersFnLn($firstName, $lastName) {
  global $pdo;
  $sql = "
  UPDATE users
  SET
      first_name = :firstName,
      last_name = :lastName
  WHERE id = :id
";

  $state = $pdo->prepare($sql);
  $state->bindParam(':firstName', $firstName);
  $state->bindParam(':lastName', $lastName);
  $state->bindParam(':id', $_SESSION['id']);
  $state->execute();

} 

 function updateInformation($phone, $street, $postalCode, $city, $country) {
  global $pdo;
  $sql = "
  UPDATE users
  SET
  phone = :phone,
  street = :street,
  postal_code = :postal_code,
  city = :city,
  country = :country
  WHERE id = :id
";

$state = $pdo->prepare($sql);
$state->bindParam(':id', $_SESSION['id']);
$state->bindParam(':phone', $phone);
$state->bindParam(':street', $street);
$state->bindParam(':postal_code', $postalCode);
$state->bindParam(':city', $city);
$state->bindParam(':country', $country);
$state->execute();

} 

/*  function updatePassword($message, $newpassword, $id) {
  if (empty($message)) {
  $encryptedPassword = password_hash($newpassword, PASSWORD_BCRYPT, ['cost' => 12]);
  $sql = "
   UPDATE users
   SET
   password = :password
   WHERE id = :id
  ";
   $state = $pdo->prepare($sql);
   $state->bindParam(":password", $encryptedPassword);
   $state->bindParam(':id', $_SESSION['id']);
  $state->execute();
  $message .= '
  <div>
  Update success.
  </div>
';
 }
}  */


 



 ?>