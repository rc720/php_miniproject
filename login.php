<?php
session_start(); // जरूरी है

include 'db.php';

$error = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = trim($_POST["name"]);
    $pass = trim($_POST["pass"]);

    // Check empty fields
    if(empty($name) || empty($pass)){
        $error = "All fields are required!";
    } else {

        $sql = $conn->prepare("SELECT password FROM sess_users WHERE name=?");
        $sql->bind_param("s", $name);
        $sql->execute();
        $sql->store_result();
        $sql->bind_result($password);

        if($sql->fetch() && password_verify($pass, $password)){
            $_SESSION["name"] = $name;
            header("Location: Home.php");
            exit();
        } else {
            $error = "Invalid Name or Password!";
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Login</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-secondary">

<main>
<div class="container col-4 mt-5 p-4 shadow rounded bg-light">

    <form method="POST">
        <h3 class="mb-3">Login Form</h3>

        <!-- Error Message -->
        <?php if($error != "") { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="">
            <label for="name">Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pass" id="pass" placeholder="">
            <label for="pass">Password</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Login
        </button>

    </form>

</div>
</main>

</body>
</html>