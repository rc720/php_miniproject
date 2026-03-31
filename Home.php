<?php
session_start(); 

include 'db.php';

// Check if user logged in
if(!isset($_SESSION["name"])) {
    header("Location: login.php");
    exit();
}

// Query
$result = $conn->query("SELECT * FROM sess_prod");

// Check query success
if(!$result){
    die("Query Failed: " . $conn->error);
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Home</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-secondary">

<header>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">

        <h5 class="text-light">Hello, <?php echo $_SESSION["name"]; ?></h5>

        <a class="navbar-brand ms-3" href="home.php">Home</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="insert.php">Add_Prod</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update.php">Up_Prod</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="delete.php">Del_Prod</a>
                </li>
            </ul>

            <form action="login.php">
                <button class="btn btn-outline-danger" type="submit">
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>
</header>

<main>
<div class="container mt-5 d-flex justify-content-center">
    <div class="table-responsive col-md-6">

        <table class="table table-bordered table-hover shadow text-center bg-light">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Category</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["pid"]; ?></td>
                    <td><?php echo $row["pname"]; ?></td>
                    <td><?php echo $row["pquantity"]; ?></td>
                    <td><?php echo $row["category"]; ?></td>
                </tr>
                <?php } ?>
            </tbody>

        </table>

    </div>
</div>
</main>

</body>
</html>