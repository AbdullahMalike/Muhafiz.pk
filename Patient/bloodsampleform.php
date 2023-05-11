<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Sample Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bloodsamplef.css">
    <style>
      .editnbarlog{
    border: 1px solid black;
    background-color: red;
    border-radius: 10px;
}
.editnbarlog:hover{
    border: 1px solid rgb(253, 60, 60);
    border-radius: 20px;
    -webkit-transition: 0.3s;
    background-color: rgb(253, 60, 60);
  transition: 0.5s;
}
    </style>
</head>
<body>
    
  <!-- navbar work start  -->

  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid ">
        <img src="../images/logo.png" class="llogoedit" alt="">
      <a class="navbar-brand" href="#">Muhafiz.Pk</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active px-5 editnbar mx-5 mb-2" aria-current="page" href="patienthome.html">Home</a>
              </li>
          <li class="nav-item">
            <a class="nav-link active px-5 editnbar mx-5 mb-2" aria-current="page" href="services.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active px-5 editnbar mx-5" aria-current="page" href="contactus.html">Contact Us</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active px-5 editnbarlog mx-5" aria-current="page" href="../portal.html">Logout</a>
          </li>
       </ul>
      </div>
    </div>
  </nav>


<!-- navbar work end  -->

<div class=" ">
    <img class="w-100 editimgb" src="../images/bloodformimg.jpg" alt="">
</div>

<div class="py-5 editbg">
<h1 class="text-center lheadingedit">Blood Sample Form</h1>
<hr class="mx-auto w-25">
</div>


<!-- form work start  -->

<div class="container-fluid py-5">

 <form method="POST" action="">

    <div class="editformlabl  ">
        <div class="form-floating editlabel mb-3">
            <input type="text" class="form-control" id="pname" name="pname" placeholder="Enter your name">
            <label for="pname">Name of Patient</label>
          </div>
          <div class="form-floating editlabel mb-3">
            <input type="date" class="form-control" id="pdob" name="pdob" placeholder="enter date of birth">
            <label for="pdob">DOB</label>
          </div>
          
    </div>
    <!-- 2nd row  -->
    <div class="editformlabl  ">
       
       <div class="editlabel mb-3">
        <h6>Gender</h6>
        <div class="">
            <div class="">
                <input type="radio" name="Gender" value="Male" id="Male">
            <label for="Male">Male</label>
            </div>
            <div>
                <input type="radio" name="Gender" value="Female" id="Female">
            <label for="Female">Female</label>
            </div>
        </div>
        </div>
          
       <div class="form-floating editlabel mb-3">
        <input type="text" class="form-control" id="paddress" name="paddress" placeholder="e.g: street 11 douraji">
        <label for="paddress">Pick Up Address</label>
      </div>

    </div>
    <!-- 3rd row  -->

    <div class="editformlabl  ">
        <div class="form-floating editlabel mb-3">
            <input type="email" class="form-control" id="pemail" name="pemail" placeholder="name@example.com">
            <label for="pemail">Email</label>
          </div>
          <div class="form-floating editlabel mb-3">
            <input type="date" class="form-control" id="pprefdate" name="pprefdate" placeholder="Preferred Date">
            <label for="pprefdate">Preferred Date</label>
          </div>
          
    </div>
<!-- 4th row  -->

<div class="editformlabl">

    <div class="form-floating editlabel mb-3">
  <select class="form-select" id="city" name="city" aria-label="Floating label select example">
    <option value="Karachi" selected>Karachi</option>
    <!-- <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option> -->
  </select>
  <label for="city">Select City</label>
</div>

<div class="form-floating editlabel mb-3">
    <select class="form-select" id="area" name="area" aria-label="Floating label select example">
      <option value="Douraji" selected>Douraji</option>
      <option value="Tariq Road">Tariq Road</option>
      <option value="Johar">Johar</option>
      <option value="Saddar">Saddar</option>
    </select>
    <label for="area">Select Area</label>
  </div>

</div>

<!-- 5th row  -->
<div class="editformlabl">
    <div class="form-floating editlabel mb-3">
        <input type="number" class="form-control" id="pnumber" name="pnumber" placeholder="+92324344">
        <label for="pnumber">Cell/PTCL Number</label>
      </div>
      <div class="form-floating editlabel">
        <textarea class="form-control" placeholder="Leave a comment here" name="speicalinst" id="speicalinst"></textarea>
        <label for="speicalinst">Special Instruction </label>
      </div>
</div>

<!-- btn work start  -->
   <div class="text-center">
   <input type="submit" class="btn btn-outline-danger editbtnf mt-5" name="submit" value="Submit">
   <!-- <button type="button" class="btn btn-outline-danger editbtnf mt-5">Submit</button> -->
    </div>

<!-- btn work end  -->

</form>

</div>

<!-- form work end  -->


  <!-- footer  -->
  <div class="text-center footerbgedit py-4">
    <p>Copyright © 2012 - 2023 TermsFeed®. All rights reserved...</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>






<?php

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "muhafiz");

if(isset($_POST['submit'])) {
  $pname = $_POST['pname'];
  $Gender = $_POST['Gender'];
  $pdob = $_POST['pdob'];
  $paddress = $_POST['paddress'];
  $pemail = $_POST['pemail'];
  $pprefdate = $_POST['pprefdate'];
  $city = $_POST['city'];
  $area = $_POST['area'];
  $pnumber = $_POST['pnumber'];
  $speicalinst = $_POST['speicalinst'];


  if(!empty($pname) && !empty($Gender) && !empty($pdob) && !empty($paddress) && !empty($pemail) && !empty($pprefdate) && !empty($city) && !empty($area) && !empty($pnumber) && !empty($speicalinst) ) {
   
      $sql = "INSERT INTO blood_sample_form (Patient_Name, Gender, email, City, Phone_No, DOB, Pick_Up_Address, Preferred_Date, Area, Special_Instruction , created_at) VALUES ('$pname', '$Gender','$pemail', '$city', '$pnumber', '$pdob', '$paddress', '$pprefdate', '$area', '$speicalinst' , CURRENT_TIMESTAMP)";

      if(mysqli_query($conn, $sql)) {
        echo "Data inserted successfully!";
      } else {
        echo "Error: " . mysqli_error($conn);
      }

      // Add this line to prevent form data from being resubmitted when the page is refreshed
      // header("Location: services.html ");
      exit;
   
  } else {
    echo "<script>alert('Please fill in all fields.');</script>";

  }
}
?>