<?php
require_once('admin/include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicle Details - Vehicle Record System</title>
    <link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css1/style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>
<body>
    <!-- Header section start -->
    <div class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.html"><img src="images/logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.html">Vehicles</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- Header section end -->

    <!-- Vehicle Details section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital">Vehicle Details</h1>
            <div class="services_section_2">
                <div class="row">
                    <?php
                    $sql = "SELECT v.*, b.BrandName FROM tblvehicle v JOIN tblbrand b ON v.BrandID = b.id";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    
                    if($query->rowCount() > 0) {
                        foreach($results as $result) {
                    ?>
                    <div class="col-md-4">
                        <div class="services_box">
                            <div class="icon_1"><img src="images/icon-1.png"></div>
                            <h4 class="selection_text"><?php echo htmlentities($result->VehicleName); ?></h4>
                            <p class="ipsum_text">
                                <strong>Brand:</strong> <?php echo htmlentities($result->BrandName); ?><br>
                                <strong>Model:</strong> <?php echo htmlentities($result->ModelNum); ?><br>
                                <strong>Reg Number:</strong> <?php echo htmlentities($result->RegNum); ?><br>
                                <strong>Type:</strong> <?php echo htmlentities($result->VehicleType); ?><br>
                                <strong>Subtype:</strong> <?php echo htmlentities($result->VehcleSubtype); ?><br>
                                <strong>Variant:</strong> <?php echo htmlentities($result->Varient); ?><br>
                                <strong>Transmission:</strong> <?php echo htmlentities($result->Transmission); ?><br>
                                <strong>Owner:</strong> <?php echo htmlentities($result->owner_name); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        echo "<p>No vehicles found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Vehicle Details section end -->

    <!-- Footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <h3 class="useful_text">About</h3>
                    <p class="footer_text">Vehicle Record System</p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h3 class="useful_text">Menu</h3>
                    <div class="footer_menu">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="gallery.html">Vehicles</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer section end -->

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>