<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <br>
    <a href="<?php echo base_url("Users")?>" style="display: inline-block; margin-left: 10px; padding: 10px 20px; background-color: green; color: white; text-align: center; text-decoration: none; border-radius: 5px;">Back</a>
    <br>
    <br>
    <div class="container">
        <div class="user-info">
            <h2><?php echo $user['complete_name']; ?></h2>
            <small class="post-date">Created on: <?php echo $user['date_created']; ?></small>
            <div class="user-body">
                <div class="info-item">
                    <img src="<?php echo base_url("assets/images/icons/email.png")?>" width="20px" height="20px" style="margin-right: 10px;">
                    <p><?php echo $user['email']; ?></p>
                </div>
                <div class="info-item">
                    <img src="<?php echo base_url("assets/images/icons/telephone.png")?>" width="20px" height="20px" style="margin-right: 10px;">
                    <p><?php echo $user['contact_number']; ?></p>
                </div>
                <div class="status">
                    <?php if ($user['status'] == 2): ?>
                        <span style="color: red;">Inactive</span>
                    <?php else: ?>
                        <span style="color: green;">Active</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="profile-pic">
            <img src="<?php echo site_url(); ?>assets/images/users/<?php echo $user['profile_pic']; ?>" alt="Profile Picture">
        </div>
    </div>

</body>
</html>



<style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 1000px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        h2 {
            color: #333;
        }
        .post-date {
            color: #888;
        }
        .user-body {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
            width: 60%;
        }
        .user-info {
            display: flex;
            flex-direction: column;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }
        .info-item h4 {
            margin: 50;
        }
        .profile-pic {
            width: 30%;
            display: flex;
            justify-content: center;
        }
        .profile-pic img {
            border-radius: 50%;
            width: 250px;
            height: 250px;
            object-fit: cover;
        }
        .status {
            margin-top: 10px;
        }
    </style>


