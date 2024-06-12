<?php
include('includes/header.php');
include('../functions/myfunctions.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Learners on Waiting list</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Cellphone</th>
                                <th>Grade</th>
                                <th>Waitinglist Number</th>
                                <th>Date</th>
                                <th>EDIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $waitingListLearners = getWaitingListLearners();
                           if (!empty($waitingListLearners)) {
                               foreach ($waitingListLearners as $learner) {
                                   // Output the table rows using the learner and waiting list data
                                   echo "<tr>";
                                   echo "<td>{$learner['LearnerID']}</td>";
                                   echo "<td>{$learner['LearnerName']}</td>";
                                   echo "<td>{$learner['LearnerSurname']}</td>";
                                   echo "<td>{$learner['LearnerCellPhoneNumber']}</td>";
                                   echo "<td>{$learner['Grade']}</td>";
                                   echo "<td>{$learner['Waitinglistnumber']}</td>";
                                   echo "<td>{$learner['Waitinglistdate']}</td>";
                                   echo "<td>EDIT</td>";
                                   echo "</tr>";
                               }
                           } else {
                               echo "<tr><td colspan='8'>No learners on waiting list</td></tr>";
                           }
                           
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
