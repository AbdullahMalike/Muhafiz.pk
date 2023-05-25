
<?php
if(isset($_POST['submit'])) {
  // Establish database connection
  $conn = mysqli_connect("localhost", "root", "", "muhafiz");

  // Retrieve user input from login form
  $email = $_POST['email'];
  $password = $_POST['password'];

  // SQL query to retrieve user data
  $sql = "SELECT * FROM laboratorysignup WHERE email='$email' AND password='$password'";

  // Execute the query and retrieve the result set
  $result = mysqli_query($conn, $sql);

  // Retrieve the number of rows in the result set
  $num_rows = mysqli_num_rows($result);

  // Check if the number of rows is greater than 0
  if($num_rows > 0) {
    // User is authenticated, redirect to next page
    header("Location:labhome.html");
    exit;
  } else {
    // User is not authenticated, display error message
    echo "<script>alert('Incorrect email or Password')</script>";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="labloginp.css">
</head>
<body>
    

 <div class="container-fluid">
        <div class="row">
 
    <div class="col-md-6">
    
        <div class="ptbgimg py-5 ">
    
            <div class="editportal w-75 mx-auto  ">
    
         
            <div class="py-3  d-flex justify-content-center">
    
    <h1 class="pt-4 "><img src="../images/logo.png" class="llogoedit " alt=""> Muhafiz.Pk</h1>
         </div>
    
    <div class="pb-5 text-center">
        <h1 class="portalheadedit">Login Laboratory</h1>

        <hr class="w-50 mx-auto mb-5">
        <div class="w-50 mx-auto">

               <form method="POST" action=""> 

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="email">Enter Email</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
              </div>
        
              <div>
                <p class="text-secondary">Do you want to <a  href="labsignup.php"><span class="text-primary">Signup</span></a> ?</p>
              </div>

              <div>
                    <input type="submit" class="btn btn-outline-danger mt-3 w-50" name="submit" value="Login">

              </div>

              </form>

        </div>
        
    </div>
    
    </div>
    
    
    
        </div>
    </div>


    <div class="col-md-6">
        <img src="../images/lablogingif.gif" class="editpimg" alt="">
    </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

