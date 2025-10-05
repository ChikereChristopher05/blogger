<?php
include_once("config.php");
$user = kick($db);

$data = $db->query("SELECT * FROM posts");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Blogger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <style>
        body{
            background:#f4f6f9;
            font-family:'Segoe UI',sans-serif;
        }
        .card-stat{
            border-radius:.75rem;
            box-shadow:0 2px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container-fluid">
  <!-- <div class="row"> -->
    <!-- Sidebar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 mt-3">
        <div class="container">
            <h4 class="text-white mb-4">Admin Panel</h4>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Manage Users</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Broadcast</a></li>
                <li class="nav-item"><a class="btn btn-warning w-100 text-white" href="logout.php?uid=<?=$user['uid']?>">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main -->
    <main class="ms-sm-auto col-lg-12 px-md-4 py-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Blog Overview</h2>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createModal">Create Post</button>
      </div>

      <!-- Stats -->
      <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3"><div class="card card-stat p-3 text-center">
          <h6>Total Users</h6><h3 id="" class="text-primary fw-bold">0</h3></div></div>
        <div class="col-sm-6 col-xl-3"><div class="card card-stat p-3 text-center">
          <h6>Verified</h6><h3 id="" class="text-success fw-bold">0</h3></div></div>
        <div class="col-sm-6 col-xl-3"><div class="card card-stat p-3 text-center">
          <h6>Pending</h6><h3 id="pendingUsers" class="text-warning fw-bold">0</h3></div></div>
        <div class="col-sm-6 col-xl-3"><div class="card card-stat p-3 text-center">
          <h6>Reports</h6><h3 id="" class="text-danger fw-bold">0</h3></div></div>
      </div>

      <!-- User Management -->
      <div class="card card-stat p-3">
        <div class="d-flex justify-content-between">
          <h6>Posts</h6>
          <button class="btn btn-sm btn-outline-success">Download Report</button>
        </div>
        <div class="table-responsive mt-3">
          <table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Post Title</th>
                <th>Post Content</th>
                <th>Date Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="">
                 <?php if($data->num_rows > 0):?>
                  <?php while($row = $data->fetch_assoc()):?>
                      <td><?= $row['post_id']?></td>
                      <td><?= $row['post_title']?></td>
                      <th><?= $row['post_content']?></th>
                      <td><?= $row['created_at']?></td>
                      <td><button class="btn btn-outline-primary">Delete</button></td>
                    </tr>
                   <?php endwhile;?>
                <?php endif;?>
            </tbody>
          </table>
        </div>  
      </div>
        <div class="card card-box p-3 mt-3 shadow">
            <h6>Updates</h6>
            <ul>
           
            </ul>
        </div>
      </div>
    </main>
  <!-- </div> -->
</div>

<!-- Create Post Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="create.php">
      <div class="modal-header">
        <h5 class="modal-title">Create Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
         <div class="mb-3">
            <label for="text" class="form-label">Post Title</label>
            <input class="form-control" type="text" id="post_title" name="post_title" required>
          </div>
        <textarea class="form-control" name="post_content" rows="4" placeholder="Enter post"></textarea>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="bootstrap.bundle.js"></script> -->
</body>
</html>