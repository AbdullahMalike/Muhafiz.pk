<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comlete Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="completedet.css">
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
                <a class="nav-link active px-5 editnbar mx-5 mb-2" aria-current="page" href="labhome.html">Home</a>
              </li>
          <li class="nav-item">
            <a class="nav-link active px-5 editnbar mx-5 mb-2" aria-current="page" href="labservices.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active px-5 editnbar mx-5 mb-2" aria-current="page" href="contactus.html">Contact Us</a>
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




<div class="py-5 editbg mb-5 mt-2">
<h1 class="text-center lheadingedit">Complete Detail</h1>
<hr class="mx-auto w-25">
</div>


    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "muhafiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['SampleID'])) {
$SampleID = $_GET['SampleID'];

// Fetch user data from the database
$sql = "SELECT * FROM blood_sample_form WHERE SampleID = '$SampleID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Display complete data

   echo '<div class="container-fluid border mb-5 p-1  rounded-3 editwidth shadow-lg p-3 mb-5 bg-body">';

    echo '<div class="input-group input-group-sm mb-3 mx-auto">';
    echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Patient Name</span>';
            echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="patientName" name="patientName" value="' . $row["Patient_Name"] . '" readonly><br>';
           echo '</div>';

           echo '<div class="input-group input-group-sm mb-3 mx-auto">';
           echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Gender</span>';
            echo '<input type="text" id="gender" name="gender" value="' . $row["Gender"] . ' "  class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly><br>  ';
            echo '</div>';
            
            
            echo '<div class="input-group input-group-sm mb-3  mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Email</span>';
            echo '<input type="email" id="email" name="email" value="' . $row["email"] . ' " class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly><br>';
            echo '</div>';

            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">City</span>';
            echo '<input type="text" id="city" name="city" value="' . $row["City"] . '" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  readonly><br>';
            echo '</div>';

            echo '<div class="input-group input-group-sm mb-3  mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Phone No</span>';
            echo '<input type="text" id="phoneNo" name="phoneNo" value="' . $row["Phone_No"] . '" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly><br>';
            echo '</div>';

            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Date Of Birth</span>';
            echo '<input type="date" id="dob" name="dob" value="' . $row["DOB"] . '" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly><br>';
            echo '</div>';

            // echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            // echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Pick Up Address</span>';
            // echo '<input type="text" id="pickupAddress" name="pickupAddress" value="' . $row["Pick_Up_Address"] . '" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly><br>';
            // echo '</div>';


          echo  '<div class="input-group mb-3 ">';
  echo '<span class="input-group-text">Pick Up Address</span>';
 echo '<textarea class="form-control" aria-label="Pick Up Address" readonly>'.  $row["Pick_Up_Address"] .'</textarea>';
 echo '</div>';


            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Preferred Date</span>';
            echo '<input type="date" id="preferredDate" name="preferredDate" value="' . $row["Preferred_Date"] . '" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly><br>';
            echo '</div>';

            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Area</span>';
            echo '<input type="text" id="area" name="area" value="' . $row["Area"] . '" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly><br>';
            echo '</div>';

            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Special Instruction</span>';
            echo '<input type="text" id="specialInstruction" name="specialInstruction" value="' . $row["Special_Instruction"] . '" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly><br>';
            echo '</div>';

            echo  '<div class="input-group mb-3 ">';
            echo '<span class="input-group-text">Special Instruction</span>';
           echo '<textarea class="form-control" aria-label="Special Instruction" readonly>'.  $row["Special_Instruction"] .'</textarea>';
           echo '</div>';

  

           echo '<div class="text-center mt-3">';
           echo '<a class="btn btn-primary" href="upload_report.php?SampleID=' . $SampleID . '&PatientName=' . urlencode($row["Patient_Name"]) . '">Upload Report</a>';
           echo '</div>';
           






     
         
           


            
            echo '</div>';


}
else {
    echo "No user data found.";
}
}
else {
    echo "SampleID parameter is missing.";
}

$conn->close();
?>






<!-- footer  -->
<div class="text-center footerbgedit py-4">
    <p>Copyright © 2012 - 2023 TermsFeed®. All rights reserved...</p>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>