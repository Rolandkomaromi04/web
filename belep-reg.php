<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f2ff; /* using the desired color */
        }
       .card {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
       .form-group {
            margin-bottom: 20px;
        }
       .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
        }
       .btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
       .btn:hover {
            background-color: #3e8e41;
        }
       .signup-form {
            width: 45%;
            margin-right: 20px;
        }
       .login-form {
            width: 45%;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Bejelentkezés</h2>
        <div class="signup-form">
            <h3>Még nem regisztráltál?</h3>
            <h3>Regisztráció</h3>
            <form id="signup-form">
                <div class="form-group">
                    <label for="username">Felhasználónév:</label>
                    <input type="text" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Jelszó:</label>
                    <input type="password" id="password" class="form-control">
                </div>
                <button class="btn" type="submit">Regisztráció</button>
            </form>
        </div>
        <div class="login-form">
            <h3>Bejelentkezés</h3>
            <form id="login-form">
                <div class="form-group">
                    <label for="username">Felhasználónév:</label>
                    <input type="text" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Jelszó:</label>
                    <input type="password" id="password" class="form-control">
                </div>
                <button class="btn" type="submit">Bejelentkezés</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>