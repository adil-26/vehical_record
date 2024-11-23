<?php
session_start();
error_reporting(0);
require_once('admin/include/config.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Vehicle Record System|| Home Page</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
      <!-- style css -->

      <link rel="stylesheet" type="text/css" href="css1/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css1/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css1/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
   <style>
      
      .owner_section {
  background-color: #f8f9fa;
  padding: 50px 0;
}

.owner_taital {
  font-size: 40px;
  color: #1a1a1a;
  font-weight: bold;
  text-align: center;
  margin-bottom: 30px;
}

.owner_section_2 {
  margin-top: 30px;
}
.owner_search_section, .owner_details_section {
   background-color: #f8f9fa;
   padding: 50px 0;
}

.owner_search_taital {
   font-size: 30px;
   color: #1a1a1a;
   font-weight: bold;
   text-align: center;
   margin-bottom: 30px;
}

.owner_details_section table {
   margin-top: 20px;
}
   </style>

   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <strong style="color: white;font-size: 20px;">Vehicle Record System</strong>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="admin/index.php">Admin</a>
                     </li>
                     
                  </ul>
              
               </div>
            </nav>
         </div>
      </div>
      <!-- header section end -->
      <div class="call_text_main">
         <div class="container">
             <?php
$pagetype="contactus";            
$sql = "SELECT * from tblpage where PageType=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
?>
            <div class="call_taital">
               <div class="call_text"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_15"><?php echo htmlentities($row->PageDescription);?></span></a></div>
               <div class="call_text"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_15"><?php echo htmlentities($row->MobileNumber);?></span></a></div>
               <div class="call_text"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_15"><?php echo htmlentities($row->Email);?></span></a></div>
            </div><?php  $cnt=$cnt+1; } } ?>
         </div>
      </div>
      <!-- banner section start --> 
      <div class="banner_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div id="banner_slider" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">Vehicle Record <br><span style="color: #fe5b29;">For You</span></h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <div class="btn_main">
                               
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">Vehicle Record <br><span style="color: #fe5b29;">For You</span></h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <div class="btn_main">
                                 
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">Vehicle Record <br><span style="color: #fe5b29;">For You</span></h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <div class="btn_main">
                                
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                     </a>
                     <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                     </a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="banner_img"><img src="images/banner-img.png"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="about_section_2">
               <div class="row">
                  <div class="col-md-6"> 
                     <div class="image_iman"><img src="images/about-img.png" class="about_img"></div>
                  </div>
                  <div class="col-md-6"> 
                     <div class="about_taital_box">
                         <?php
$pagetype="aboutus";            
$sql = "SELECT * from tblpage where PageType=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
?>
                        <h1 class="about_taital">About <span style="color: #fe5b29;">Us</span></h1>
                        <p class="about_text"><?php echo ($row->PageDescription);?> </p>
                        <?php  $cnt=$cnt+1; } } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- search section start -->
      <div class="search_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="search_taital">Search Vehicle Details</h1>
                  
                  <form method="post" action="">
                     <div class="form-group">
                        <input type="text" class="form-control" name="regNum" placeholder="Enter Registration Number" required>
                     </div>
                     <div class="form-group text-center">
                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- search section end -->

      <!-- results section start -->
      <!-- results section start -->
      <div class="results_section layout_padding">
         <div class="container">
            <?php
            if(isset($_POST['search'])) {
               $regNum = $_POST['regNum'];
               $sql = "SELECT v.*, b.BrandName, o.owner_name, o.contact, o.email, o.address 
                       FROM tblvehicle v
                       LEFT JOIN tblbrand b ON v.BrandID = b.id
                       LEFT JOIN tblowner o ON v.owner_id = o.id
                       WHERE v.RegNum = :regNum";
               $query = $dbh->prepare($sql);
               $query->bindParam(':regNum', $regNum, PDO::PARAM_STR);
               $query->execute();
               $result = $query->fetch(PDO::FETCH_ASSOC);

               if($result) {
            ?>
               <h2 class="results_taital">Vehicle Details</h2>
               <table class="table table-bordered">
                  <tr>
                     <th>Brand</th>
                     <td><?php echo htmlentities($result['BrandName']); ?></td>
                  </tr>
                  <tr>
                     <th>Vehicle Name</th>
                     <td><?php echo htmlentities($result['VehicleName']); ?></td>
                  </tr>
                  <tr>
                     <th>Model Number</th>
                     <td><?php echo htmlentities($result['ModelNum']); ?></td>
                  </tr>
                  <tr>
                     <th>Registration Number</th>
                     <td><?php echo htmlentities($result['RegNum']); ?></td>
                  </tr>
                  <tr>
                     <th>Vehicle Type</th>
                     <td><?php echo htmlentities($result['VehicleType']); ?></td>
                  </tr>
                  <tr>
                     <th>Vehicle Subtype</th>
                     <td><?php echo htmlentities($result['VehcleSubtype']); ?></td>
                  </tr>
                  <tr>
                     <th>Variant</th>
                     <td><?php echo htmlentities($result['Varient']); ?></td>
                  </tr>
                  <tr>
                     <th>Transmission</th>
                     <td><?php echo htmlentities($result['Transmission']); ?></td>
                  </tr>
                  <tr>
                     <th>Chasis Number</th>
                     <td><?php echo htmlentities($result['ChasisNumber']); ?></td>
                  </tr>
                  <tr>
                     <th>Engine Number</th>
                     <td><?php echo htmlentities($result['EngineNumber']); ?></td>
                  </tr>
               </table>

               <h2 class="results_taital mt-4">Owner Details</h2>
               <table class="table table-bordered">
                  <tr>
                     <th>Owner Name</th>
                     <td><?php echo htmlentities($result['owner_name']); ?></td>
                  </tr>
                  <tr>
                     <th>Contact Number</th>
                     <td><?php echo htmlentities($result['contact']); ?></td>
                  </tr>
                  <tr>
                     <th>Email</th>
                     <td><?php echo htmlentities($result['email']); ?></td>
                  </tr>
                  <tr>
                     <th>Address</th>
                     <td><?php echo htmlentities($result['address']); ?></td>
                  </tr>
               </table>
            <?php
               } else {
                  echo "<p class='text-center'>No vehicle found with the given registration number.</p>";
               }
            }
            ?>
         </div>
       <span>  <li class="nav-item">
                        <a class="nav-link" href="index.php"><span>                                 refresh</span></a>
                     </li>
       </span>
      </div>
      <!-- results section end -->
      <!-- results section end -->
    
      <!-- copyright section start -->
     
    
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <p class="copyright_text">Vehicle Records System</p>
               </div>
            </div>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js1/jquery.min.js"></script>
      <script src="js1/popper.min.js"></script>
      <script src="js1/bootstrap.bundle.min.js"></script>
      <script src="js1/jquery-3.0.0.min.js"></script>
      <script src="js1/plugin.js"></script>
      <!-- sidebar -->
      <script src="js1/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js1/custom.js"></script>
   </body>
</html>