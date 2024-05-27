<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Centered Button</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="center">
<!-- <a href="<?php echo base_url('researchers/submitarticle'); ?>" class="button">Submit Article</a> -->
</div>

</body>
</html>

<style>
    body, html {
  height: 100%;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.center {
  text-align: center;
}

.button {
  display: inline-block;
  padding: 10px 20px;
  background-color: green;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-size: 18px;
  margin-top: 150px;
}

</style>