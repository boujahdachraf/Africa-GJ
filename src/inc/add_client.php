<?php 
    include('../../connection.php');
if ($_SERVER['REQUEST_METHOD']== "POST"){
    $country = $_POST['country'];
    $population = $_POST['population'];
    $langue = $_POST['langue'];
    $select = $_POST['select'];
    $insert = "INSERT INTO `pays` (`nom`, `population`, `langues`, `id_continent`) VALUES ( '$country', '$population', '$langue', '1')";
    $result = $connectdata->query($insert);
    if($result){
       header("Location: ..\..\index.php"); 
    }else{
        echo "there must be an error";
    }

}
