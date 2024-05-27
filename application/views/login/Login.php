<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url("<?php echo base_url('assets/images/cmufront.jpg'); ?>");
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .card {
            width: 400px;
            height: 400px;
            padding: 40px;
            background-color: green;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.5);
            border: 2px solid #ccc;
        }

        .card h2 {
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }

        .card form {
            display: flex;
            flex-direction: column;
        }

        .card form label {
            margin-bottom: 8px;
            color: #555;
        }

        .card form input {
            padding: 14px; 
            margin-bottom: 24px; 
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .card form button {
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .card form button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 16px;
            text-align: center;
        }

        .top-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .top-button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <a href="<?php echo base_url("Home"); ?>" class="top-button">Home</a>

    <div class="card">
        <h2>Login</h2>
        <?php if($this->session->flashdata('error')): ?>
            <p class="error"><?php echo $this->session->flashdata('error'); ?></p>
        <?php endif; ?>
        <form action="<?php echo site_url('auth/login'); ?>" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
