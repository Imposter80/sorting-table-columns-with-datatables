<?php
require 'db.php';
$message = '';
if (isset ($_POST['first_name']) && isset($_POST['last_name'])  && isset($_POST['email']) ) {
  $first_name =trim($_POST['first_name']);
  $last_name =trim($_POST['last_name']);
  $email =trim($_POST['email']);
  $sql = 'INSERT INTO users(first_name,  last_name, email) VALUES(:first_name, :last_name, :email)';
  
  
  $statement = $connection->prepare($sql);
  if ($statement->execute([':first_name' => $first_name,':last_name' => $last_name, ':email' => $email])) {
    $message = 'data inserted successfully';
	header("Location: index.php");
  }

}

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create new user</h2>
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
          <input type="text" name="first_name" id="first_name" class="form-control">
        </div>
		<div class="form-group">
          <label for="last_name">Last name</label>
          <input type="text" name="last_name" id="last_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
