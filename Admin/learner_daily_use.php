<?php
include('includes/header.php'); // Include your header file
include('../functions/myfunctions.php'); // Include your functions file
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Learner Daily Bus Usage</h4>
                </div>
                <div class="card-body">
                    <?php
                    $busNumbers = array(1, 2, 3); // Replace with actual bus numbers

                    foreach ($busNumbers as $busNumber) :
                        ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="mb-0">Bus Number <?php echo $busNumber; ?></h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="selectedDate">Select Date:</label>
                                        <input type="date" class="form-control" id="selectedDate" name="selectedDate" value="<?php echo $date; ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Show Data</button>
                                </form>
                                <?php
                                $date = isset($_POST['selectedDate']) ? $_POST['selectedDate'] : date('Y-m-d');

                                $morningUsageLearners = getBusUsageByDay($busNumber, $date, 'morning');
                                if (!empty($morningUsageLearners)) :
                                    ?>
                                    <div class="mb-3">
                                        <h6 class="mb-0">Morning Usage</h6>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Surname</th>
                                                    <th>Cellphone</th>
                                                    <th>Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($morningUsageLearners as $learner) : ?>
                                                    <tr>
                                                        <td><?php echo $learner['LearnerID']; ?></td>
                                                        <td><?php echo $learner['LearnerName']; ?></td>
                                                        <td><?php echo $learner['LearnerSurname']; ?></td>
                                                        <td><?php echo $learner['LearnerCellPhoneNumber']; ?></td>
                                                        <td><?php echo $learner['Grade']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php else : ?>
                                    <p>No learners using the bus in the morning for Bus <?php echo $busNumber; ?> on <?php echo $date; ?></p>
                                <?php endif; ?>

                                <?php
                                $afternoonUsageLearners = getBusUsageByDay($busNumber, $date, 'afternoon');
                                if (!empty($afternoonUsageLearners)) :
                                ?>
                                    <div class="mb-3">
                                        <h6 class="mb-0">Afternoon Usage</h6>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Surname</th>
                                                    <th>Cellphone</th>
                                                    <th>Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($afternoonUsageLearners as $learner) : ?>
                                                    <tr>
                                                        <td><?php echo $learner['LearnerID']; ?></td>
                                                        <td><?php echo $learner['LearnerName']; ?></td>
                                                        <td><?php echo $learner['LearnerSurname']; ?></td>
                                                        <td><?php echo $learner['LearnerCellPhoneNumber']; ?></td>
                                                        <td><?php echo $learner['Grade']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php else : ?>
                                    <p>No learners using the bus in the afternoon for Bus <?php echo $busNumber; ?> on <?php echo $date; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); // Include your footer file ?>
