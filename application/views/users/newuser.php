<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration or Sign Up form in HTML CSS | CodingLab</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <br>
  <a href="<?php echo base_url("Users")?>" style="display: inline-block; margin-left: 10px; padding: 10px 20px; background-color: green; color: white; text-align: center; text-decoration: none; border-radius: 5px;">Back</a>
  <div class="wrapper">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <div>
            </div>
            <div style="text-align: center;">
              <h2>Registration</h2>
            </div>
            <?php echo validation_errors(); ?>
            <!-- Open the form only once -->
            <?php echo form_open_multipart('users/newuser'); ?>
            <div class="input-box">
              <input type="text" class="form-control" name="name" placeholder="Complete Name" required>
            </div>
            <div class="input-box">
              <input type="text" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
              <input type="text" class="form-control" name="number" placeholder="Phone Number" required>
            </div>
            <div class="input-box">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="input-box">
              <select class="form-control" name="role" required>
                <option value="">Select Role</option>
                <option value="Evaluator">Evaluator</option>
                <option value="Researcher">Researcher/Author</option>
              </select>
            </div>
            <div class="input-box">
              <input id="profilePicInput" class="center form-control" type="file" name="profile_pic" accept="image/*">
            </div>
            <div class="policy">
              <input type="checkbox" required>
              <h3>I accept all terms & condition</h3>
            </div>
            <div class="input-box button" style="text-align: center;">
              <button type="submit" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Add User</button>
            </div>
            <!-- Close the form -->
            <?php echo form_close(); ?>
          </div>
          <div class="col-lg-6">
            <center class="mt-4">
              <!-- Remove the nested form -->
              <img src="<?php echo base_url("assets/images/users/no-image.jpg ");?>" id="profilePic" class="rounded-circle" width="260">
            </center>
          </div>
        </div>
      </div>
    </div>
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

body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #4070f4;
}

.wrapper {
  position: relative;
  max-width: 800px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  margin: 0 auto;
}


.wrapper h2 {
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}

.wrapper h2::before {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}

.wrapper form {
  margin-top: 30px;
}

.wrapper form .input-box {
  height: 52px;
  margin: 18px 0;
}

form .input-box input {
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #c7bebe;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}

.input-box input:focus,
.input-box input:valid {
  border-color: #4070f4;
}

form .policy {
  display: flex;
  align-items: center;
}

form h3 {
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}

.input-box.button input {
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #4070f4;
  cursor: pointer;
}

.input-box.button input:hover {
  background: #0e4bf1;
}

form .text h3 {
  color: #333;
  width: 100%;
  text-align: center;
}

form .text h3 a {
  color: #4070f4;
  text-decoration: none;
}

form .text h3 a:hover {
  text-decoration: underline;
}

.row {
  display: flex;
  flex-wrap: wrap;
}

.col-lg-6 {
  flex: 0 0 50%;
  max-width: 50%;
  padding: 0 15px;
}

.card-body {
  display: flex;
  flex-wrap: wrap;
}

/* Your existing CSS styles */

/* Add this CSS to adjust the layout */
.col-lg-6 {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.input-box {
  margin-bottom: 20px; /* Adjust spacing between input boxes */
}



</style>


