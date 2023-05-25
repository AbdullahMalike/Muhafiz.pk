<?php
if (isset($_GET['id'])) {
    $ambulanceFormID = $_GET['id'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "muhafiz";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve complete details for the selected record
    $sql = "SELECT * FROM ambulance_form WHERE Ambulance_form_ID = '$ambulanceFormID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (isset($_POST['accepted'])) {
            // Retrieve data for backup
            $backupAmbulanceFormID = $row['Ambulance_form_ID'];
            $patientName = $row['Patient_Name'];
            $pickupTime = $row['Pickuptime'];
            $patientEmail = $row['patient_email'];
            $city = $row['City'];
            $cell = $row['Cell'];
            $reason = $row['Reason'];
            $address = $row['Address'];
            $preferredDate = $row['Preferred_Date'];
            $area = $row['Area'];
            $specialInstruction = $row['Special_Instruction'];
            $createdAt = $row['created_at'];

            // Insert data into backup table
            $backupSql = "INSERT INTO backup_ambulance_form_record (Ambulance_form_ID, Patient_Name, Pickuptime, patient_email, City, Cell, Reason, Address, Preferred_Date, Area, Special_Instruction, created_at) VALUES ('$backupAmbulanceFormID', '$patientName', '$pickupTime', '$patientEmail', '$city', '$cell', '$reason', '$address', '$preferredDate', '$area', '$specialInstruction', '$createdAt')";

            if ($conn->query($backupSql) === TRUE) {
                // Data inserted successfully, now delete from the main table
                $deleteSql = "DELETE FROM ambulance_form WHERE Ambulance_form_ID = '$ambulanceFormID'";
                if ($conn->query($deleteSql) === TRUE) {
                    // Redirect to the next page with the success message
                    header("Location: next_page.php");

                    
                    exit;
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            } else {
                echo "Error: " . $backupSql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Record not found.";
    }

    $conn->close();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Detail of Ambualance </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="view_detail.css">
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
if (isset($_GET['id'])) {
    $ambulanceFormID = $_GET['id'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "muhafiz";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve complete details for the selected record
    $sql = "SELECT * FROM ambulance_form WHERE Ambulance_form_ID = '$ambulanceFormID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display the complete details of the record here

        echo '<div class="container-fluid border mb-5 p-1     rounded-3 editwidth shadow-lg p-3 mb-5 bg-body">';


        // echo "<p><strong>Ambulance Form ID:</strong> " . $row['Ambulance_form_ID'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Ambulance form ID</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="Ambulance_form_ID" name="Ambulance_form_ID" value="' . $row["Ambulance_form_ID"] . '" readonly><br>';
               echo '</div>';


        // echo "<p><strong>Patient Name:</strong> " . $row['Patient_Name'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Patient Name</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="Patient_Name" name="Patient_Name" value="' . $row["Patient_Name"] . '" readonly><br>';
               echo '</div>';

        // echo "<p><strong>Pickup Time:</strong> " . $row['Pickuptime'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Pickup Time</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="Pickuptime" name="Pickuptime" value="' . $row["Pickuptime"] . '" readonly><br>';
               echo '</div>';

        // echo "<p><strong>Patient Email:</strong> " . $row['patient_email'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Patient Email</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="patient_email" name="patient_email" value="' . $row["patient_email"] . '" readonly><br>';
               echo '</div>';


        // echo "<p><strong>City:</strong> " . $row['City'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">City</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="City" name="City" value="' . $row["City"] . '" readonly><br>';
               echo '</div>';

        // echo "<p><strong>Cell:</strong> " . $row['Cell'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Cell</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="Cell" name="Cell" value="' . $row["Cell"] . '" readonly><br>';
               echo '</div>';

        // echo "<p><strong>Reason:</strong> " . $row['Reason'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Reason</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="Reason" name="Reason" value="' . $row["Reason"] . '" readonly><br>';
               echo '</div>';

        // echo "<p><strong>Address:</strong> " . $row['Address'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Address</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="Address" name="Address" value="' . $row["Address"] . '" readonly><br>';
               echo '</div>';

        // echo "<p><strong>Preferred Date:</strong> " . $row['Preferred_Date'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Preferred Date</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="Preferred_Date" name="Preferred_Date" value="' . $row["Preferred_Date"] . '" readonly><br>';
               echo '</div>';

        // echo "<p><strong>Area:</strong> " . $row['Area'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Area</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="Area" name="Area" value="' . $row["Area"] . '" readonly><br>';
               echo '</div>';

        // echo "<p><strong>Special Instruction:</strong> " . $row['Special_Instruction'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Special Instruction</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="Special_Instruction" name="Special_Instruction" value="' . $row["Special_Instruction"] . '" readonly><br>';
               echo '</div>';


        // echo "<p><strong>Created At:</strong> " . $row['created_at'] . "</p>";
        echo '<div class="input-group input-group-sm mb-3 mx-auto">';
        echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">created At</span>';
                echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="created_at" name="created_at" value="' . $row["created_at"] . '" readonly><br>';
               echo '</div>';


        echo "<form method='POST'>";
        echo "<input type='hidden' name='ambulanceFormID' value='" . $row['Ambulance_form_ID'] . "'>";
         echo '<div class="">';
        echo "<button type='submit' name='accepted' class='btn btn-primary'>Accepted</button>";
          echo '</div>';
        echo "</form>";

        echo '</div>';



        if (isset($_POST['accepted'])) {
            // Retrieve data for backup
            $backupAmbulanceFormID = $row['Ambulance_form_ID'];
            $patientName = $row['Patient_Name'];
            $pickupTime = $row['Pickuptime'];
            $patientEmail = $row['patient_email'];
            $city = $row['City'];
            $cell = $row['Cell'];
            $reason = $row['Reason'];
            $address = $row['Address'];
            $preferredDate = $row['Preferred_Date'];
            $area = $row['Area'];
            $specialInstruction = $row['Special_Instruction'];
            $createdAt = $row['created_at'];

            // Insert data into backup table
            $backupSql = "INSERT INTO backup_ambulance_form_record (Ambulance_form_ID, Patient_Name, Pickuptime, patient_email, City, Cell, Reason, Address, Preferred_Date, Area, Special_Instruction, created_at) VALUES ('$backupAmbulanceFormID', '$patientName', '$pickupTime', '$patientEmail', '$city', '$cell', '$reason', '$address', '$preferredDate', '$area', '$specialInstruction', '$createdAt')";

            if ($conn->query($backupSql) === TRUE) {
                // Data inserted successfully, now delete from the main table
                $deleteSql = "DELETE FROM ambulance_form WHERE Ambulance_form_ID = '$ambulanceFormID'";
                if ($conn->query($deleteSql) === TRUE) {
                    // Redirect to the next page with the success message
                    header("Location: next_page.php");

                    
                    exit;
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            } else {
                echo "Error: " . $backupSql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Record not found.";
    }

    $conn->close();
}
?>



<!-- footer -->
<footer class="text-center py-4 footerbgedit">
    <p class="mb-0">Copyright ©
        <script>
            document.write(new Date().getFullYear());
        </script> Muhafiz.Pk. All rights reserved...</p>
</footer>





</body>
</html>