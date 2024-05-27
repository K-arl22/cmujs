
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
              <h3 class="page-title mb-0 p-0">Articles</h3>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Articles">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Articles
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
              <div class="text-end upgrade-btn">
                <a
                  href="Articles"
                  class="btn btn-danger d-none d-md-inline-block text-white"
                  target="_blank"
                  >...</a
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
                  Welcome to Articles
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
                    <th>Title</th>
                    <th>File Name</th>
                    <th>Date Submitted</th>
                    <th>Date Forwarded for Review</th>
                    <th>Date Approved</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($articlesSubmitted as $articleSubmitted) : ?>
                <tr>
                    <td><?php echo $articleSubmitted['title']; ?></td>
                    <td><?php echo $articleSubmitted['filename']; ?></td>
                    <td><?php echo date('F j, Y', strtotime($articleSubmitted['date_submitted'])); ?></td>
                    <td><?php echo date('F j, Y', strtotime($articleSubmitted['date_forwarded_review'])); ?></td>
                    <td><?php echo date('F j, Y', strtotime($articleSubmitted['date_approved'])); ?></td>
                    <td class="actions">
                        <a href="#"><img src="assets/images/view.png" title="View Article"></a>
                        <a href="#"><img src="assets/images/edit.png" title="Edit Article"></a>
                        <a href="#"><img src="assets/images/assign.png" title="Assign Evaluator"></a>
                        <a href="#"><img src="assets/images/delete.png" title="Delete Article"></a>
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
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            margin-top: 0;
            margin-bottom: 10px;
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
        }
        .table th {
            background-color: #f2f2f2;
            color: #333;
        }
        .table tbody tr:hover {
            background-color: #f9f9f9;
        }
        /* Adjust spacing for dates */
        .table td:nth-child(3),
        .table td:nth-child(4),
        .table td:nth-child(5) {
            width: 20%;
        }
        .actions img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }
    </style>