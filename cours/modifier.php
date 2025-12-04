<?php 
include "../db.php";

if(!isset($_GET['idCours']) || empty($_GET['idCours'])){
    die("ID du cours manquant !");
}

$idCours = $_GET['idCours'];
$sql = "SELECT * FROM cours WHERE idCours = $idCours";
$result = $conn->query($sql);

if($result->num_rows == 0){
    die("Cours introuvable !");
}

$rs = $result->fetch_assoc();
$nom = $rs['nom'];
$categorie = $rs['categorie'];
$date = $rs['date'];
$heure = $rs['heure'];
$duree = $rs['durée'];
$maxParticipants = $rs['maxParticipants'];
$success = $error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nom = $_POST['Nom'];
    $categorie = $_POST['Categorie'];
    $date = $_POST['Date'];
    $heure = $_POST['Heure'];
    $duree = $_POST['Duree'];
    $maxParticipants = $_POST['MaxParticipants'];

    if($nom && $categorie && $date && $heure && $duree && $maxParticipants){
        $sql = "UPDATE cours SET 
                    nom='$nom',
                    categorie='$categorie',
                    date='$date',
                    heure='$heure',
                    durée='$duree',
                    maxParticipants='$maxParticipants'
                WHERE idCours = $idCours";

        if($conn->query($sql)){
            header("Location:../cours/liste.php");
            exit();
        } else {
            $error = "Erreur lors de la modification du cours.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Cours</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <aside class="sidebar">
        <h2>Mini-Sport</h2>
        <ul>
            <li><a href="../index.php">Dashboard</a></li>
            <li><a class="active" href="liste.php">Cours</a></li>
            <li><a href="../equipements/liste.php">Équipements</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <h1>Modifier le Cours</h1>

        <?php if($success) echo "<p class='success-msg'>$success</p>"; ?>
        <?php if($error) echo "<p class='error-msg'>$error</p>"; ?>

        <form class="form-box" action="" method="POST">

            <label>Nom du cours</label>
            <input type="text" name="Nom" value="<?php echo $nom; ?>" required>

            <label>Catégorie</label>
            <input type="text" name="Categorie" value="<?php echo $categorie; ?>" required>  

            <label>Date</label>
            <input type="date" name="Date" value="<?php echo $date ?>" required>

            <label>Heure</label>
            <input type="time" name="Heure" value="<?php echo $heure ?>" required>

            <label>Durée (minutes)</label>
            <input type="number" name="Duree" value="<?php echo $duree ?>" required>

            <label>Max Participants</label>
            <input type="number" name="MaxParticipants" value="<?php echo $maxParticipants ?>" required>

            <button type="submit">Modifier</button>
        </form>
    </main>
</div>
</body>
</html>
