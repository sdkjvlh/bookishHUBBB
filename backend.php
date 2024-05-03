<?php
$name = $_POST['name'];
$dept  = $_POST['dept'];
$year = $_POST['year'];
$phnum = $_POST['phnum'];
$stn= $_POST['stn'];
$qty= $_POST['qty'];

if (!empty($name) || !empty($dept) || !empty($year) || !empty($phnum) || !empty($stn) || !empty($qty))
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "registration";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
    } else {
        // Prepare and bind the INSERT statement
        $stmt = $conn->prepare("INSERT INTO user_details (`name`, `department`, `year`, `phone number`, `stationary thing`, `quantity`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $name, $dept, $year, $phnum, $stn, $qty);

        // Execute the statement
        if ($stmt->execute()) {
          echo "<script>window.location.href = 'sucesspage.html';</script>";
      } else {
          echo "Error: " . $stmt->error;
      }
      
      
        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}
?>
