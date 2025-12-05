
<?php
include "../db.php";

if(!isset($_GET['idCours']) || empty($_GET['idCours'])) {
    die("ID du cours manquant !");
}

$idCours = $_GET['idCours'];
$sql = "SELECT * FROM cours WHERE idCours = $idCours";
$result = $conn->query($sql);

if($result->num_rows == 0){
    die("Cours introuvable !");
}

$sqlDelete = "DELETE FROM cours WHERE idCours = $idCours";
if($conn->query($sqlDelete)){
    header("Location:../cours/liste.php");
    exit;
} else {
    die("Erreur lors de la suppression du cours.");
}
?>
