<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
<link rel="stylesheet" href="style.css">

<title>ASMR Series</title>

</head>
<body>
	<fieldset class="logofield">
		<img class="asmrlogo" src="asmrlogo.png" alt="">
	</fieldset>
	<div class="container">
	 <div class="topitem">
		<div class="select">
		<form method="get">
			<select name="genre">
				<option value="">All genres</option>
				<?php
				// Connect to database
				$serverName = "ASUS\SQLEXPRESS";
				$connectionInfo = array("Database"=>"ASMR", "UID"=>"reda1234", "PWD"=>"reda1234");
				$conn = sqlsrv_connect($serverName, $connectionInfo);
				if (!$conn) {
					die("<p>Connection failed: " . sqlsrv_errors() . "</p>");
				}

				// Retrieve genres
				$sql = "SELECT id_genre, nom FROM genre";
				$stmt = sqlsrv_query($conn, $sql);
				if ($stmt === false) {
					die("Error retrieving genres: " . print_r(sqlsrv_errors(), true));
				}

				// Display genres
				while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
					echo "<option value='" . $row['id_genre'] . "'>" . $row['nom'] . "</option>";
				}

				// Close connection
				sqlsrv_free_stmt($stmt);
				sqlsrv_close($conn);
				?>
			</select>
			<input type="submit" value="Filter" class="filterbutt">
		</form>
		</div>
		
		<?php
		
		session_start();
// Connect to database
$serverName = "ASUS\SQLEXPRESS";
$connectionInfo = array("Database"=>"ASMR", "UID"=>"reda1234", "PWD"=>"reda1234");
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Check if connection was successful
if (!$conn) {
    die("<p>Connection failed: " . sqlsrv_errors() . "</p>");
}

// Retrieve data
$pageSize = 5; // Number of results to display per page

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

$offset = ($currentPage - 1) * $pageSize;

if (isset($_GET['genre']) && !empty($_GET['genre'])) {
    // If a genre ID was specified, retrieve all series in that genre
    $genreId = $_GET['genre'];
    $sql = "SELECT s.id_serie,s.nom, s.cover, s.description FROM serie s
        INNER JOIN genre_of_serie gs ON s.id_serie = gs.id_serie
        WHERE gs.id_genre = $genreId
        ORDER BY s.nom
        OFFSET $offset ROWS
        FETCH NEXT $pageSize ROWS ONLY";
} else if (isset($_GET['search']) && !empty($_GET['search'])) {
    // If a search query was submitted, retrieve all series that match the query
    $search = $_GET['search'];

    $sql = "SELECT id_serie ,nom, cover, description FROM serie WHERE nom LIKE '%$search%'
        ORDER BY nom
        OFFSET $offset ROWS
        FETCH NEXT $pageSize ROWS ONLY";
} else {
    // Otherwise, retrieve all series
    $sql = "SELECT id_serie, nom, cover, description FROM serie
        ORDER BY nom
        OFFSET $offset ROWS
        FETCH NEXT $pageSize ROWS ONLY";
}

// Execute the SQL query
$stmt = sqlsrv_query($conn, $sql);

// Check if the query was successful
if ($stmt === false) {
    die("Error retrieving data: " . print_r(sqlsrv_errors(), true));
}

// Display search bar
echo "<form action='#' method='get class='searchform'><div class='searchdiv'> ";
echo "<input type='text' name='search' placeholder='Search series...' class='searchbar'><br>";
echo "<button type='submit' class='searchbutt' > <i class='fa-solid fa-magnifying-glass' style='color: black;'></i>  Search</button>";
echo "</div></form></div>";

// Display data
if (sqlsrv_has_rows($stmt)) {
    // If there are results, display them in a flexible container
    echo "<div class='card-container'>";
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
         // Display each series as a card
		 echo "<div class='card'>";
		 echo "<img src='data:image;base64," . base64_encode(file_get_contents($row['cover'])) . "' onclick='showDescription(\"" . rawurlencode($row['description']) . "\", \"" . $row['id_serie'] . "\")' />";
		 echo "<h2>" . $row['nom'] . "</h2>";
		 echo "</div>";
	}
 
	 echo "</div>";

    // Pagination
    $nextPage = $currentPage + 1;
    echo "<br><a class='nextbutt' href='?page=$nextPage' >Next <i class='fa-solid fa-greater-than fa-xl' style='color: #000000;'></i>  </a> <br>";
	
} 

else {
    // If there are no results, display a message
    echo "<p>No results found</p>";
}

// Close the SQL connection and free the statement resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

?>
	</div>
<div class="modal" id="modal" style="display:none">
  <div class="modal-content" style="background-color: black; border: 1px solid white;">
    <p id="description" class="desc" style="color: white;" ></p>
	<p id="id_serie"></p>
    <button  id="like-button" onclick="hideDescription()" ><i class="fa-solid fa-xmark iconbutt"></i></button>
    
	<button  id="like-button" onclick="likeSeries()"  ><i class="fa-solid fa-thumbs-up likebutt" style="color: #ffffff;"></i></button>
	
  </div>
</div>
<script>

	var idSerieElem = document.getElementById("id_serie").innerHTML;

	function showDescription(description, id_serie) {
    var modal = document.getElementById("modal");
    var descriptionElem = document.getElementById("description");
    
		
    descriptionElem.innerHTML = decodeURIComponent(description);
    idSerieElem = id_serie;
    var container = document.querySelector(".container");
    container.classList.add("blur");

    modal.style.display = "block";
  }

  function hideDescription() {
    var modal = document.getElementById("modal");
    var container = document.querySelector(".container");
    container.classList.remove("blur");
    modal.style.display = "none";
  }


	function likeSeries() {
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "like.php?idSerieElem=" + encodeURIComponent(idSerieElem), true);
	xhr.onreadystatechange = function() {
  	if (xhr.readyState === 4 && xhr.status === 200) {
   		 // Request completed successfully
    	var response = xhr.responseText;
    	console.log(response);
 		}	
	};
	xhr.send();
  }
</script>
</body>
</html>

