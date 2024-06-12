<?php

include('includes/header.php'); 
include('../functions/myfunctions.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Bus Monthly Data</h2>
            
            <!-- HTML month input -->
            <div class="form-group">
                <label for="selectedMonth">Select Month:</label>
                <input type="month" class="form-control" id="selectedMonth">
            </div>
            
            <!-- button to trigger the data display -->
            <button class="btn btn-primary" onclick="fetchData()">Fetch Data</button>
            
            <!-- div to display the fetched data -->
            <div id="dataDisplay" class="mt-4"></div>
        </div>
    </div>
</div>

<script>
function fetchData() {
    var selectedMonth = document.getElementById("selectedMonth").value;
    var busNumbers = [1, 2, 3]; 

    // Fetch data using AJAX or any other method
    $.ajax({
        url: "fetch_data.php",
        type: "POST",
        data: { month: selectedMonth, busNumbers: busNumbers },
        success: function(response) {
            document.getElementById("dataDisplay").innerHTML = response;
        }
    });
}
</script>

<?php include('includes/footer.php'); ?>
