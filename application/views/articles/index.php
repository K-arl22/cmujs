<div class="bg-gray-200 text-sm">
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-3">
              <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
              <li class="breadcrumb-item active fw-light" aria-current="page">Articles</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- Page Header-->
      <header class="py-4">
    <div class="container-fluid py-2">
        <h1 class="h3 fw-normal mb-0">Articles List</h1>
        <br>
        <div class="d-flex justify-content-between align-items-center">
            <!-- Add User Button -->
            <a href="<?= base_url('articles/newarticle'); ?>" class="btn btn-primary">Add Article</a>
            <!-- Filters -->
            <div class="d-flex align-items-center">
                <!-- Role Filter -->
                <div class="dropdown mx-2">
                    <button class="btn btn-success dropdown-toggle" type="button" id="volumeFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Volumes
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="volumeFilterDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url('Articles'); ?>">All Articles</a></li>
                        <?php foreach($volumes as $volume): ?>
                            <li><a class="dropdown-item" href="<?php echo base_url('Articles?volumeid=' . $volume['volumeid']); ?>"><?php echo $volume['vol_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- Status Filter -->
                <div class="dropdown mx-2">
                    <button class="btn btn-success dropdown-toggle" type="button" id="statusFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="statusFilterDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url('articles/index?published=Published'); ?>">Published</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('articles/index?published=Unpublished'); ?>">Unpublished</a></li>
                    </ul>
                </div>
                <!-- Search Bar -->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2" name="search_query" id="search_query">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="searchArticles()">Search</button>
                </div>
            </div>
        </div>
    </div>
</header>
          <!-- ============================================================== -->
                                        <div class="container">
        <h3 class="text-center mt-5"><?php echo $title ?></h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Volume</th>
                    <th>Author Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($articles as $article) : ?>
                <tr>
                    <td><b><?php echo $article['articles_title']; ?></b></td>
                    <!-- <td class="abstract"><?php echo limit_words($article['abstract'], 15); ?>....</td> -->
                    <!-- <td><?php echo $article['articles_keywords']; ?></td> -->
                    <td><?php echo $article['vol_name']; ?></td>
                    <td><?php echo $article['author_name']; ?></td>
                    <td>
                          <?php if ($article['articles_published'] == 2): ?>
                            <span style="color: red;">Unpublished</span>
                            <?php else: ?>
                            <span style="color: green;">Published</span>
                          <?php endif; ?>
                        </td>
                    <td class="actions">
                        <a href="<?php echo base_url('articles/view/'.$article['articleid']); ?>"><img src="<?php echo base_url('assets/images/icons/view.png'); ?>" title="View Article"></a>
                        <a href="<?php echo base_url('articles/editarticle/'.$article['articleid']); ?>"><img src="<?php echo base_url('assets/images/icons/edit.png'); ?>" title="Edit Article"></a>
                        <!-- <a href="#"><img src="assets/images/icons/assign.png" title="Assign Article"></a> -->
                        <a href="<?= base_url('articles/deletearticle/'.$article['articleid']); ?>"><img src="<?= base_url('assets/images/icons/delete.png'); ?>" title="Delete User"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php
function limit_words($string, $word_limit) {
    $words = explode(" ", $string);
    return implode(" ", array_slice($words, 0, $word_limit));
}
?>

<script>
    function searchArticles() {
        var searchQuery = document.getElementById('search_query').value;
        window.location.href = "<?php echo base_url('articles/index?search='); ?>" + searchQuery;
    }
</script>


        <!-- ============================================================== -->




<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 1700px;
            margin: 0 auto;
            padding: 10px;
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
        }
        .table th {
            background-color: #f2f2f2;
            color: #333;
        }
        .table tbody tr:hover {
            background-color: #f9f9f9;
        }
        .abstract {
            max-width: 500px;

        }
        .actions img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }
    </style>