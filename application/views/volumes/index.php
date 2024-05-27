<div class="bg-gray-200 text-sm">
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-3">
              <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
              <li class="breadcrumb-item active fw-light" aria-current="page">Volumes</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- Page Header-->
      <header class="py-4">
    <div class="container-fluid py-2">
        <h1 class="h3 fw-normal mb-0">Volumes List</h1>
        <br>
        <div class="d-flex justify-content-between align-items-center">
            <!-- Add User Button -->
            <a href="<?= base_url('volumes/newvolume'); ?>" class="btn btn-primary">Add Volume</a>
            <!-- Filters -->
            <div class="d-flex align-items-center">
                <!-- Role Filter -->
                <!-- Status Filter -->
                <!-- Search Bar -->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2" name="search_query" id="search_query">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="searchUsers()">Search</button>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
function limit_words($string, $word_limit) {
    $words = explode(" ", $string);
    if (count($words) > $word_limit) {
        $words = array_slice($words, 0, $word_limit);
        $string = implode(" ", $words) . '...';
    }
    return $string;
}
?>




          <!-- ============================================================== -->


                                        <div class="container">
        <h3><?php echo $title ?></h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Volume Name</th>
                    <th>Description</th>
                    <th>Date Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- start of the loop -->
                <?php foreach($volumes as $volume) : ?>
                <tr>
                    <td><?php echo $volume['vol_name']; ?></td>
                    <td><?php echo limit_words($volume['description'], 15); ?></td>
                    <td><?php echo $volume['date_at']; ?></td>
                    <td class="actions">
                      <a href="<?php echo base_url('/volumes/view/'.$volume['volumeid']); ?>"><img src="<?php echo base_url('assets/images/icons/view.png'); ?>" title="To User Profile"></a>
                      <a href="<?php echo base_url('/volumes/editvolume/'.$volume['volumeid']); ?>"><img src="<?php echo base_url('assets/images/icons/edit.png'); ?>" title="Edit User"></a>
                      <a href="<?= base_url('volumes/deletevolume/' .$volume['volumeid']); ?>"><img src="<?php echo base_url('assets/images/icons/delete.png'); ?>" title="Delete User"></a>
                        <!-- <a href="<?= base_url('volumes/deletevolume/' .$volume['volumeid']); ?>" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-bs-tooltip="tooltip" data-bs-placement="top" title="Delete Volume">
                          <img src="assets/images/delete.png" class="iconify-md" />
                        </a> -->

                    </td>
                </tr>
                <?php endforeach; ?>
                <!-- end of the loop -->
            </tbody>
        </table>
    </div>

        <!-- ============================================================== -->


      <!-- MODAL FOR DELETE CONFIRMATION -->

      <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Volume</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Volume?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" href="<?= base_url('volumes/deletevolume/' .$volume['volumeid']); ?>">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF MODAL FOR DELETE CONFIRMATION -->




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





