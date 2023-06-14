<!DOCTYPE html>
<html lang="en">
   <head>
   <style>
table {
    width: 100%;
    border-collapse: collapse;
}

td {
    width: 20%;
    padding: 10px;
    vertical-align: top;
}

.movie-poster {
    position: relative;
    width: 100%;
    margin-bottom: 20px;
}

.poster-image {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.poster-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.7);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.movie-poster:hover .poster-overlay {
    opacity: 1;
}

.poster-title {
    color: #fff;
    font-size: 16px;
    margin: 0;
}

.delete-button {
    margin-top: 10px;
}
</style>
   <?php
// Connect to database
$serverName = "LAPTOP-VER9JBS9\SQLEXPRESS";
$connectionInfo = array("Database" => "ASMR", "UID" => "reda1234", "PWD" => "reda1234");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die("<p>Connection failed: " . print_r(sqlsrv_errors(), true) . "</p>");
}

$list = array("Person", "Serie", "Genre");
$output = array();
foreach ($list as $item) {
    $sql = "SELECT count(*) FROM $item";
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die("<p>SQL query execution failed: " . print_r(sqlsrv_errors(), true) . "</p>");
    }

    // Fetch the count from the result
    if (sqlsrv_fetch($stmt) === false) {
        die("<p>SQL fetch failed: " . print_r(sqlsrv_errors(), true) . "</p>");
    }

    // Store the count in a variable
    $count = sqlsrv_get_field($stmt, 0);

    array_push($output, $count);
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
                    <h2>Add Series</h2>
                </div>
            </div>
        </div>

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
                    echo "<table class='poster-table'>";
                    $counter = 0; // Counter to track the number of movie posters
                    
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        // Start a new row after every fifth movie poster
                        if ($counter % 5 == 0) {
                            echo "<tr>";
                        }
                    
                        echo "<td>";
                        echo "<div class='movie-poster'>";
                        echo "<img class='poster-image' src='data:image;base64," . base64_encode(file_get_contents($row['cover'])) . "' ' width='100' height='100'> <br>";
                        echo "<div class='poster-overlay'>";
                        echo "<h4 class='poster-title'>" . $row['nom'] . "</h4>";
                        echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
                        echo "<input type='hidden' name='element_id' value='".$row['id_serie']."'>";
                        echo "<input class='delete-button' type='submit' name='delete' value='Delete'>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</td>";
                    
                        $counter++;
                    
                        // Close the row after every fifth movie poster
                        if ($counter % 5 == 0) {
                            echo "</tr>";
                        }
                    }
                    
                    // Close the last row if there are remaining movie posters
                    if ($counter % 5 != 0) {
                        echo "</tr>";
                    }
                    
                    echo "</table>";
                    }
                    


                
            
                // Function to delete an element from the table
                function deleteElement($conn, $elementId) {
                    $sql = "DELETE FROM serie WHERE id_serie = ?";
                    $params = array($elementId);
                    $stmt = sqlsrv_prepare($conn, $sql, $params);
            
                    if (!$stmt) {
                        die("<p>SQL statement preparation failed: " . sqlsrv_errors() . "</p>");
                    }
            
                    if (sqlsrv_execute($stmt) === false) {
                        die("<p>SQL statement execution failed: " . sqlsrv_errors() . "</p>");
                    }
            
                    echo "Element deleted successfully.";
                }
            
                // Check if the form is submitted for deletion
                if (isset($_POST['delete'])) {
                    $elementId = $_POST['element_id'];
            
                    // Delete the chosen element from the table
                    deleteElement($conn, $elementId);
            
                    // Display the updated elements after deletion
                    echo "<br>Updated elements in the table:<br>";
                    displayElements($conn);
                }
            
                // Check if the search form is submitted
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
                        echo "Search results for '{$searchKeyword}':<br>";

                        // Display the search results
                        $counter = 0;
                        echo "<table>";
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            // Start a new row after every fifth movie poster
                            if ($counter % 5 == 0) {
                                echo "<tr>";
                            }
                        
                            echo "<td>";
                            echo "<div class='movie-poster'>";
                            echo "<img class='poster-image' src='data:image;base64," . base64_encode(file_get_contents($row['cover'])) . "' ' width='100' height='100'> <br>";
                            echo "<div class='poster-overlay'>";
                            echo "<h4 class='poster-title'>" . $row['nom'] . "</h4>";
                            echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
                            echo "<input type='hidden' name='element_id' value='".$row['id_serie']."'>";
                            echo "<input class='delete-button' type='submit' name='delete' value='Delete'>";
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                            echo "</td>";
                        
                            $counter++;
                        
                            // Close the row after every fifth movie poster
                            if ($counter % 5 == 0) {
                                echo "</tr>";
                            }
                        }
                        
                        // Close the last row if the number of movie posters is not a multiple of 5
                        if ($counter % 5 != 0) {
                            echo "</tr>";
                        }
                        echo "</table>";
                        
                    } else {
                        echo "No results found for '{$searchKeyword}'.";
                    }

                    // Close the statement
                    sqlsrv_free_stmt($stmt);
                } else {
                    // Display all elements from the table
                    echo "Elements in the table:<br>";
                    displayElements($conn);
                }
                ?>
            </div>
        </div>
    </div>
</div>

                     </div>
               <!-- end dashboard inner -->
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