<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px; /* Increased width */
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex; /* Added */
            align-items: center; /* Vertically center items */
        }
        .article-picture {
            margin-right: 20px; /* Added margin for spacing */
        }
        .article-details {
            flex-grow: 1; /* Takes remaining space */
        }
        h2 {
            color: #333;
        }
        .post-date {
            color: #888;
        }
        .user-body {
            margin-top: 10px;
            padding: 10px;
            border-top: 1px solid #ccc;
        }
        .pdf-link {
            margin-top: 10px; /* Added space between image and PDF link */
        }
    </style>
</head>
<body>
    <br>
    <a href="<?php echo base_url("Articles")?>" style="display: inline-block; margin: 10px 0; padding: 10px 20px; background-color: green; color: white; text-align: center; text-decoration: none; border-radius: 5px; margin-left: 15px;">Back</a>
    <br>
    <div class="container">
    <img src="<?= base_url('./assets/images/ArticleImage.png'); ?>" width="160" height="217">
        <div class="article-details" style="margin-left: 20px;">
            <h2><?php echo $article['title']; ?></h2>
            <small class="post-date"> Posted on: <?php echo $article['date_published'];?></small>
            <br>
            <div class="user-body">
                <?php echo $article['abstract'] ?>
                <br>
                <br>
                DOI: <?php echo $article['doi'] ?><br>
                Keywords: <?php echo $article['keywords'] ?> 
            </div>
            <a href="<?= base_url('./assets/articles/' . $article['filename']); ?>" class="pdf-link" target="_blank">PDF</a>
        </div>
    </div>
</body>
</html>
