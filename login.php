<?php
    session_start();
    $conn = mysqli_connect("sql12.freesqldatabase.com","sql12779399","kA4qNbKN3B","sql12779399");

    if (isset($_POST["submit"]))
    {
        $name=$_POST['uname'];
        $pass = $_POST['password'];

        // if(preg_match($nameRegex, $_SESSION["name"]))
        // {
        //     $_SESSION["nameErr"] = "";
        // }
        
        $query = "SELECT * FROM loginform WHERE username='$name' AND password='$pass'";


        $result = mysqli_query($conn, $query);
        if ($result==true) 
        {
            header("Location: preview.php?name=$name&password=" . urlencode($pass));
            exit();
        } 
        else 
        {
            $_SESSION['ragErr']='Username & Password is incorrect!';
            echo $_SESSION['ragErr'];
            header("Location: index.php");
            exit();
        }

    }

?>