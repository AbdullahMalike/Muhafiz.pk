<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "muhafiz";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted and all required fields are filled
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $SampleID = $_POST["SampleID"];
    $Patient_Name = $_POST["Patient_Name"];
    $RBC = $_POST["RBC"]; 
    $MCH = $_POST["MCH"];
    $MCV = $_POST["MCV"];
    $MCHC = $_POST["MCHC"];
    $WBC = $_POST["WBC"];
    $HAEMOGLOBIN = $_POST["HAEMOGLOBIN"];
    $HAEMATOCRIT = $_POST["HAEMATOCRIT"];
    $NEUTROPHILS = $_POST["NEUTROPHILS"];
    $LYMPHOCYTE = $_POST["LYMPHOCYTE"];
    $EOSINOPHILS = $_POST["EOSINOPHILS"];
    $MONOCYTES = $_POST["MONOCYTES"];
    $BASOPHILS = $_POST["BASOPHILS"];
    $PLATELETS = $_POST["PLATELETS"];
    $SpecialInstruction = $_POST["Special_Instruction"];

    // Check if file was uploaded successfully
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        // Read the file data
        $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
        // Escape special characters in the file data
        $fileData = mysqli_real_escape_string($conn, $fileData);

        // Backup the data before deleting
        $backupSql = "INSERT INTO backup_blood_sample_form (SampleID, Patient_Name, Gender, email, City, Phone_No, DOB, Pick_Up_Address, Preferred_Date, Area, Special_Instruction, created_at) SELECT SampleID, Patient_Name, Gender, email, City, Phone_No, DOB, Pick_Up_Address, Preferred_Date, Area, Special_Instruction, created_at FROM blood_sample_form WHERE SampleID = '$SampleID'";
        if (mysqli_query($conn, $backupSql)) {
            // Backup successful, now delete the data
            $deleteSql = "DELETE FROM blood_sample_form WHERE SampleID = '$SampleID'";
            if (mysqli_query($conn, $deleteSql)) {
                // Data deletion successful, now insert into the reports table
                $insertSql = "INSERT INTO reports (SampleID, Patient_Name, RBC, MCH, MCV, MCHC, WBC, HAEMOGLOBIN, HAEMATOCRIT, NEUTROPHILS, LYMPHOCYTE, EOSINOPHILS, MONOCYTES, BASOPHILS, PLATELETS, SpecialInstruction, created_at, file) VALUES ('$SampleID', '$Patient_Name', '$RBC', '$MCH', '$MCV', '$MCHC', '$WBC', '$HAEMOGLOBIN', '$HAEMATOCRIT', '$NEUTROPHILS', '$LYMPHOCYTE', '$EOSINOPHILS', '$MONOCYTES', '$BASOPHILS', '$PLATELETS', '$SpecialInstruction', NOW(), '$fileData')";
                if (mysqli_query($conn, $insertSql)) {
                    // Success! Data is inserted into the reports table
                    // Redirect to the next page or display a success message
                    header("Location: Thankpage.html");
                    exit;
                } else {
                    // Error occurred while inserting into the reports table
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                // Error occurred while deleting the data
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Error occurred while taking the backup
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Handle file upload error
        echo "File upload failed with error code: " . $_FILES["file"]["error"];
    }
}
?>

<!-- php code end  -->

<!-- html code start  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Blood Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="uploadreport.css">
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






<?php
$SampleID = $_GET['SampleID'];
$Patient_Name = urldecode($_GET['PatientName']); // Fix the variable name here

// Display patient ID and name
echo '<div class="container-fluid">';
echo '<div class="input-group input-group-sm mb-2 mt-3  mx-auto">';
echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Sample ID</span>';
 echo '<input type="text" id="SampleID" name="SampleID" value="' . htmlspecialchars($SampleID) . ' "  class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly><br>  ';
 echo '</div>';


 echo '<div class="input-group input-group-sm mb-2 mx-auto">';
echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Patient Name</span>';
 echo '<input type="text" id="Patient_Name" name="Patient_Name" value="' . htmlspecialchars($Patient_Name) . ' "  class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly><br>  ';
 echo '</div>';

 echo '</div>';

?>
<!-- Display the form -->

<div class="container-fluid">
<form  method="POST" enctype="multipart/form-data">
  <input type="hidden" name="SampleID" value="<?php echo htmlspecialchars($SampleID); ?>">
  <input type="hidden" name="Patient_Name" value="<?php echo htmlspecialchars($Patient_Name); ?>">
  


  <div class="row g-2">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" id="RBC" name="RBC" placeholder="RBC" required>
      <label for="RBC">R.B.C</label>
    </div>
  </div>
  <div class="col-md">
  <div class="form-floating">
      <input type="text" class="form-control" id="MCH" name="MCH" placeholder="MCH" required>
      <label for="MCH">M.C.H</label>
    </div>
  </div>
</div>


<!-- 2nd row  -->

<div class="row g-2 mt-1">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" id="MCV" name="MCV" placeholder="MCV" required>
      <label for="MCV">M.C.V</label>
    </div>
  </div>
  <div class="col-md">
  <div class="form-floating">
      <input type="text" class="form-control" id="MCHC" name="MCHC" placeholder="MCHC" required>
      <label for="MCHC">M.C.H.C</label>
    </div>
  </div>
</div>

<!-- 3rd row  -->

<div class="row g-2 mt-1">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" id="WBC" name="WBC" placeholder="WBC" required>
      <label for="WBC">W.B.C</label>
    </div>
  </div>
  <div class="col-md">
  <div class="form-floating">
      <input type="text" class="form-control" id="HAEMOGLOBIN" name="HAEMOGLOBIN" placeholder="HAEMOGLOBIN" required>
      <label for="HAEMOGLOBIN">HAEMOGLOBIN</label>
    </div>
  </div>
</div>

<!-- 4th row -->

<div class="row g-2 mt-1">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" id="HAEMATOCRIT" name="HAEMATOCRIT" placeholder="HAEMATOCRIT" required>
      <label for="HAEMATOCRIT">HAEMATOCRIT</label>
    </div>
  </div>
  <div class="col-md">
  <div class="form-floating">
      <input type="text" class="form-control" id="NEUTROPHILS" name="NEUTROPHILS" placeholder="NEUTROPHILS" required>
      <label for="NEUTROPHILS">NEUTROPHILS</label>
    </div>
  </div>
</div>

<!-- 5th row  -->

<div class="row g-2 mt-1">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" id="LYMPHOCYTE" name="LYMPHOCYTE" placeholder="LYMPHOCYTE" required>
      <label for="LYMPHOCYTE">LYMPHOCYTE</label>
    </div>
  </div>
  <div class="col-md">
  <div class="form-floating">
      <input type="text" class="form-control" id="EOSINOPHILS" name="EOSINOPHILS" placeholder="EOSINOPHILS" required>
      <label for="EOSINOPHILS">EOSINOPHILS</label>
    </div>
  </div>
</div>

<!-- 6th row  -->

<div class="row g-2 mt-1">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" id="MONOCYTES" name="MONOCYTES" placeholder="MONOCYTES" required>
      <label for="MONOCYTES">MONOCYTES</label>
    </div>
  </div>
  <div class="col-md">
  <div class="form-floating">
      <input type="text" class="form-control" id="BASOPHILS" name="BASOPHILS" placeholder="BASOPHILS" required>
      <label for="BASOPHILS">BASOPHILS</label>
    </div>
  </div>
</div>


<!-- 7th row  -->

<div class="row g-2 mt-1">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" id="PLATELETS" name="PLATELETS" placeholder="PLATELETS" required>
      <label for="PLATELETS">PLATELETS</label>
    </div>
  </div>
  <div class="col-md">
  <div class="form-floating">
      <!-- <input type="text" class="form-control" id="Special_Instruction " name="Special_Instruction" placeholder="Special_Instruction" value="">
      <label for="Special_Instruction">Special Instruction </label> -->
    </div>
  </div>
</div>

<!-- 8th row  -->
<div class="row g-2 mt-1">
<div class="col-md">
<div class="form-floating">
  <textarea class="form-control" placeholder="Special_Instruction" name="Special_Instruction" id="Special_Instruction" style="height:100px;" required></textarea>
  <label for="Special_Instruction">Special Instruction</label>


      <!-- <input type="text" class="form-control" id="Special_Instruction " name="Special_Instruction" placeholder="Special_Instruction" value="">
      <label for="Special_Instruction">Special Instruction </label> -->
    </div>
</div>
</div>


 <!-- <div class="form-group">
   <label for="bloodGroup">Blood Group</label>
    <input type="text" class="form-control" id="bloodGroup" name="bloodGroup">
</div>

 <div class="form-group">
 <label for="disease">Disease</label>
<input type="text" class="form-control" id="disease" name="disease">
</div>
-->
<div class="form-group">
<label for="file">Upload Report</label>
<input type="file" class="form-control" id="file" accept=".pdf" name="file">
</div> 



<div class="text-center">
<!-- <a class="btn btn-primary mt-3 mb-3" value="submit" href="">Upload Report</a> -->
<input type="submit" class="btn btn-primary mt-3 mb-3" name="submit"  value="submit">
    
</div>

</form>
</div>



</body>
</html>














