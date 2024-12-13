<?php 
include('../../connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Optionally delete cities first if necessary (if cascading deletes are not set)
    $deleteCities = "DELETE FROM ville WHERE id_pays = '$id'";
    $connectdata->query($deleteCities);  // Execute the query to delete cities

    // Then, delete the country
    $deleteCountry = "DELETE FROM pays WHERE id_pays = '$id'";
    $result = $connectdata->query($deleteCountry);  // Execute the query to delete the country

    if ($result) {
        // Redirect to index page after deletion
        header("Location: ../../index.php");
    } else {
        echo "Error deleting country.";
    }
}
?>
