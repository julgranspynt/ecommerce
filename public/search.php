<?php
require('../src/config.php');
require('../src/dbconnect.php');

$match="";
if (array_key_exists('matchProduct', $_POST)) {

  $product = $_POST['product'];
  $state = $pdo->prepare
  ('SELECT * FROM products WHERE title LIKE :keyword 
  OR description LIKE :keyword ORDER BY title');
  
  
  $state->bindValue(':keyword','%'.$product.'%',PDO::PARAM_STR);
  $state->execute();
  $match = $state->fetchALL();
}

?>

<link rel="stylesheet" href="css/style.css">
<div>
<div>
    <form action="#" method="POST">
      <input type="text"  placeholder="Enter product name" name="product" />
      <button type="submit"  name="matchProduct"> Submit </button>
    </form>
  </div>

  <div>

<table>
  <thead>
        <tr>
            <b><th>Id:</th></b>
            <b><th>Title:</th></b>
            <b><th>Price:</th></b>
            <b><th>Description:</th></b>
            <b><th>Stock:</th></b>
          </tr>
        </thead>

    <?php foreach ($match as $key) {
    ?>
   <tr>
      <td><?=htmlentities($key['id']) ?></td>
      <td><?=htmlentities($key['title']) ?></td>
      <td><?=htmlentities($key['price']) ?></td>
      <td><?=htmlentities($key['description']) ?></td>
      <td><?=htmlentities($key['stock']) ?></td>
    </tr>

    <?php } ?>

         </tbody>
    </table>

</div>
</div>
</body>
</html>