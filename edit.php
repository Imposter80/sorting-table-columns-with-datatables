<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM users WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['first_name']) && isset($_POST['last_name'])  && isset($_POST['email']) ) {
  $first_name =trim($_POST['first_name']);
  $last_name =trim($_POST['last_name']);
  $email =trim($_POST['email']);
  $sql = 'UPDATE users SET first_name=:first_name, last_name=:last_name, email=:email WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':first_name' => $first_name, ':last_name' => $last_name, ':email' => $email, ':id' => $id])) {
    header("Location: index.php");
  }
}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update user</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="first_name">First name</label>
          <input value="<?= $person->first_name; ?>" type="text" name="first_name" id="first_name" class="form-control">
        </div>
		 <div class="form-group">
          <label for="last_name">Last name</label>
          <input value="<?= $person->last_name; ?>" type="text" name="last_name" id="last_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update user</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
