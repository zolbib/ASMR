<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
	<link rel="stylesheet" href="style.css">
	<title>ASMR Series</title>
	<style>

	</style>
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
				$serverName = "LAPTOP-VER9JBS9\SQLEXPRESS";
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
			<input type="submit" value="Filter"  class="filterbutt">
		</form>
		</div>
		<?php
// Connect to database
$serverName = "LAPTOP-VER9JBS9\SQLEXPRESS";
$connectionInfo = array("Database"=>"ASMR", "UID"=>"reda1234", "PWD"=>"reda1234");
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Check if connection was successful
if (!$conn) {
    die("<p>Connection failed: " . sqlsrv_errors() . "</p>");
}

// Retrieve data
if (isset($_GET['genre']) && !empty($_GET['genre'])) {
    // If a genre ID was specified, retrieve all series in that genre
    $genreId = $_GET['genre'];
	$personid = $_SESSION['id_person'];
	echo $personid;
    $sql = "select distinct s.nom, s.cover, s.description from serie s join genre_of_serie gs 
	on s.id_serie = gs.id_serie 
	where s.id_serie in 
	(select id_serie from genre_of_serie 
	where id_genre in
	(select id_genre from genre_of_serie 
	where id_serie in 
	(select id_serie from serie_liked where id_person = $personid )))";
		
} else if (isset($_GET['search']) && !empty($_GET['search'])) {
    // If a search query was submitted, retrieve all series that match the query
    $search = $_GET['search'];
    $sql = "SELECT nom, cover, description FROM serie WHERE nom LIKE '%$search%'";
} else {
    // Otherwise, retrieve all series
    $sql = "SELECT nom, cover, description FROM serie";
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
        echo "<img src='data:image;base64," . base64_encode(file_get_contents($row['cover'])) . "' onclick='showDescription(\"" . rawurlencode($row['description']) . "\")' />";
        echo "<h2>" . $row['nom'] . "</h2>";
        echo "</div>";
    }
    echo "</div>";
} else {
    // If there are no results, display a message
    echo "<p>No results found</p>";
}

// Close the SQL connection and free the statement resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
	</div>
</body>


	
<div class="modal" id="modal" style="display:none">
  <div class="modal-content" style="background-color: black; border: 1px solid white;">
    <p id="description" class="desc" style="color: white;" ></p>
	<p id="id_serie"></p>
    <button  id="like-button" onclick="hideDescription()" ><i class="fa-solid fa-xmark iconbutt"></i></button>  
</div>
</div>
	
		<script>
	function showDescription(description) {
		
  		console.log("showDescription");
		
		
		// Get modal element
		var modal = document.getElementById("modal");
		
		// Get description element
		var descriptionElem = document.getElementById("description");
		
		// Set description text
		descriptionElem.innerHTML = decodeURIComponent(description);
		
		// Add blur to container
		var container = document.querySelector(".container");
		container.classList.add("blur");
		
		// Show modal
		modal.style.display = "block";
		
	}
	
	function hideDescription() {
		console.log("hideDescription");

		// Get modal element
		var modal = document.getElementById("modal");
		
		// Remove blur from container
		var container = document.querySelector(".container");
		container.classList.remove("blur");
		
		// Hide modal
		modal.style.display = "none";
	}
</script>
</body>
</html>

