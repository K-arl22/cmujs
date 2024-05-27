
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
              <h3 class="page-title mb-0 p-0">Authors</h3>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Users">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Authors
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
              <div class="text-end upgrade-btn">
                <a
                  href="Users"
                  class="btn btn-danger d-none d-md-inline-block text-white"
                  target="_blank"
                  >....</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  Welcome to Authors
                </div>
              </div>
            </div>
          </div>
        

          


          <!-- ============================================================== -->

                                        <div class="container">
        <h3 class="text-center mt-5"><?php echo $title ?></h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Author Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($authors as $author) : ?>
                <tr>
                    <td><?php echo $author['author_name']; ?></td>
                    <td><?php echo $author['email']; ?></td>
                    <td><?php echo $author['contact_num']; ?></td>
                    <td><?php echo $author['title']; ?></td>
                    <td class="actions">
                        <a href="#"><img src="assets/images/profile.png" title="To Author Profile"></a>
                        <a href="#"><img src="assets/images/delete.png" title="Delete Author"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>




        <!-- ============================================================== -->









<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 1200px;
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
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
            vertical-align: top;
            border-bottom: 1px solid #ddd;
            font-size: 17px;
        }
        .table th {
            background-color: #f2f2f2;
            color: #333;
        }
        .table tbody tr:hover {
            background-color: #f9f9f9;
        }
        .actions img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }
    </style>



