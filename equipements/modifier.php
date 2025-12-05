<?php 
include "../db.php";

if(!isset($_GET['idEquipement']) || empty($_GET['idEquipement'])){
    die("ID d'equipement manquant !");
}

$idEquipement = $_GET['idEquipement'];
$sql = "SELECT * FROM equipements WHERE idEquipement = $idEquipement";
$result = $conn->query($sql);

if($result->num_rows == 0){
    die("Équipement introuvable !");
}

$rs = $result->fetch_assoc();
$nom = $rs['nom'];
$type = $rs['type'];
$quantiteDispo = $rs['quantiteDispo'];
$etat = $rs['etat'];

$success = $error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nom = $_POST['Nom'];
    $type = $_POST['Type'];
    $quantiteDispo = $_POST['QuantiteDispo'];
    $etat = $_POST['Etat'];

    if($nom && $type && $quantiteDispo && $etat){
        $sql = "UPDATE equipements SET 
                    nom='$nom',
                    type='$type',
                    quantiteDispo='$quantiteDispo',
                    etat='$etat'
                WHERE idEquipement = $idEquipement";

        if($conn->query($sql)){
            header("Location:../equipements/liste.php");
            exit();
        } else {
            $error = "Erreur lors de la modification de l'équipement.";
        }
    } else {
        $error = "Veuillez remplir tous les champs";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Équipement</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <aside class="sidebar">
        <h2>Mini-Sport</h2>
        <ul>
            <li><a href="../index.php">Dashboard</a></li>
            <li><a href="../cours/liste.php">Cours</a></li>
            <li><a class="active" href="../equipements/liste.php">Équipements</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <h1>Modifier l'équipement</h1>

        <?php if($success) echo "<p class='success-msg'>$success</p>"; ?>
        <?php if($error) echo "<p class='error-msg'>$error</p>"; ?>

        <form class="form-box" action="" method="POST">

            <label>Nom de l'équipement</label>
            <input type="text" name="Nom" value="<?php echo $nom; ?>"required>

            <label>Type</label>
            <input type="text" name="Type" value="<?php echo $type; ?>"required>

            <label>Quantité Disponible</label>
            <input type="number" name="QuantiteDispo" value="<?php echo $quantiteDispo; ?>"required>

            <label>État</label>
            <select name="Etat">
                <option value="" required>-- Sélectionner --</option>
                <option value="A Remplacer" <?php if($etat=="A Remplacer") echo "selected"; ?>>A Remplacer</option>
                <option value="Bon" <?php if($etat=="Bon") echo "selected"; ?>>Bon</option>
                <option value="Moyen" <?php if($etat=="Moyen") echo "selected"; ?>>Moyen</option>
            </select>

            <button type="submit">Modifier</button>
        </form>

    </main>

</div>

</body>
</html>
