<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Request Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
   
<link rel="stylesheet" href="ambulancereq.css">
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
                <a class="nav-link active px-5 editnbar mx-5 mb-2" aria-current="page" href="#">Services</a>
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


<!-- img work start  -->
<div class="">
<img class="imgedit" src="../images/patientserviceimg.png" alt="">
</div>
<!-- img work end  -->



<div class="container">
        <h2>Ambulance Form</h2>
        <form action="" method="GET">
            <div class="form-group">
                <label for="datepicker">Select Date:</label>
                <input type="text" class="form-control" id="datepicker" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary">View Records</button>
        </form>

        <?php
        if (isset($_GET['date'])) {
            $selectedDate = $_GET['date'];

            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "muhafiz";

            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve data from the database based on selected date
            $formattedDate = date('Y-m-d', strtotime($selectedDate));

            $sql = "SELECT Ambulance_form_ID, Patient_Name FROM ambulance_form WHERE DATE(Preferred_Date) = '$formattedDate'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div id='recordsContainer'>";
                echo "<h3>Records for selected date:</h3>";
                echo "<ul class='list-group' id='recordsList'>";
                while ($row = $result->fetch_assoc()) {
                    $ambulanceFormID = $row['Ambulance_form_ID'];
                    $patientName = $row['Patient_Name'];
                    echo "<li class='list-group-item'>";
                    echo "<strong>Ambulance Form ID:</strong> $ambulanceFormID<br>";
                    echo "<strong>Patient Name:</strong> $patientName<br>";
                    echo "<a href='view_detail.php?id=$ambulanceFormID' class='btn btn-primary'>View Details</a>";
                    echo "</li>";
                }
                echo "</ul>";
                echo "</div>";
            } else {
                echo "<p>No requests available for the selected date.</p>";
            }

            $conn->close();
        }
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>


  <!-- footer  -->
  <div class="text-center footerbgedit py-4">
    <p>Copyright © 2012 - 2023 TermsFeed®. All rights reserved...</p>
    </div>


</body>
</html>