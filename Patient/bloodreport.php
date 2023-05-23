<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bloodreport.css">
    <!-- <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Other meta tags and CSS links -->

    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
   



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

        .editwidth{
    width: 97%;
}
.search-container {
      position: relative;
      display: inline-block;
    }

    .search-input {
      padding: 10px 40px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 200px;
      transition: width 0.3s ease-in-out;
    }

    .search-input:focus {
      width: 300px;
    }

    /* Styling for the search icon */
    .search-icon {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      fill: #777;
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

<div>
    <img class="editreportimg" src="../images/bloodreportimg.jpg" alt="">
</div>

<div class="py-5 editbg">
    <h1 class="text-center lheadingedit">Blood Report</h1>
    <hr class="mx-auto edithr">
    </div>


    <h2 class="text-center lheadingedit mt-3">Enter Name</h2>
    <div class="container-fluid text-center mb-5">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="search-container">
      <input type="text" name="Patient_Name" class="search-input" required placeholder="Search...">
    
      <button type="submit" class="btn btn-primary">
          <i class="fas fa-search"></i>
        </button>
    </div>

  </form>
  </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Establish database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "muhafiz";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch report details based on the entered email
        $Patient_Name = $_POST['Patient_Name'];
        $sql = "SELECT * FROM reports WHERE Patient_Name like '%$Patient_Name%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Display report details
            $row = mysqli_fetch_assoc($result);
            echo "<h2 class='text-center lheadingedit mt-3'>Report Details</h2><br>";
            // echo "<div id='pdf-container '>";

            echo '<div class="container-fluid border mx-auto mb-5 p-1  rounded-3 editwidth shadow-lg p-3 mb-5 bg-body ">';
            // echo "<p><strong>Report ID:</strong> " . $row['report_id'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Patient Name</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="patientName" name="patientName" value="' . $row["report_id"] . '" readonly><br>';
                   echo '</div>';


            // echo "<p><strong>Patient Name:</strong> " . $row['Patient_Name'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Patient Name</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="patientName" name="patientName" value="' . $row["Patient_Name"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>RBC:</strong> " . $row['RBC'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">RBC</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="RBC" name="RBC" value="' . $row["RBC"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>MCH:</strong> " . $row['MCH'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">MCH</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="MCH" name="MCH" value="' . $row["MCH"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>MCV:</strong> " . $row['MCV'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">MCV</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="MCV" name="MCV" value="' . $row["MCV"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>MCHC:</strong> " . $row['MCHC'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">MCHC</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="MCHC" name="MCHC" value="' . $row["MCHC"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>WBC:</strong> " . $row['WBC'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">WBC</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="WBC" name="WBC" value="' . $row["WBC"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>Haemoglobin:</strong> " . $row['HAEMOGLOBIN'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">HAEMOGLOBIN</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="HAEMOGLOBIN" name="HAEMOGLOBIN" value="' . $row["HAEMOGLOBIN"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>Haematocrit:</strong> " . $row['HAEMATOCRIT'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">HAEMATOCRIT</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="HAEMATOCRIT" name="HAEMATOCRIT" value="' . $row["HAEMATOCRIT"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>Neutrophils:</strong> " . $row['NEUTROPHILS'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">NEUTROPHILS</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="NEUTROPHILS" name="NEUTROPHILS" value="' . $row["NEUTROPHILS"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>Lymphocyte:</strong> " . $row['LYMPHOCYTE'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">LYMPHOCYTE</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="LYMPHOCYTE" name="LYMPHOCYTE" value="' . $row["LYMPHOCYTE"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>Eosinophils:</strong> " . $row['EOSINOPHILS'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">EOSINOPHILS</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="EOSINOPHILS" name="EOSINOPHILS" value="' . $row["EOSINOPHILS"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>Monocytes:</strong> " . $row['MONOCYTES'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">MONOCYTES</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="MONOCYTES" name="MONOCYTES" value="' . $row["MONOCYTES"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>Basophils:</strong> " . $row['BASOPHILS'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">BASOPHILS</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="BASOPHILS" name="BASOPHILS" value="' . $row["BASOPHILS"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>Platelets:</strong> " . $row['PLATELETS'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">PLATELETS</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="PLATELETS" name="PLATELETS" value="' . $row["PLATELETS"] . '" readonly><br>';
                   echo '</div>';

            // echo "<p><strong>Special Instruction:</strong> " . $row['SpecialInstruction'] . "</p>";
            echo '<div class="input-group input-group-sm mb-3 mx-auto">';
            echo ' <span class="input-group-text fs-6" id="inputGroup-sizing-default">Special Instruction</span>';
                    echo '<input type="text" class="form-control fs-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="SpecialInstruction" name="SpecialInstruction" value="' . $row["SpecialInstruction"] . '" readonly><br>';
                   echo '</div>';

                   echo '<div class="text-center">';
                   echo "<a href='download_file.php?report_id=" . $row['report_id'] . "' class='btn btn-primary mt-2'>Download</a>";
                   echo '</div>';


                   echo '</div>';

            
        }
      
        else {
            echo "<p>No report found for the entered name.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>


 <!-- footer  -->
 <div class="text-center footerbgedit py-4">
    <p>Copyright © 2012 - 2023 TermsFeed®. All rights reserved...</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>