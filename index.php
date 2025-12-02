<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Mini-Sport</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <aside class="sidebar">
        <h2>Mini-Sport</h2>
        <ul>
            <li><a class="active" href="index.php">Dashboard</a></li>
            <li><a href="cours/liste.php">Cours</a></li>
            <li><a href="equipements/liste.php">Équipements</a></li>
        </ul>
    </aside>
    <main class="main-content">
        <h1>Dashboard</h1>
        <div class="stats">
            <div class="card">
                <h2 >
                    <?php echo $conn->query("SELECT COUNT(*) AS total FROM cours")->fetch_assoc()['total']; ?>
                </h2>
                <p>Total Cours</p>
                
            </div>

            <div class="card">
                <h2>
                    <?php echo $conn->query("SELECT COUNT(*) AS total FROM equipements")->fetch_assoc()['total']; ?>
                </h2>
                <p>Total Équipements</p>
            </div>
        </div>
    <div class="list-container">
            <h2>Répartition des cours par type</h2>
            <ul>
                <?php
                    $req = $conn->query("SELECT categorie, COUNT(*) AS nbr FROM cours GROUP BY categorie");
                    while($row = $req->fetch_assoc()){
                        echo "<li>{$row['categorie']} : {$row['nbr']} cours</li>";
                    }
                ?>
            </ul>
        </div>
        <div class="list-container">
            <h2>Répartition des équipements par type</h2>
            <ul>
                <?php
                    $req = $conn->query("SELECT type, COUNT(*) AS nbr FROM equipements GROUP BY type");
                    while($row = $req->fetch_assoc()){
                        echo "<li>{$row['type']} : {$row['nbr']} équipements</li>";
                    }
                ?>
            </ul>
        </div>
    </main>
</div>
</body>
</html>
