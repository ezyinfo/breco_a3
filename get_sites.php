<?php
require "inc/config.php";
require "inc/locations.php";

/* For debug purpose only */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* For debug purpose only */

// Get and check query
$query = $_GET['query'] ?? '';

// If query is not alphanum, quit
if (!preg_match('/^[a-zA-Z0-9\-]+$/', $query)) {
    die("Wrong query.");
}

$locations = new Locations($mysql_host, $mysql_user, $mysql_pwd, $mysql_dbname);
if (!$locations->connect()) {
    die("Failed to connect");
}
$location_list = $locations->getLocations($query);


/*
// Stub for testing only
$locations = array(
    array("id" => 1, "name" => "Rennes"),
    array("id" => 2, "name" => "Saint-Malo"),
    array("id" => 3, "name" => "Vignoc"),
    array("id" => 4, "name" => "Tinténiac"),
    array("id" => 5, "name" => "Vannes"),
    array("id" => 6, "name" => "Dinan"),
    array("id" => 7, "name" => "Nantes"),
    array("id" => 8, "name" => "Ploermel")
);
*/

// Convert to JSON
$jsonResponse = json_encode($location_list);

// Send data
header('Content-Type: application/json');
echo $jsonResponse;
