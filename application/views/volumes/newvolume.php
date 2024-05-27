<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 
    <link rel="stylesheet" href="style.css">
   </head>
   
   <? echo validation_errors(); ?>
   <body>
   <a href="<?php echo base_url("Volumes")?>" style="display: inline-block; margin: 10px 0; padding: 10px 20px; background-color: green; color: white; text-align: center; text-decoration: none; border-radius: 5px; margin-left: 15px;">Back</a>
  <div class="wrapper">
    <h2>Adding Volume</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('volumes/newvolume'); ?>
      <div class="input-box">
        <input type="text" class="form-control" name="volume_name" placeholder="Volume Name" required>
      </div>
      <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" placeholder="Enter Description"></textarea>
                <script>
                    CKEDITOR.replace('description');
                </script>
      </div>
      <div class="policy">
      </div>
      <div class="input-box button">
        <button type="submit">Add Volume</button>
      </div>
      <div class="text">
        <!-- <h3>Already have an account? <a href="#">Login now</a></h3> -->
      </div>
    </form>
  </div>
</body>
</html>

<style>

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  background: #4070f4;
}
.wrapper {
  position: relative;
  max-width: 1150px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  margin: 0 auto;
}

.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #4070f4;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #4070f4;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #0e4bf1;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
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
</style>
