<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen($_SESSION["adminid"])==0)
{   
    header('location:logout.php');
}
else {
    if(isset($_GET['del']))
    {
        $vid=intval($_GET['del']);
        $sql = "DELETE FROM tblvehicle WHERE ID=:vid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':vid', $vid, PDO::PARAM_INT);
        if($query->execute())
        {
            $_SESSION['msg'] = "Record deleted successfully";
        }
        else
        {
            $_SESSION['error'] = "Something went wrong. Please try again";
        }
        header("Location: manage-vehicle.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive">
    <title>Vehicle Record System || Manage Vehicle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
</head>
<body class="app sidebar-mini rtl">
    <?php include 'include/header.php'; ?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include 'include/sidebar.php'; ?>
<main class="app-content">
    <?php 
    if(isset($_SESSION['msg']))
    {
        echo '<div class="alert alert-success-alt alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Success:</strong> '.$_SESSION['msg'].'
              </div>';
        unset($_SESSION['msg']);
    }
    if(isset($_SESSION['error']))
    {
        echo '<div class="alert alert-danger-alt alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error:</strong> '.$_SESSION['error'].'
              </div>';
        unset($_SESSION['error']);
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <h2 class="text-center mb-4">Manage Vehicle</h2>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" id="customSearch" placeholder="Search across all fields...">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered display" id="vehicleTable">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Vehicle Name</th>
                                    <th>Model Number</th>
                                    <th>Registration Number</th>
                                    <th>Vehicle Type</th>
                                    <th>Vehicle Subtype</th>
                                    <th>Variant</th>
                                    <th>Transmission</th>
                                    <th>Owner Name</th>
                                    <th>Owner Contact</th>
                                    <th>Owner Email</th>
                                    <th>Owner Address</th>
                                    <th>Description</th>
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT v.*, o.owner_name, o.contact, o.email, o.address 
                                        FROM tblvehicle v 
                                        LEFT JOIN tblowner o ON v.owner_id = o.id";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                    foreach($results as $result)
                                    {
                                ?>
                                <tr>
                                    <td><?php echo($cnt);?></td>
                                    <td><?php echo htmlentities($result->VehicleName);?></td>
                                    <td><?php echo htmlentities($result->ModelNum);?></td>
                                    <td><?php echo htmlentities($result->RegNum);?></td>
                                    <td><?php echo htmlentities($result->VehicleType);?></td>
                                    <td><?php echo htmlentities($result->VehcleSubtype);?></td>
                                    <td><?php echo htmlentities($result->Varient);?></td>
                                    <td><?php echo htmlentities($result->Transmission);?></td>
                                    <td><?php echo htmlentities($result->owner_name);?></td>
                                    <td><?php echo htmlentities($result->contact);?></td>
                                    <td><?php echo htmlentities($result->email);?></td>
                                    <td><?php echo htmlentities($result->address);?></td>
                                    <td><?php echo htmlentities($result->Description);?></td>
                                    <td><?php echo htmlentities($result->CreationDate);?></td>
                                    <td>
                                        <a href="edit-vehicle.php?vehid=<?php echo htmlentities($result->ID);?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button onclick="deleteRecord(<?php echo htmlentities($result->ID);?>)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <?php 
                                    $cnt=$cnt+1;
                                    }
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/plugins/pace.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#vehicleTable').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis'],
        responsive: true,
        language: {
            searchPlaceholder: "Search records"
        }
    });

    table.buttons().container()
        .appendTo('#vehicleTable_wrapper .col-md-6:eq(0)');

    $('#customSearch').on('keyup', function() {
        table.search(this.value).draw();
    });
});

function deleteRecord(id) {
    if(confirm("Are you sure you want to delete this record?")) {
        $.ajax({
            url: 'manage-vehicle.php',
            type: 'GET',
            data: {del: id},
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                alert("An error occurred while deleting the record.");
            }
        });
    }
}
</script>
</body>
</html>
<?php } ?>