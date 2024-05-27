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
            display: flex;
            flex-direction: column;
            max-width: 1000px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .volume-info {
            display: flex;
            margin-bottom: 20px;
        }
        .volume-info img {
            width: 160px;
            height: auto;
            border-radius: 8px 0 0 8px;
        }
        .content {
            padding: 20px;
        }
        h2 {
            color: #333;
            margin-top: 0;
        }
        .post-date {
            color: #888;
        }
        .user-body {
            margin-top: 10px;
            border-top: 1px solid #ccc;
        }
        .article-card {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .article-card h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
<a href="<?php echo base_url("Volumes")?>" style="display: inline-block; margin: 10px 0; padding: 10px 20px; background-color: green; color: white; text-align: center; text-decoration: none; border-radius: 5px; margin-left: 15px;">Back</a>
    <div class="container">
        <div class="volume-info">
            <img src="<?php echo base_url('assets/images/VolumeImage.png'); ?>" class="article-picture" alt="Article Picture">
            <div class="content">
                <h2><?php echo $volume['vol_name']; ?></h2>
                <small class="post-date">Posted on: <?php echo $volume['date_at'];?></small>
                <div class="user-body">
                    <?php echo $volume['description']; ?>
                </div>
            </div>
        </div>
        <?php if (!empty($articles)) : ?>
            <h3>Articles in this Volume</h3>
            <?php foreach ($articles as $article) : ?>
                <div class="article-card">
                    <h3><?php echo $article['title']; ?></h3>
                    <p><?php echo limit_words($article['abstract'], 20); ?></p>
                    <a href="<?php echo base_url('articles/view/'.$article['articleid']); ?>">Read more</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No articles found in this volume.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
function limit_words($string, $word_limit) {
    $words = explode(" ", $string);
    if (count($words) > $word_limit) {
        return implode(" ", array_slice($words, 0, $word_limit)) . '...';
    } else {
        return $string;
    }
}
?>
