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

function updateUsersAdmin($firstname, $lastname, $street, $postalcode, $city, $country, $email, $phone, $password, $confirmPassword){

  global $pdo;

  $sql = "

  UPDATE users
  SET  
  first_name      = :first_name, last_name = :last_name,
  street          = :street, postal_code = :postal_code, city = :city,
  country         = :country, email = :email, phone = :phone, password = :password
  WHERE id = :id ";

  $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    $state = $pdo->prepare($sql);
    $state->bindParam(':id', $_GET["userId"]);
    $state->bindParam(':first_name', $firstname);
    $state->bindParam(':last_name', $lastname);
    $state->bindParam(':street', $street);
    $state->bindParam(':postal_code', $postalcode);
    $state->bindParam(':city', $city);
    $state->bindParam(':country', $country);
    $state->bindParam(':email', $email);
    $state->bindParam(':phone', $phone);
    $state->bindParam(':password', $encryptedPassword);
    $state->execute();

}

function insertIntoUser($firstName, $lastName, $email, $password, $phone, $street, $postalCode, $city, $country) {
 global $pdo;

 $sql = "
                INSERT INTO users (first_name, last_name, email, password, phone, street, postal_code, city, country)
                VALUES (:first_name, :last_name, :email, :password, :phone, :street, :postal_code, :city, :country)
            ";

            $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':last_name', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $encryptedPassword);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':street', $street);
            $stmt->bindParam(':postal_code', $postalCode);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':country', $country);
            $stmt->execute();
            $userId = $pdo->lastInsertId();

}

/* function insertIntoOrder($userId, $cartTotalSum, $firstName, $lastName, $street, $postalCode, $city, $country) {
  global $pdo;

  $sql = "
            INSERT INTO orders (user_id, total_price, billing_full_name, billing_street, billing_postal_code, billing_city, billing_country)
            VALUES (:user_id, :total_price, :billing_full_name, :billing_street, :billing_postal_code, :billing_city, :billing_country)
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId);
        $stmt->bindValue(':total_price', $cartTotalSum);
        $stmt->bindValue(':billing_full_name', $firstName . " " . $lastName);
        $stmt->bindValue(':billing_street', $street);
        $stmt->bindValue(':billing_postal_code', $postalCode);
        $stmt->bindValue(':billing_city', $city);
        $stmt->bindValue(':billing_country', $country);
        $stmt->execute();
        $orderId = $pdo->lastInsertId();

} */

/* function insertIntoItems($orderId, $item) {
  global $pdo;

  $sql = "
                INSERT INTO order_items (order_id, product_id, product_title, quantity, unit_price)
                VALUES (:order_id, :product_id, :product_title, :quantity, :unit_price)
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':order_id', $orderId);
            $stmt->bindValue(':product_id', $item['id']);
            $stmt->bindValue(':product_title', $item['title']);
            $stmt->bindValue(':quantity', $item['quantity']);
            $stmt->bindValue(':unit_price', $item['price']);
            $stmt->execute();
} */

function fetchAllOrders() {
  global $pdo;
  
  $sql = "SELECT * FROM orders;";
  $state = $pdo->query($sql);
  return $state->fetchAll();

}



function deleteOrder() {
  global $pdo;
  
  $sql = "
  DELETE FROM orders 
  WHERE id = :id;
  ";
  $state = $pdo->prepare($sql);
  $state->bindParam(':id', $_POST['orderId']);
  $state->execute();

}

 ?>