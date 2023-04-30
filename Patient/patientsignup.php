<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Signup Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="patientsignup.css">
</head>
<body>
    

    <div class="container-fluid">
        <div class="row">
    <div class="col-md-6">
        <img src="../images/p2logingif.gif" class="editpimg" alt="">
    </div>
    <div class="col-md-6">
    
        <div class="ptbgimg py-1 ">
    
            <div class="editportal w-75 mx-auto  ">
    
         
            <div class="d-flex justify-content-center">
    
    <h1 class=" "><img src="../images/logo.png" class="llogoedit " alt=""> Muhafiz.Pk</h1>
         </div>
    
    <div class="pb-5 text-center">
        <h1 class="portalheadedit">Patient Signup</h1>

        <hr class="w-50 mx-auto mb-5">
        <div class="w-50 mx-auto">

            <form method="POST" action="">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Abdullah" required>
                <label for="name">Full Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Password">
                <label for="confirm_password">Confirm Password</label>
              </div>

              <div>
              <input type="submit" class="btn btn-outline-danger mt-3 w-50" name="submit" value="Signup">

                <!-- <a type="button" class="btn btn-outline-danger mt-3 w-50" href="">Signup</a> -->
              </div>
                       
              </form>

            </div>
        
        
           
        </div>
        
    </div>
    
    </div>
    
    
    
        </div>
    </div>
        </div>
    </div>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>






<?php

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "muhafiz");

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if(!empty($name) && !empty($email) && !empty($password) && !empty($confirm_password)) {
    if($password === $confirm_password) {
      $sql = "INSERT INTO patientsignup (Patient_Full_Name, email, password, created_at) VALUES ('$name', '$email', '$password', CURRENT_TIMESTAMP)";

      if(mysqli_query($conn, $sql)) {
        echo "Data inserted successfully!";
      } else {
        echo "Error: " . mysqli_error($conn);
      }

      // Add this line to prevent form data from being resubmitted when the page is refreshed
      header("Location: patientlogin.php ");
      exit;
    } else {
      echo "<script>alert('Passwords do not match.');</script>";
      
    }
  } else {
    echo "<script>alert('Please fill in all fields.');</script>";

  }
}
?>