
<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"]==="POST"){
  $pid=$_POST["pid"];
  $quant=$_POST["pquant"];

  $sql=$conn->prepare("update sess_prod set pquantity=? where pid=?");
  $sql->bind_param('ii',$quant,$pid);

  if($sql->execute()){
    header("Location:home.php");
  }
}

?>

<!doctype html>
<html lang="en">
   <head>
      <title>Title</title>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta
         name="viewport"
         content="width=device-width, initial-scale=1, shrink-to-fit=no"
      />

      <!-- Bootstrap CSS v5.2.1 -->
      <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
         crossorigin="anonymous"
      />
   </head>

   <body class="bg-secondary">
      <header>
         <nav
            class="navbar navbar-expand-sm navbar-dark bg-dark"
         >
               <h5 class="text-light">Hello,<?php echo $_SESSION["name"]; ?></h5>
            <div class="container">
               <a class="navbar-brand" href="home.php">Home</a>
               <button
                  class="navbar-toggler d-lg-none"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapsibleNavId"
                  aria-controls="collapsibleNavId"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
               >
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="collapsibleNavId">
                  <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                     <li class="nav-item">
                        <a class="nav-link active" href="insert.php" aria-current="page"
                           >Add_Prod
                           <span class="visually-hidden">(current)</span></a
                        >
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="update.php">Up_Prod</a>
                     </li>
                      <li class="nav-item">
                        <a class="nav-link" href="delete.php">Del_Prod</a>
                     </li>
                     <li class="nav-item dropdown">
                       
                       
                     </li>
                  </ul>
                  
                     <form action="login.php">
                     <button
                        class="btn btn-outline-danger my-2 my-sm-0"
                        type="submit"
                        
                     >
                        Logout
                     </button>
                  </form>  
                  </form>
               </div>
            </div>
         </nav>
         
      </header>
      <main>

        <div
          class="container col-4 mt-5 bg-light p-4"
        >
         <form action="" method="POST">
            <div class="form-floating mb-3">
              <input
                type="number"
                class="form-control"
                name="pid"
                id="formId1"
                placeholder=""
              />
              <label for="formId1">Product ID</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="number"
                class="form-control"
                name="pquant"
                id="formId1"
                placeholder=""
              />
              <label for="formId1">Quantity</label>
            </div>
            <button
              type="submit"
              class="btn btn-primary"
            >
              Submit
            </button>
            
            
         </form>
        </div>
        

      </main>
      <footer>
         <!-- place footer here -->
      </footer>
      <!-- Bootstrap JavaScript Libraries -->
      <script
         src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
         integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
         crossorigin="anonymous"
      ></script>

      <script
         src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
         integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
         crossorigin="anonymous"
      ></script>
   </body>
</html>
