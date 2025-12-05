<?php
include "../db.php";

if(!isset($_GET['idEquipement']) || empty($_GET['idEquipement'])) {
    exit("ID du équipement manquant !");
}

$idEquipement = (int) $_GET['idEquipement'];
$sql = "SELECT * FROM equipements WHERE idEquipement = $idEquipement";
$result = $conn->query($sql);

if($result->num_rows == 0){
    exit("Équipement introuvable !");
}
$sqlDelete = "DELETE FROM equipements WHERE idEquipement = $idEquipement";

if($conn->query($sqlDelete)){
    header("Location: ../equipements/liste.php");
    exit();
} else {
    exit("Erreur lors de la suppression de l'équipement.");
}
?>
