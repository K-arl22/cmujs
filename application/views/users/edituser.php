<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
  <!-- Include the external CSS file -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
    <br>
    <br>
  <!-- Navigation link to go back -->
  <a href="<?php echo base_url("Users")?>" style="display: inline-block; margin-left: 10px; padding: 10px 20px; background-color: green; color: white; text-align: center; text-decoration: none; border-radius: 5px;">Back</a>
  <div class="wrapper">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <!-- Form title -->
            <div style="text-align: center;">
              <h2>Edit User</h2>
            </div>
            <?php echo validation_errors(); ?>
            <!-- Open the form only once -->
            <?php echo form_open_multipart('users/update_user'); ?>
              <!-- Hidden input for user ID -->
              <input type="hidden" name="userid" value="<?php echo $user['userid']; ?>" />
              <div class="input-box">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $user['complete_name']; ?>" placeholder="Complete Name" required>
              </div>
              <div class="input-box">
                <label for="name"  style="margin-top: 20px; ">Email:</label>
                <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>" placeholder="Email" required>
              </div>
              <div class="input-box">
                <label for="name" style="margin-top: 40px; ">Contact Number:</label>
                <input type="text" class="form-control" name="cnum" value="<?php echo $user['contact_number']; ?>" placeholder="Contact Number" required>
              </div>
              <div class="input-box" style="margin-top: 45px;">
                <label for="name" style="margin-top: 30px; ">Password:</label>
                <input type="text" class="form-control" name="pword" value="<?php echo $user['pword']; ?>" placeholder="Password" required>
              </div>
              <div class="input-box">
                  <label for="role" style="margin-top: 60px;">Role:</label>
                  <select name="role" class="form-control" required>
                      <option value="2" <?php echo $user['role'] == 2 ? 'selected' : ''; ?>>Researcher/Author</option>
                      <option value="3" <?php echo $user['role'] == 3 ? 'selected' : ''; ?>>Evaluator</option>
                  </select>
              </div>
              <br>
              <div class="input-box">
                  <label for="status" style="margin-top: 45px;">Status:</label>
                  <select name="status" class="form-control" required>
                      <?php if ($user['status'] == 1): ?>
                          <option value="1" selected>Active</option>
                          <option value="2">Inactive</option>
                      <?php else: ?>
                          <option value="1">Active</option>
                          <option value="2" selected>Inactive</option>
                      <?php endif; ?>
                  </select>
              </div>
              <div class="input-box" style="margin-top: 80px;">
                <input id="profilePicInput" class="center form-control" type="file" name="profile_pic" accept="image/*">
              </div>
              <!-- Submit button -->
              <div class="input-box button" style="text-align: center; margin-top: 5px;">
              <button type="submit" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Update User</button>
              </div>
            <!-- Close the form -->
            <?php echo form_close(); ?>
          </div>
          <div class="col-lg-6">
            <!-- Display the current profile picture -->
            <center class="mt-4">
              <img src="<?php echo site_url(); ?>assets/images/users/<?php echo $user['profile_pic']; ?>" id="profilePic" class="rounded-circle" width="200">
            </center>
            <br>
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