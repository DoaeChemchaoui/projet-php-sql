<?php include "../db.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Cours</title>
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
        <h1>Liste des Cours</h1>
        <a href="ajout.php" class="btn-add">+ Ajouter un cours</a>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Durée (min)</th>
                    <th>Max Participants</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM cours";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nom']}</td>
                            <td>{$row['categorie']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['heure']}</td>
                            <td>{$row['durée']}</td>
                            <td>{$row['maxParticipants']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>

    </main>
</div>

</body>
</html>
