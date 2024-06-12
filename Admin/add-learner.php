<?php
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Learner</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="ParentID">Parent:</label>
                                <select name="ParentID" class="form-control" required>
                                    <option value="" disabled selected>Select Parent</option>
                                   
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="Busnumber">Bus Number:</label>
                                <select name="Busnumber" class="form-control" required>
                                    <option value="" disabled selected>Select Bus Number</option>
                                    
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="adminID">Admin ID:</label>
                                <select name="adminID" class="form-control" required>
                                    <option value="" disabled selected>Select Admin ID</option>
                                   
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="BusRouteID">Bus Route:</label>
                                <select name="BusRouteID" class="form-control" required>
                                    <option value="" disabled selected>Select Bus Route</option>
                                    
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="PickupID">Pickup Location:</label>
                                <select name="PickupID" class="form-control" required>
                                    <option value="" disabled selected>Select Pickup Location</option>
                                  
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="DropoffID">Dropoff Location:</label>
                                <select name="DropoffID" class="form-control" required>
                                    <option value="" disabled selected>Select Dropoff Location</option>
                                
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Learner name</label>
                                <input type="text" name="LearnerSurname" class="form-control" placeholder="Enter your surname">
                            </div>
                            <div class="col-md-6">
                                <label for="LearnerSurname">Learner Surname:</label>
                                <input type="text" name="LearnerSurname" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="LearnerCellPhoneNumber">Learner Cell Phone Number:</label>
                                <input type="text" name="LearnerCellPhoneNumber" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="Grade">Grade:</label>
                                <input type="number" name="Grade" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_learner_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>