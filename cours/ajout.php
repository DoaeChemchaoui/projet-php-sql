<?php 
include "../db.php";

$nom ="";
$categorie ="";
$date ="";
$heure ="";
$duree =""; 
$maxParticipants = "";
$success ="";
$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nom = $_POST['Nom'];
    $categorie = $_POST['Categorie'];
    $date = $_POST['Date'];
    $heure = $_POST['Heure'];
    $duree = $_POST['Duree'];
    $maxParticipants = $_POST['MaxParticipants'];

    if($nom && $categorie && $date && $heure && $duree && $maxParticipants) {

        $sql = "INSERT INTO cours (nom, categorie, date, heure, durée, maxParticipants)
                VALUES ('$nom', '$categorie', '$date', '$heure', '$duree', '$maxParticipants')";

        if($conn->query($sql)){
            header("Location:../cours/liste.php");
            exit();
        } else {
            $error = "Erreur lors de l'ajout du cours.";
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
    <title>Ajouter un Cours</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <aside class="sidebar">
        <h2>Mini-Sport</h2>
        <ul>
            <li><a href="../index.php">Dashboard</a></li>
            <li><a class="active" href="../cours/liste.php">Cours</a></li>
            <li><a href="../equipements/liste.php">Équipements</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <h1>Ajouter un Cours</h1>

        <?php if($success) echo "<p class='success-msg'>$success</p>"; ?>
        <?php if($error) echo "<p class='error-msg'>$error</p>"; ?>

        <form class="form-box" action="" method="POST">

            <label>Nom du cours</label>
            <input type="text" name="Nom" value="<?php echo $nom; ?>" required>

            <label>Catégorie</label>
            <input type="text" name="Categorie" value="<?php echo $categorie; ?>" required>

            <label>Date</label>
            <input type="date" name="Date" value="<?php echo $date; ?>" required>

            <label>Heure</label>
            <input type="time" name="Heure" value="<?php echo $heure; ?>"required>

            <label>Durée (minutes)</label>
            <input type="number" name="Duree" value="<?php echo $duree; ?>"required>

            <label>Max Participants</label>
            <input type="number" name="MaxParticipants" value="<?php echo $maxParticipants; ?>"required>

            <button type="submit" name="Ajouter">Ajouter</button>
        </form>

    </main>

</div>
</body>
</html>
