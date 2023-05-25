<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Request Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="ambulancereq.css">
</head>
<body>
    
 <!-- navbar work start  -->
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
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
    <img class="w-100 imgedit" src="../images/patientserviceimg.png" alt="">
</div>
<!-- img work end  -->


<div class="py-5 editbg mb-5 mt-2">
<h1 class="text-center lheadingedit">Ambulance Data</h1>
<hr class="mx-auto w-25">
</div>


<div class="container mb-5">
    <form action="" method="GET" class="text-center  border shadow-lg rounded-3 p-2">
      <div class="d-flex justify-content-center">
        <div class="form-group w-50">
            <label for="datepicker">Select Date:</label>
            <input type="date" class="form-control" id="datepicker" name="date" required>
        </div>
        <button type="submit" class="btn btn-primary mt-4 mb-5">View Records</button>
        </div>
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
            echo "<h3 class='mb-5 mt-5 text-center lheadingedit'>Records for selected date:</h3>";
            echo "<ul class='list-group mb-5 shadow-lg rounded-4' id='recordsList'>";
            while ($row = $result->fetch_assoc()) {
                $ambulanceFormID = $row['Ambulance_form_ID'];
                $patientName = $row['Patient_Name'];
                echo "<div class='list-group-item border-0 py-4 p-5'>";
                echo "<div class='d-flex justify-content-between align-items-center'>";
                echo "<div class='pt-1 fs-5'><strong>Ambulance Form ID:</strong> $ambulanceFormID</div>";
                echo "<div class='pt-1 fs-5'><strong>Patient Name:</strong> $patientName</div>";
                echo "<a href='view_detail.php?id=$ambulanceFormID' class='btn btn-outline-primary'>View Details</a>";
                echo "</div>";
                echo "</div>";
            }
            echo "</ul>";
            echo "</div>";
        } else {
            echo "<p class='text-center'>No requests available for the selected date.</p>";
        }

        $conn->close();
    }
    ?>
</div>

<!-- footer -->
<footer class="text-center py-4 footerbgedit">
    <p class="mb-0">Copyright ©
        <script>
            document.write(new Date().getFullYear());
        </script> Muhafiz.Pk. All rights reserved...</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
