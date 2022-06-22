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











 ?>