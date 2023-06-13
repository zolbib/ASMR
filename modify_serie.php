<!DOCTYPE html>
<html lang="en">
   <head>
   <style>
         
    table,tr,td{
            margin: 0px;
        }

    textarea,.inputfield{
            background-image: url("images/layout_img/pattern_h.png");
        background: #00000078;
        color: white;
        border: none;
        /* padding: 10px; */

     }
    .updatebutt{
        background-image: url("images/layout_img/pattern_h.png");
        padding: 5px 10px;
        background: #00000078;
        color: white;
        margin-left: 100px;
        margin-top: 10px;

    }
    .filebutt{
        background-image: url("images/layout_img/pattern_h.png");
        padding: 5px 10px;
        color: white;  
    }

</style>
      
   <?php
         // Connect to the database
         $serverName = "LAPTOP-VER9JBS9\SQLEXPRESS";
         $connectionInfo = array("Database"=>"ASMR", "UID"=>"reda1234", "PWD"=>"reda1234");
         $conn = sqlsrv_connect($serverName, $connectionInfo);


         $list = array("Person","Serie","Genre");
         $output = array();
         foreach ($list as $item) {
            $sql = "SELECT count(*) FROM $item";
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
         $sql = "SELECT * FROM Serie";
         $stmt = sqlsrv_query($conn, $sql);
         if ($stmt === false) {
            die("<p>SQL query execution failed: " . print_r(sqlsrv_errors(), true) . "</p>");
         }
         function displayElements($conn, $searchTerm = '', $sortBy = '') {
            $sql = "SELECT * FROM serie";
    
            // Add search condition
            if (!empty($searchTerm)) {
                $sql .= " WHERE nom LIKE '%$searchTerm%'";
            }
    
            // Add sorting condition
            if (!empty($sortBy)) {
                $sql .= " ORDER BY $sortBy";
            }
    
            $stmt = sqlsrv_query($conn, $sql);
            
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
               $id = $row['id_serie'];
               $title = $row['nom'];
               $description = $row['description'];
               $image = "data:image;base64," . base64_encode(file_get_contents($row['cover']));
               $cover = $row['cover'];
               echo '<table>';
         echo '<tr>';
         echo '<td>';
         echo '<table>';
         echo '<tr>';
         echo '<td><img class="img-responsive" src="' . $image . '" alt="' . $title . '"></td>';
         echo '</tr>';
         echo '</table>';
         echo '</td>';
         echo '</tr>';
         echo '<tr>';
         echo '<td>';
         echo '<table>';
         echo '<form action="" method="post" enctype="multipart/form-data">';
         echo '<input type="hidden" name="id" value= class="inputfield""' . $id . '">';
         echo '<tr>';
         echo '<td><label>Title:</label></td>';
         echo '<td><input type="text" name="title" class="inputfield" value="' . $title . '" required></td>';
         echo '</tr>';
         echo '<tr>';
         echo '<td><label>Description:</label></td>';
         echo '<td><textarea name="description" required rows="10" cols="30" ">' . $description . '</textarea></td>';
         echo '</tr>';
         echo '<tr>';
         echo '<td><label>Cover Image:</label></td>';
         echo '<td><input type="text" name="cover"  class="inputfield"> current path : ' .$cover .'</td>';
         echo '</tr>';
         echo '<tr>';
         echo '<td colspan="2"><input type="submit" name="update" value="Update" class="updatebutt"></td>';
         echo '</tr>';
         echo '</form>';
         echo '</table>';
         echo '</td>';
         echo '</tr>';
         echo '</table>';
         

            }
            }


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
                     <li class="active"><a href="admin.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>

                     <li><a href="welcome.php"><i class="fa fa-cog yellow_color"></i> <span>Welcome</span></a></li>

                     <li><a href="#"><i class="fa fa-bar-chart-o green_color"></i><span>Manage Users</span></a></li>
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
                              <h2>ModifySeries</h2>
                           </div>
                        </div>
                     </div>

                     <fieldset>
                        
        <div class="row">
            <div class="col-md-12">
                <div class="search_section">
                    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" name="search" placeholder="Search series by name">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
                     <div class="row">
                     <div class="col-md-12">

              <?php    
   if (isset($_GET['search'])) {
    // Retrieve the search keyword
    $searchKeyword = $_GET['search'];

    // Prepare the SQL statement with a WHERE clause for searching by name
    $sql = "SELECT * FROM serie WHERE nom LIKE '%' + ? + '%'";
    $params = array($searchKeyword);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die("<p>SQL statement execution failed: " . sqlsrv_errors() . "</p>");
    }

    // Check if any results were found
    if (sqlsrv_has_rows($stmt)) {
        echo "<p>Search results for '{$searchKeyword}':</p></br>";

        // Display the search results       
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $id = $row['id_serie'];
            $title = $row['nom'];
            $description = $row['description'];
            $image = "data:image;base64," . base64_encode(file_get_contents($row['cover']));
            echo '<table>';
      echo '<tr>';
      echo '<td>';
      echo '<table>';
      echo '<tr>';
      echo '<td><img class="img-responsive" src="' . $image . '" alt="' . $title . '"></td>';
      echo '</tr>';
      echo '</table>';
      echo '</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td>';
      echo '<table>';
      echo '<form action="" method="post" enctype="multipart/form-data">';
      echo '<input type="hidden" name="id" value= class="inputfield""' . $id . '">';
      echo '<tr>';
      echo '<td><label>Title:</label></td>';
      echo '<td><input type="text" name="title" class="inputfield" value="' . $title . '" required></td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td><label>Description:</label></td>';
      echo '<td><textarea name="description" required rows="10" cols="30" ">' . $description . '</textarea></td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td><label>Cover Image:</label></td>';
      echo '<td><input type="file" name="cover"  class="filebutt"></td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td colspan="2"><input type="submit" name="update" value="Update" class="updatebutt"></td>';
      echo '</tr>';
      echo '</form>';
      echo '</table>';
      echo '</td>';
      echo '</tr>';
      echo '</table>';
        }

        
    } else {
        echo "No results found for '{$searchKeyword}'.";
    }

    // Close the statement
    sqlsrv_free_stmt($stmt);
} else {
    // Display all elements from the table
    echo "<div>Elements in the table:</div><br>";
    displayElements($conn);
  
}

   ?>
                    

   </div>
                        </fieldset>
                  </div>
               </div>
            </div>
            </fieldset>
         </div>
      </div>
         


      <!-- js section -->
      <!-- jQuery library -->
      <script src="js/jquery.min.js"></script>
      <!-- select bootstrap -->
      <script src="js/bootstrap-select.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.min.js"></script>
      <!-- chart js -->
      <script src="js/chart.js"></script>
      <!-- fa js -->
      <script src="js/fa.js"></script>
      <!-- sidebar menu  -->
      <script src="js/metisMenu.js"></script>
      <!-- map -->
      <script src="https://maps.googleapis.com/maps/api/js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/dashboard.js"></script>
      <!-- map -->
      <script src="js/google_map.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>

   </body>
</html>
