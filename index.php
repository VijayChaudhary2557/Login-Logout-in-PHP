<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body
        {
            background-color: #eee7d7;
        }
        .text-center {
            word-spacing: 20px;
            letter-spacing: 3px;
        }
        .logIn, .rag {
            border: 1px solid gray;
            border-radius: 5px;
            padding: 10px;
        }
        .logIn {
            width: 350px;
            /* height: 350px; */
        }
        .red {
            color:#e4636e;
        }
        .btn {
            background-color: #feb843;
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
        .box1{
            padding: 15px;
            background-color: white;
            /* height: 380px; */
        }
        .box2 {
            padding: 15px;
            background-color: white;
            margin-top: 15px;
        }
        .rag {
            width: 350px;
        }
        .err {
            font-size: 14px;
            color: #e4636e;
        }
    </style>
</head>
<body>
    <div class="text-center">
        <h1><u>USER RAGISTRATION IN PHP</u></h1>
        <h1><u>WITH LOGIN FORM</u></h1>
    </div>
    <div class="container d-flex justify-content-around align-items-center">
        <div class="box1 mt-5">
            <div class="logIn">
                <h2 class="p-2 text-center">Login</h2>
                <form action="login.php" method="post">
                    <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Username:<span class="red"><b>*</b></span></label>
                        <input type="text" class="form-control" placeholder="Enter username" name="uname" onchange="validation(this);">
                        <div class="err invalid-feedback"></div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="password" class="form-label">Password:<span class="red"><b>*</b></span></label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" onchange="validation(this);">
                        <div class="err"><?php echo isset($_SESSION['ragErr']) ? $_SESSION['ragErr']."<script>alert('Incorrect Username & Password!')</script>" : "" ?></div>
                    </div>
                    <button type="submit" class="btn" name="submit" value="submit">Login</button>
                </form>
            </div>
        </div>
        <div class="box2">
            <div class="rag">
                <h2 class="p-2 text-center">Ragistration</h2>
                <form action="signup.php" method="post">
                    <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Username:<span class="red"><b>*</b></span></label>
                        <input type="text" class="form-control" placeholder="Enter username" name="uname" onchange="validation(this);" value="<?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : ''; ?>">
                        <div class="err "><?php echo isset($_SESSION["nameErr"]) ? $_SESSION["nameErr"] : "" ?></div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:<span class="red"><b>*</b></span></label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" onchange="validation(this);" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : ''; ?>">
                        <div class="err"><?php  echo isset($_SESSION["emailErr"]) ? $_SESSION["emailErr"] : "" ?></div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="pass" class="form-label">Password:<span class="red"><b>*</b></span></label>
                        <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass" onchange="validation(this);" value="<?php echo isset($_SESSION["password"]) ? $_SESSION["cpassword"] : ''; ?>">
                        <div class="err"><?php echo isset($_SESSION["passErr"]) ? $_SESSION["passErr"] : ''; ?></div>

                    </div>
                    <div class="mb-3 mt-3">
                        <label for="cpass" class="form-label">Conform Password:<span class="red"><b>*</b></span></label>
                        <input type="password" class="form-control" id="cpass" placeholder="Enter Conform Password" name="cpass" onchange="validation(this);">
                        <div class="err"><?php echo isset($_SESSION["cpassErr"]) ? $_SESSION["cpassErr"] : ''; ?></div>
                    </div>
                    <button type="submit" class="btn" name="submit" value="submit">Sign up</button>
                </form>
            </div>
        </div>
    </div>

    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>