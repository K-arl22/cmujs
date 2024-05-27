<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="<?php echo base_url("Articles")?>" style="display: inline-block; margin: 10px 0; padding: 10px 20px; background-color: green; color: white; text-align: center; text-decoration: none; border-radius: 5px; margin-left: 15px;">Back</a>

    <div class="wrapper">
        <h2>Add Article</h2>
        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('articles/newarticle'); ?>

            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Title" required>
            </div>
            <div class="form-group">
                <label>Abstract</label>
                <textarea name="abstract" id="abstract" placeholder="Enter abstract"></textarea>
                <script>
                    CKEDITOR.replace('abstract');
                </script>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="keywords" placeholder="Keywords" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="doi" placeholder="DOI" required>
            </div>
            <div class="form-group">
                <label>Author</label>
                <select class="form-control" name="authorid" required>
                    <option value="">Select Author</option>
                    <?php foreach($authors as $author): ?>
                        <option value="<?php echo $author['userid']; ?>"><?php echo $author['complete_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="volumeid" required>
                    <option value="">Select Volume</option>
                    <?php foreach($volumes as $volume): ?>
                        <option value="<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>File (PDF)</label>
                <input type="file" name="filename" class="form-control form-control-line" accept=".pdf">
            </div>
            <div class="input-box button">
                <button type="submit">Add Article</button>
            </div>
        </form>
    </div>
</body>
</html>




<style>

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
html, body {
    height: 100%;
    margin: 0;
}
body {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #4070f4;
}
.wrapper {
    max-width: 1000px;
    width: 120%;
    background: #fff;
    padding: 34px;
    border-radius: 6px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 auto;
}
.wrapper h2 {
    font-size: 22px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}
.wrapper h2::before {
    content: '';
    display: block;
    height: 3px;
    width: 28px;
    background: #4070f4;
    margin: 0 auto 10px;
}
form {
    width: 100%;
}
.form-group {
    margin: 18px 0;
}
.form-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 17px;
    color: #333;
}
.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 15px;
    font-size: 17px;
    border: 1.5px solid #C7BEBE;
    border-radius: 6px;
    transition: border-color 0.3s ease;
}
.form-group input:focus,
.form-group input:valid,
.form-group select:focus,
.form-group select:valid,
.form-group textarea:focus,
.form-group textarea:valid {
    border-color: #4070f4;
}
.input-box.button button {
    width: 100%;
    padding: 15px;
    font-size: 18px;
    color: #fff;
    background: #4070f4;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.input-box.button button:hover {
    background: #0e4bf1;
}


</style>