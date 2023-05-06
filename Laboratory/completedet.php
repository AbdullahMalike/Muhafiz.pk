<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comlete Detail</title>
</head>
<body>
    <h1>Complete Detail</h1>


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
    echo "Patient_Name: " . $row["Patient_Name"] . "<br>";
    echo "Gender: " . $row["Gender"] . "<br>";
    echo "email: " . $row["email"] . "<br>";
    echo "City: " . $row["City"] . "<br>";
    echo "Phone_No: " . $row["Phone_No"] . "<br>";
    echo "DOB: " . $row["DOB"] . "<br>";
    echo "Pick_Up_Address: " . $row["Pick_Up_Address"] . "<br>";
    echo "Preferred_Date: " . $row["Preferred_Date"] . "<br>";
    echo "Area: " . $row["Area"] . "<br>";
    echo "Special_Instruction: " . $row["Special_Instruction"] . "<br>";



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

</body>
</html>