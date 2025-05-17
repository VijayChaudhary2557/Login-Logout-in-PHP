<?php
    session_start();
    $conn = mysqli_connect("sql12.freesqldatabase.com","sql12779399","kA4qNbKN3B","sql12779399");

    if (isset($_POST["submit"]))
    {
        $_SESSION["name"] = $_POST["uname"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["pass"];
        $_SESSION["cpassword"] = $_POST["cpass"];

        $nameRegex = "/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/";
        $emailRegex = "/^([\w]*[\w\.]*(?!\.)@gmail.com)/";
        $passRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";

        if($_SESSION["name"]=="")
        {
            $_SESSION["nameErr"] = "Name should be required.";
        }
        else if(preg_match($nameRegex, $_SESSION["name"]))
        {
            $_SESSION["nameErr"] = "";
        }
        else
        {
            $_SESSION["nameErr"] = "Enter valid Name.";
        }

        if($_SESSION["email"]=="")
        {
            $_SESSION["emailErr"] = "Email should be required.";
        }
        else if(preg_match($emailRegex, $_SESSION["email"]))
        {
            $_SESSION["emailErr"] = "";
        }
        else
        {
            $_SESSION["emailErr"] = "Enter valid Email.";
        }


        if($_SESSION["password"]=="")
        {
            $_SESSION["passErr"] = "Password should be required." ;
        }
        else if(preg_match($passRegex, $_SESSION["password"]))
        {
            $_SESSION["passErr"] = "";
        }
        else
        {
            $_SESSION["passErr"] = "Password should be contain at least 1 Capital, 1 Single Latter, 1 Number and minimum 8 Character.";

        }


        if($_SESSION["cpassword"]=="")
        {
            $_SESSION["cpassErr"] = "Conform Password should be required." ;
        }
        else if($_SESSION["password"]==$_SESSION["cpassword"])
        {
            $_SESSION["cpassErr"] = "" ;
        }
        else
        {
            $_SESSION["cpassErr"] = "Password not matched." ;
        }

        if($_SESSION["nameErr"]== "" && $_SESSION["emailErr"]== "" && $_SESSION["passErr"]== "" && $_SESSION["cpassErr"]== "")
        {
            $name = $_SESSION["name"];
            $email = $_SESSION["email"];
            $pass = $_SESSION["password"];

            $emailQuery = "SELECT * FROM loginform WHERE email = '$email'";
            $result = mysqli_query($conn, $emailQuery);
            if(mysqli_num_rows($result) > 0)
            {
                $_SESSION['emailErr'] = "Email all ready used."."<script>alert('Email all rady used !')</script>";
                header("Location: index.php");
                exit("");
            }
            else
            {
                $query = "Insert into loginform values (DEFAULT, '$name', '$email', '$pass')";
                if (mysqli_query($conn, $query))
                {
                    header("Location: preview.php");
                    exit();
                }
            }
        }
        else
        {
            header("Location: index.php");
            exit("");
        }
    }
    else
        echo "submit problem";
?>