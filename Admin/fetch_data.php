<?php
include('../functions/myfunctions.php'); // Adjust the path if necessary

if (isset($_POST['week']) && isset($_POST['busNumbers'])) {
    $week = $_POST['week'];
    $busNumbers = $_POST['busNumbers'];

    foreach ($busNumbers as $busNumber) {
        echo "<h3>Bus Number $busNumber</h3>";

        $morningUsageCount = getBusUsageCount($busNumber, $week, 'morning');
        $afternoonUsageCount = getBusUsageCount($busNumber, $week, 'afternoon');

        echo "<p>Morning Usage Count: $morningUsageCount</p>";
        echo "<p>Afternoon Usage Count: $afternoonUsageCount</p>";

        if ($morningUsageCount === 0 && $afternoonUsageCount === 0) {
            echo "<p>No data found for this bus and usage type.</p>";
        }
    }
}




if (isset($_POST['month']) && isset($_POST['busNumbers'])) {
    $month = $_POST['month'];
    $busNumbers = $_POST['busNumbers'];

    foreach ($busNumbers as $busNumber) {
        echo "<h3>Bus Number $busNumber</h3>";

        $morningUsageCount = getBusUsageCountByMonth($busNumber, $month, 'morning');
        $afternoonUsageCount = getBusUsageCountByMonth($busNumber, $month, 'afternoon');

        echo "<p>Morning Usage Count: $morningUsageCount</p>";
        echo "<p>Afternoon Usage Count: $afternoonUsageCount</p>";
    }
}

?>



