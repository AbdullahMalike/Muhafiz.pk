<?php
if (isset($_GET['report_id'])) {
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "muhafiz";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $reportId = $_GET['report_id'];
    $sql = "SELECT * FROM reports WHERE report_id = '$reportId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fileName = $row['filename'];
        $fileData = $row['file'];

        // Set appropriate headers for the download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        // Output the file data
        echo $fileData;
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
