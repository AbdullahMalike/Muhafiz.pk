<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ambulanceform.css">
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
.popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        z-index: 9999;
        max-width: 400px;
        width: 90%;
        text-align: center;
        animation: fadeOut 3s linear forwards;
        border-radius: 10px;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            display: none;
        }
    }

    .popup h2 {
        margin-top: 0;
        font-size: 24px;
        color: #333;
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
    <img class="w-100 editimgb" src="../images/ambulanceformimg.jpg" alt="">
</div>

<div class="py-5 editbg">
<h1 class="text-center lheadingedit">Ambulance Form</h1>
<hr class="mx-auto w-25">
</div>


<!-- form work start  -->

<div class="container-fluid py-5">

<form method="POST" action="">
    <div class="editformlabl  ">
        <div class="form-floating editlabel mb-3">
            <input type="text" class="form-control" id="pname" name="pname" placeholder="Enter your name">
            <label for="pname">Name</label>
          </div>
        
          <div class="form-floating editlabel mb-3">
            <select class="form-select" id="SelectReason" name="SelectReason" aria-label="Floating label select example">
              <option value="Amergency" selected>Amergency</option>
              <option value="Delivery">Delivery</option>
              <option value="Other">Other</option>
              <!-- <option value="3">Three</option> -->
            </select>
            <label for="SelectReason">Select Reason</label>
          </div>
          
    </div>
    <!-- 2nd row  -->
    <div class="editformlabl  ">
       
        <div class="form-floating editlabel mb-3">
            <input type="time" class="form-control" id="atime" name="atime" placeholder="e.g: 10:00 PM">
            <label for="atime">Pick Up Time</label>
          </div>
          
       <div class="form-floating editlabel mb-3">
        <input type="text" class="form-control" id="paddress" name="paddress" placeholder="e.g: street 11 douraji">
        <label for="paddress">Destination Address</label>
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
  <select class="form-select" id="SelectCity" name="SelectCity" aria-label="Floating label select example">
    <option selected>Karachi</option>
    <!-- <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option> -->
  </select>
  <label for="SelectCity">Select City</label>
</div>

<div class="form-floating editlabel mb-3">
    <select class="form-select" id="SelectArea" name="SelectArea" aria-label="Floating label select example">
      <option value="Douraji" selected>Douraji</option>
      <option value="Tariq Road">Tariq Road</option>
      <option value="Johar">Johar</option>
      <option value="Saddar">Saddar</option>
    </select>
    <label for="SelectArea">Select Area</label>
  </div>

</div>

<!-- 5th row  -->
<div class="editformlabl">
    <div class="form-floating editlabel mb-3">
        <input type="number" class="form-control" name="pnumber" id="pnumber" placeholder="+92324344">
        <label for="pnumber">Cell/PTCL Number</label>
      </div>
      <div class="form-floating editlabel">
        <textarea class="form-control" placeholder="Leave a comment here" name="special_instruction" id="special_instruction"></textarea>
        <label for="special_instruction">Special Instruction </label>
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
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'muhafiz';

    // Create a connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if all required fields are filled
        if (!empty($_POST['pname']) && !empty($_POST['atime']) && !empty($_POST['pemail'])) {
            // Retrieve the form data
            $pname = $_POST['pname'];
            $atime = $_POST['atime'];
            $pemail = $_POST['pemail'];
            $SelectCity = $_POST['SelectCity'];
            $pnumber = $_POST['pnumber'];
            $SelectReason = $_POST['SelectReason'];
            $paddress = $_POST['paddress'];
            $pprefdate = $_POST['pprefdate'];
            $SelectArea = $_POST['SelectArea'];
            $special_instruction = $_POST['special_instruction'];

            // Prepare and bind the statement
            $stmt = $conn->prepare("INSERT INTO ambulance_form (Patient_Name, Pickuptime, patient_email, City, Cell, Reason, Address, Preferred_Date, Area, Special_Instruction) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssss", $pname, $atime, $pemail, $SelectCity, $pnumber, $SelectReason, $paddress, $pprefdate, $SelectArea, $special_instruction);

            // Execute the statement
            if ($stmt->execute()) {
                // Success! Data is inserted into the database
                echo "<script>
                        function showPopup() {
                            var popup = document.createElement('div');
                            popup.classList.add('popup');
                            popup.innerHTML = '<h2>Form data is stored successfully.</h2>';
                            document.body.appendChild(popup);
                        }
                        showPopup();
                      </script>";
                // Redirect to the next page or display a success message
                // header("Location: next_page.php");
                // exit();
            } else {
                // Error occurred
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            // Display an error message when required fields are not filled
            echo "Please fill all required fields.";
        }
    }
    ?>


