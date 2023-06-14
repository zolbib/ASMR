<!DOCTYPE html>
<html lang="en">
   <head>
   <style>
   .user-table {
      width: 100%;
      border-collapse: collapse;
   }

   .user-table th,
   .user-table td {
      padding: 10px;
      border: 1px solid #ccc;
   }

   .user-table th {
      background-color: #00000078;
   }

   .user-table input[type="text"] {
      width: 100%;
      padding: 5px;
   }

   .user-table input[type="submit"] {
      background-color: black;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
   }

   .user-table input[type="submit"]:hover {
      background-color: #00000078;
   }

   .success-message {
      color: green;
      font-weight: bold;
      margin-bottom: 10px;
   }

   .error-message {
      color: red;
      font-weight: bold;
      margin-bottom: 10px;
   }
</style>
   <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
   <?php
// Connect to database
$serverName = "LAPTOP-VER9JBS9\SQLEXPRESS";
$connectionInfo = array("Database"=>"ASMR", "UID"=>"reda1234", "PWD"=>"reda1234");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if (!$conn) {
    die("<p>Connection failed: " . sqlsrv_errors() . "</p>");
}


$list = array("Person","Serie","Genre");
$output = array();
foreach ($list as $item) {
    $sql = "SELECT count(*) FROM  $item";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch the count from the result
if (sqlsrv_fetch($stmt) === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Store the count in a variable
$count = sqlsrv_get_field($stmt, 0);

array_push($output, $count);

}





// Close connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

    ?>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style1.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="#"><img class="logo_icon img-responsive" src="adminlogo.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="adminlogo.png" alt="#" /></div>
                        <div class="user_info">
                           <h6>Olivier marquié</h6>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Admin Panel</h4>
                  <ul class="list-unstyled components">

                     <li><a href="welcome.php"><i class="fa fa-cog yellow_color"></i> <span>Welcome</span></a></li>  

                     <li class="active"><a href="admin.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>




                     <li><a href="manage_users.php"><i class="fa fa-bar-chart-o green_color"></i><span>Manage Users</span></a></li>
                     <li >
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bar-chart-o green_color"></i><span>Manage Series</span></a>
                        <ul class="collapse list-unstyled components" id="element">
                           <li><a href="Add_serie.php"> <span>Add Series</span></a></li>
                           <li><a href="delete_serie.php"> <span>Remove Series</span></a></li>
                           <li><a href="modify_serie.php"> <span>Modify Series</span></a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <fieldset class="back-field">
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <img class="img-responsive" src="asmrlogo.png" alt="#" style="	filter: invert(1);"/>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="name_user">Olivier marquié</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="login.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Manage Users</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                     <div class="col-md-12">
   <?php
   // Connect to the database
   $serverName = "LAPTOP-VER9JBS9\\SQLEXPRESS";
   $connectionInfo = array("Database" => "ASMR", "UID" => "reda1234", "PWD" => "reda1234");
   $conn = sqlsrv_connect($serverName, $connectionInfo);
   if (!$conn) {
       die("<p>Connection failed: " . sqlsrv_errors() . "</p>");
   }
   
   // Function to update user information
   function updateUser($conn, $id, $name, $user, $status)
   {
       $sql = "UPDATE Person SET nom = ?, utilisateur = ?, status = ? WHERE id_person = ?";
       $params = array($name, $user, $status, $id);
       $stmt = sqlsrv_query($conn, $sql, $params);
   
       // Handle update success or failure
       return $stmt !== false;
   }
   
   // Check if the form is submitted for user update
   if (isset($_POST['update_user'])) {
       $id = $_POST['user_id'];
       $name = $_POST['name'];
       $user = $_POST['email'];
       $status = $_POST['status'];
   
       // Update user information
       $result = updateUser($conn, $id, $name, $user, $status);
   
       if ($result) {
           echo "<p class='success-message'>User updated successfully.</p>";
       } else {
           echo "<p class='error-message'>Failed to update user.</p>";
       }
   }
   
   // Fetch users from the database
   $sql = "SELECT * FROM Person";
   $stmt = sqlsrv_query($conn, $sql);
   
   // Display users in a table with editable fields
   echo "<form method='post' action='test.php'>";
   echo "<table class='user-table'>";
   echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Status</th><th>Action</th></tr>";
   while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
       echo "<tr>";
       echo "<td>" . $row['id_person'] . "</td>";
       echo "<td><input type='text' name='name' value='" . $row['nom'] . "'></td>";
       echo "<td><input type='text' name='email' value='" . $row['utilisateur'] . "'></td>";
       echo "<td>";
       echo "<select name='status'>";
       
       // Fetch the options for the status column
       $statusOptions = array("user", "admin");
   
       foreach ($statusOptions as $option) {
           $selected = ($option == $row['status']) ? "selected" : "";
           echo "<option value='$option' $selected>$option</option>";
       }
       
       echo "</select>";
       echo "</td>";
       echo "<td>
           <input type='hidden' name='user_id' value='" . $row['id_person'] . "'>
           <input type='submit' name='update_user' value='Update'>
           </td>";
       echo "</tr>";
   }
   echo "</table>";
   echo "</form>";
   
   // Close the database connection
   sqlsrv_free_stmt($stmt);
   sqlsrv_close($conn);
   ?>
</div>

                     </div>
                  </div>
               </div>
            </fieldset>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/chart_custom_style1.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>