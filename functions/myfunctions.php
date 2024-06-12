<?php
include('../config/dbcon.php');

function getAll($table)
{
    global $con;

    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($con, $query);

    if (!$query_run) {
        // Query execution failed
        return false;
    }

    $data = array(); // Initialize an array to store the fetched data

    // Fetch each row of data from the query result
    while ($row = mysqli_fetch_assoc($query_run)) {
        $data[] = $row;
    }

    return $data; // Return the fetched data
}

function getWaitingListLearners()
{
    global $con;

    $query = "SELECT Learner.*, Waitinglist.Waitinglistnumber, Waitinglist.Waitinglistdate
              FROM Learner
              JOIN Waitinglist ON Learner.LearnerID = Waitinglist.LearnerID";

    $query_run = mysqli_query($con, $query);

    if (!$query_run) {
        // Query execution failed
        return false;
    }

    $data = array(); // Initialize an array to store the fetched data

    // Fetch each row of data from the query result
    while ($row = mysqli_fetch_assoc($query_run)) {
        $data[] = $row;
    }

    return $data; // Return the fetched data
}

function getBusUsageByDay($busNumber, $date, $usageType)
{
    global $con;

    $query = "SELECT Learner.*, LearnerBusUsage.Date, LearnerBusUsage.UsageType
              FROM Learner
              JOIN LearnerBusUsage ON Learner.LearnerID = LearnerBusUsage.LearnerID
              WHERE Learner.Busnumber = $busNumber
                AND LearnerBusUsage.Date = '$date'
                AND LearnerBusUsage.UsageType = '$usageType'";

    $query_run = mysqli_query($con, $query);

    if (!$query_run) {
        // Query execution failed
        return false;
    }

    $data = array(); // Initialize an array to store the fetched data

    // Fetch each row of data from the query result
    while ($row = mysqli_fetch_assoc($query_run)) {
        $data[] = $row;
    }

    return $data; // Return the fetched data
}

function getBusUsageCount($busNumber, $week, $usageType)
{
    global $con;

    // Modify this query to match your table structure
    $query = "SELECT COUNT(*) AS count
              FROM Learner
              JOIN LearnerBusUsage ON Learner.LearnerID = LearnerBusUsage.LearnerID
              WHERE Learner.Busnumber = $busNumber
                AND WEEK(LearnerBusUsage.Date) = WEEK('$week')
                AND LearnerBusUsage.UsageType = '$usageType'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $row = mysqli_fetch_assoc($query_run);
        return $row['count'];
    } else {
        return 0; // Return 0 if no data is found or query fails
    }
}
function getBusUsageCountByMonth($busNumber, $month, $usageType)
{
    global $con;

    // Modify this query to match your table structure
    $query = "SELECT COUNT(*) AS count
              FROM Learner
              JOIN LearnerBusUsage ON Learner.LearnerID = LearnerBusUsage.LearnerID
              WHERE Learner.Busnumber = $busNumber
                AND MONTH(LearnerBusUsage.Date) = MONTH('$month')
                AND LearnerBusUsage.UsageType = '$usageType'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $row = mysqli_fetch_assoc($query_run);
        return $row['count'];
    } else {
        return 0; // Return 0 if no data is found or query fails
    }
}



function redirect($url, $message) {
    session_start(); // Start the session if not already started
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}

?>

