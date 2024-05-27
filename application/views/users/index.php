<div class="bg-gray-200 text-sm">
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-3">
              <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
              <li class="breadcrumb-item active fw-light" aria-current="page">Users</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- Page Header-->
      <header class="py-4">
    <div class="container-fluid py-2">
        <h1 class="h3 fw-normal mb-0">Users List</h1>
        <br>
        <div class="d-flex justify-content-between align-items-center">
            <!-- Add User Button -->
            <a href="<?= base_url('users/newuser'); ?>" class="btn btn-primary">Add User</a>
            <!-- Filters -->
            <div class="d-flex align-items-center">
                <!-- Role Filter -->
                <div class="dropdown mx-2">
                    <button class="btn btn-success dropdown-toggle" type="button" id="roleFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Role
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="roleFilterDropdown">
                    <li><a class="dropdown-item" href="<?php echo base_url('Users'); ?>">All Users</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('users/index?role=Evaluator'); ?>">Evaluator</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('users/index?role=Researcher/Contributor'); ?>">Researcher/Author</a></li>
                        <!-- <li><a class="dropdown-item" href="<?php echo base_url('users/index?role=User'); ?>">User</a></li> -->
                    </ul>
                </div>
                <!-- Status Filter -->
                <div class="dropdown mx-2">
                    <button class="btn btn-success dropdown-toggle" type="button" id="statusFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="statusFilterDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url('users/index?status=Active'); ?>">Active</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('users/index?status=Inactive'); ?>">Inactive</a></li>
                    </ul>
                </div>
                <!-- Search Bar -->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2" name="search_query" id="search_query">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="searchUsers()">Search</button>
                </div>
            </div>
        </div>
    </div>
</header>



          <!-- ============================================================== -->
<form>
    <div class="container">
        <h3><?php echo $title ?></h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Profile</th>
                    <th>Complete Name</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- start of the loop -->
                <?php foreach($users as $user) : ?>
                    <?php if ($user['role'] == 1) continue; // Skip this iteration if role is 1 ?>
                    <tr>
                      <td>
                      <img src="<?php echo base_url('assets/images/users/' . ($user['profile_pic'] ? $user['profile_pic'] : 'no-image.jpg')); ?>" class='rounded-circle' width='80' height='80'>
                      </td>
                        <td><?php echo $user['complete_name']; ?></td>
                        <td>
                            <?php
                            if ($user['role'] == 2) {
                                echo 'Researcher/Author';
                            } elseif ($user['role'] == 3) {
                                echo 'Evaluator';
                            } elseif ($user['role'] == 4) {
                                echo 'User';
                            }
                            ?>
                        </td>
                        <td>
                          <?php if ($user['status'] == 2): ?>
                            <span style="color: red;">Inactive</span>
                            <?php else: ?>
                            <span style="color: green;">Active</span>
                          <?php endif; ?>
                        </td>
                        <td class="actions">
                            <a href="<?= base_url('users/view/'.$user['userid']); ?>"><img src="<?= base_url('assets/images/icons/profile.png'); ?>" title="To User Profile"></a>
                            <a href="<?= base_url('users/edituser/'.$user['userid']); ?>"><img src="<?= base_url('assets/images/icons/edit.png'); ?>" title="Edit User"></a>
                            <a href="<?= base_url('users/deleteuser/'.$user['userid']); ?>"><img src="<?= base_url('assets/images/icons/delete.png'); ?>" title="Delete User"></a>
                            <!-- <a href="<?= base_url('users/deleteuser/' .$user['userid']); ?>" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-bs-tooltip="tooltip" data-bs-placement="top" title="Delete Volume">
                              <img src="assets/images/icons/delete.png" class="iconify-md" />
                            </a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- end of the loop -->
            </tbody>
        </table>
    </div>
</form>

        <!-- ============================================================== -->



    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 1700px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            margin-top: 0;
            font-weight: bold;
            color: #333;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
        }
        .table th, .table td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
        }
        .table th {
            background-color: #f2f2f2;
            color: #333;
        }
        .table tbody tr:hover {
            background-color: #f9f9f9;
        }
        .table img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }
        .actions {
            text-align: center;
        }
    </style>



<!-- For Searching -->
<script>
    function searchUsers() {
        var searchQuery = document.getElementById('search_query').value;
        window.location.href = "<?php echo base_url('users/index?search='); ?>" + searchQuery;
    }
</script>






