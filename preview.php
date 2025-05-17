<?php
    session_start();
    $conn = mysqli_connect("sql12.freesqldatabase.com","sql12779399","kA4qNbKN3B","sql12779399");

    if (isset($_SESSION["name"]) && $_SESSION["password"])
    {
        $name = $_SESSION['name'];
        $pass = $_SESSION['password'];

        $query = "Select * From loginform Where username='$name' && password='$pass'";

        $result = mysqli_query($conn, $query);

        if($result)
        {
            $row = mysqli_fetch_assoc($result);
        }
    }
    else
    {
        if (isset($_GET['name']) && isset($_GET['password'])) 
        {
            $name = $_GET['name'];
            $pass = $_GET['password'];
        
            $query = "SELECT * FROM loginform WHERE username='$name' AND password='$pass'";
            $result = mysqli_query($conn, $query);
        
            if ($result && mysqli_num_rows($result) > 0) 
            {
                $row = mysqli_fetch_assoc($result);
                if (!(strcmp($name, $row['username']) == 0  && strcmp($pass, $row['password']) == 0)) 
                {
                    $_SESSION['ragErr']='Username & Password is incorrect!';
                    header("Location: index.php");
                    exit();
                } 
            } 
            else 
            {
                $_SESSION['ragErr']='Username & Password is incorrect!';
                // Redirect back to index.php if credentials are incorrect
                header("Location: index.php");
                exit();
            }
        } 
        else 
        {
            // Redirect back to index.php if name or password is not provided
            header("Location: index.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .img {
            width: 125px;
            border: 2px solid black;
            padding: 4px;
        }
        .btn {
            background-color: #feb843;
            margin: 0 45%;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
        .btn a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <h1 align="center" class="Result"><u>Welcome To Deshboard</u></h1>
    <div class="container mt-5 d-flex justify-content-center" >
        <table class="table table-bordered" border="2px" style="width:550px" cell-padding>
            <tr>
                <td>User Name</td>
                <td><?php echo $row['username'] ?></td>
            </tr>
            <tr>
                <td>Email Id</td>
                <td><?php echo $row['email'] ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?php echo $row['password'] ?></td>
            </tr>
        </table>
    </div>
    <button class="btn"value="logout" onclick="<?php session_destroy(); session_unset(); ?>"><a href="index.php">Logout</a></button>
</body>
</html>
