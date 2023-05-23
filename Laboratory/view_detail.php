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
        echo "<h2>Complete Details</h2>";
        echo "<p><strong>Ambulance Form ID:</strong> " . $row['Ambulance_form_ID'] . "</p>";
        echo "<p><strong>Patient Name:</strong> " . $row['Patient_Name'] . "</p>";
        echo "<p><strong>Pickup Time:</strong> " . $row['Pickuptime'] . "</p>";
        echo "<p><strong>Patient Email:</strong> " . $row['patient_email'] . "</p>";
        echo "<p><strong>City:</strong> " . $row['City'] . "</p>";
        echo "<p><strong>Cell:</strong> " . $row['Cell'] . "</p>";
        echo "<p><strong>Reason:</strong> " . $row['Reason'] . "</p>";
        echo "<p><strong>Address:</strong> " . $row['Address'] . "</p>";
        echo "<p><strong>Preferred Date:</strong> " . $row['Preferred_Date'] . "</p>";
        echo "<p><strong>Area:</strong> " . $row['Area'] . "</p>";
        echo "<p><strong>Special Instruction:</strong> " . $row['Special_Instruction'] . "</p>";
        echo "<p><strong>Created At:</strong> " . $row['created_at'] . "</p>";

        echo "<form method='POST'>";
        echo "<input type='hidden' name='ambulanceFormID' value='" . $row['Ambulance_form_ID'] . "'>";
        echo "<button type='submit' name='accepted' class='btn btn-primary'>Accepted</button>";
        echo "</form>";

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
                    header("Location: next_page.php?message=success");
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
