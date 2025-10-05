<?php
include_once("config.php");

$data = $db->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blogger - Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 mt-3">
    <div class="container">
      <a class="navbar-brand" href="#">Blogger</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link text-white" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
          <li class="btn btn-warning btn-md text-white" data-bs-toggle="modal" data-bs-target="#loginModal">Login</li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="bg-light py-5 text-center">
    <div class="container">
      <h1 class="display-4">Welcome to Blogger</h1>
      <p class="lead">Your go to hub for fresh information as it happens live.</p>
    </div>
  </header>

  <!-- Blog Posts -->
  <div class="container mt-5">
  <div class="row">
    <?php if ($data && $data->num_rows > 0): ?>
      <?php while ($row = $data->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body shadow">
              <h5 class="card-title"><?= htmlspecialchars($row['post_title']) ?></h5>
              <p class="card-text">
                <?= substr(strip_tags($row['post_content']), 0, 100) ?>...
              </p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="text-center">No posts found.</p>
    <?php endif; ?>
  </div>
</div>



  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
      <form class="modal-content" method="post" action="login.php">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <?=get_alert();?>

        <div class="modal-body">
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input class="form-control" type="email" id="emailaddress" name="emailaddress" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control" type="password" id="password" name="password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-primary">Signin</button>
        </div>
      </form>
    </div>
  </div>  

  <!-- Footer -->
  <footer class="bg-info text-white text-center py-3" style="margin-top: 350px;">
    <p class="mb-0">&copy; <?= date('Y') ?> Blogger. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <!-- <script src="bootstrap.bundle.js"></script> -->
</body>
</html>
