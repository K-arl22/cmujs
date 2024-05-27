
        <?php
function truncate_words($text, $limit) {
    $words = explode(" ", $text);
    if (count($words) > $limit) {
        return implode(" ", array_slice($words, 0, $limit)) . "...";
    } else {
        return $text;
    }
}
?>



        <main>
            <section class="hero text-light text-center">
                <div class="container-sm">
                    <div class="hero-inner">
                        <h1 class="hero-title h2-mobile mt-0 is-revealing">Welcome to CMU Journal of Science</h1>
                        <p class="hero-paragraph is-revealing">Discover Written Works from Excellent People</p>
                        <p class="hero-cta is-revealing"><a class="button button-secondary button-shadow" href="#">Explore More . . .</a></p>

                    </div>
                </div>
            </section>




            <!-- <section class="features-extended section">
                <div class="container">
                    <div class="features-extended-inner section-inner has-top-divider">
                        <div class="features-extended-header text-center">
                            <div class="container-sm">  
                            </div>
                        </div> -->




<br> <br> <br> <br> <br> <br> <hr>

<br>
<center><h3><b>Latest Issue</b></h3></center>
<br>
<center>
    <div class="current-volume">
        <?php 
        if (!empty($volumes)) {
            usort($volumes, function($a, $b) {
                return strtotime($b['date_at']) - strtotime($a['date_at']);
            });

            $latest_volume = reset($volumes);
        
            ?>
            <img src="./assets/images/VolumeImage.png" class="volume-picture" alt="Volume Picture" width="160" height="217" style="margin-right: 20px;">
            <div>
                <h4 class="card-title"><?php echo $latest_volume['vol_name']; ?></h4>
                <p class="card-text" style="margin-bottom: 10px;"><b>Description:</b> <?php echo truncate_words($latest_volume['description'], 25); ?></p>
                <p class="card-text" style="margin-bottom: 0;"><b>Date Published:</b> <?php echo date('F j, Y', strtotime($latest_volume['date_at'])); ?></p>
            </div>
            <?php
        } else {
            echo "<p>No volumes available.</p>";
        }
        ?>
    </div>
</center>

                            <!-- Article Section -->
                            <br> <br> <br>
                            <center><h3><b>Available Articles</b></h3></center>
<div class="article-section">
    <div class="container d-flex">
        <!-- Information Board -->
        <div class="info-board-card" style="border: 1px solid #ddd; padding: 20px; border-radius: 5px; width: 25%; margin-right: 20px;">
            <h4>Information Board</h4>
            <div class="info-board" style="margin-top: 10px;">
                <!-- <h5>Announcements</h5> -->
                <ul>
                    <h4>New Articles!!!</h4>
                    <hr>
                    <p>There are new articles released!</p>
                </ul>
                <br>
                <h5>Volumes</h5>
                <ul>
                    <?php foreach($volumes as $volume) : ?>
                        <li><?php echo $volume['vol_name']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Articles Section -->
        <div class="articles" style="flex-grow: 1;">
            <?php foreach($articles as $article) : ?>
                <?php if ($article['articles_published'] != 2) : ?>
                    <br>
                    <div class="card d-flex flex-row align-items-start" style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                        <div class="article-content d-flex flex-row align-items-start">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $article['articles_title']; ?></h4>
                                <br>
                                <p class="card-text"><b>Abstract:</b> <?php echo truncate_words($article['articles_abstract'], 25); ?></p>
                                <p class="card-text"><b>DOI:</b> <?php echo $article['articles_doi']; ?></p>
                                <p class="card-text"><b>Date Published:</b> <?php echo date('F j, Y', strtotime($article['articles_date_published'])); ?></p>
                                <a href="<?= base_url('./assets/articles/' . $article['articles_filename']); ?>" class="pdf-link" target="_blank">PDF</a>
                            </div>
                            <!-- Article Picture -->
                            <img src="./assets/images/ArticleImage.png" class="article-picture" alt="Article Picture" width="160" height="217">
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>



<style>
    .container {
        display: flex;
    }
    .info-board-card {
        border: 1px solid #ddd; /* Border color */
        padding: 20px; /* Padding inside the card */
        border-radius: 5px; /* Rounded corners */
        width: 25%; /* Width of the info board */
        margin-right: 20px; /* Space to the right of the info board */
    }
    .info-board h5 {
        margin-bottom: 10px; /* Space between headings and lists */
    }
    .info-board ul {
        padding-left: 20px; /* Indent list items */
        list-style-type: disc; /* Bulleted list */
    }
    .articles {
        flex-grow: 1; 
        width: 220px;
        margin-left: 20px;
    }
    .card {
    display: flex;
    border: 1px solid #ddd; 
    padding: 10px; 
    border-radius: 5px; 
    margin-bottom: 20px; 
    width: 130%; /* Set the width to 100% */
}
    .article-content {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    .article-section {
        width: 80%;
    }
    .card-body {
        flex: 1;
    }
    .article-picture {
        margin-top: 60px;
        margin-left: 20px;
        align-self: flex-start;
    }
    .current-volume {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center; 
    margin-bottom: 20px; 
}

.volume-picture {
    margin-right: 20px;
    flex-shrink: 0; 
}

.volume-info {
    flex-grow: 1;
    text-align: left; 
}

</style>


            