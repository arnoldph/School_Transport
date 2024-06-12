<?php
include('includes/header.php');
include('../functions/myfunctions.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Learners</h4>
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
                                <th>EDIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $learners = getAll("learner"); 
                            if (!empty($learners)) {
                                foreach ($learners as $item) {
                                    ?>
                                    <tr>
                                        <td><?php echo $item['LearnerID']; ?></td>
                                        <td><?php echo $item['LearnerName']; ?></td>
                                        <td><?php echo $item['LearnerSurname']; ?></td>
                                        <td><?php echo $item['LearnerCellPhoneNumber']; ?></td>
                                        <td><?php echo $item['Grade']; ?></td>
                                        <td>EDIT</td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='6'>No records found</td></tr>";
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
