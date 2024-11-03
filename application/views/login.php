<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Logbook RSGM</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo-mini.png" />
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .container {
            width: 400px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 32px;
            display: flex;
            flex-direction: column;
        }

        .logo {
            margin-bottom: 32px;
            text-align: center;
        }

        .logo img {
            width: 100px;
            height: auto;
        }

        .content h1 {
            font-size: 2rem;
            margin-bottom: 32px;
            text-align: center;
        }

        .content label {
            display: block;
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .content input[type="text"],
        .content input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        .content button[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .content button[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="<?= base_url() ?>assets/images/logo.png" alt="Logo RSGM">
        </div>
        <div class="content">
            <h1>E-Logbook RSGM</h1>
            <form action="<?= base_url(); ?>cek_login" class="form-horizontal my-4" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" id="loginButton">Login</button>
            </form>
        </div>
    </div>

    <script src="scripts.js"></script>

</body>

</html>