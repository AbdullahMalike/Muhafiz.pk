<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accept Lab request</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bloodreqform.css">
    <style>
    .user-container {
      margin-bottom: 20px;
    }
    .footerbgedit{
    background-color: #D2EFF7;

}
.editbg{
    background-color: rgba(75, 184, 206, 0.247); 
}
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
                <a class="nav-link active px-5 editnbar mx-5 mb-2" aria-current="page" href="labhome.html">Home</a>
              </li>
          <li class="nav-item">
            <a class="nav-link active px-5 editnbar mx-5 mb-2" aria-current="page" href="labservices.html">Services</a>
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


<div class="py-5 editbg mb-5 mt-2">
<h1 class="text-center lheadingedit">User Data</h1>
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
  
    // Fetch user data from the database
    $sql = "SELECT * FROM blood_sample_form";
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
        // Display data for each user
        while($row = $result->fetch_assoc()) {
            $SampleID = $row["SampleID"];
            $Patient_Name = $row["Patient_Name"];
            $Gender = $row["Gender"];
            $email = $row["email"];
            $City = $row["City"];
            $Phone_No = $row["Phone_No"];
            $DOB = $row["DOB"];
            $Pick_Up_Address = $row["Pick_Up_Address"];
            $Preferred_Date = $row["Preferred_Date"];
            $Area = $row["Area"];
            $Special_Instruction = $row["Special_Instruction"];
            
             
  
            echo '<center><div class="user-container  border rounded-5 shadow-lg mb-4 bg-body w-75  p-5 editbldbtn" id="' . $SampleID . '">';
            echo "<span class='edittext'>Sample ID: " . $SampleID . "</span>";
            echo "<span class='edittext'>Patient Name: " . $Patient_Name. "</span>";
            // echo "Gender: " . $Gender . "<br>";
            // echo "email: " . $email . "<br>";
            // echo "City: " . $City . "<br>";
            // echo "Phone_No: " . $Phone_No . "<br>";
            // echo "DOB: " . $DOB . "<br>";
            // echo "Pick_Up_Address: " . $Pick_Up_Address . "<br>";
            // echo "Preferred_Date: " . $Preferred_Date . "<br>";
            // echo "Area: " . $Area . "<br>";
            // echo "Special_Instruction: " . $Special_Instruction . "<br>";
            
  
            echo ' <form action="" method="POST">';
            echo '<input type="hidden" name="SampleID" value="' . $SampleID . '">';
            echo '<a class="btn btn-outline-primary  editbtnf mx-2 mb-2" href="completedet.php?SampleID=' . $SampleID . '">View Complete Data</a>';
            echo '</form>';
  
            
  
            echo '</div></center>';
        }
    } else {
        echo "No user data available.";
    }
  
    $conn->close();
    ?>

<!-- footer  -->
<div class="text-center footerbgedit py-4">
    <p>Copyright © 2012 - 2023 TermsFeed®. All rights reserved...</p>
    </div>


   <script src="bloodreqform.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>