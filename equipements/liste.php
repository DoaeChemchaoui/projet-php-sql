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
            <li><a href="../cours/liste.php">Cours</a></li>
            <li><a class="active"href="../equipements/liste.php">Équipements</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <h1>Liste des Équipements</h1>
        <a href="ajout.php" class="btn-add">+ Ajouter un équipement</a>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Quantité disponible</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM equipements";
                $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nom']}</td>
                                <td>{$row['type']}</td>
                                <td>{$row['quantiteDispo']}</td>
                                <td>{$row['etat']}</td>
                                <td>
                                    <a href='../equipements/modifier.php?idEquipement={$row['idEquipement']}' class='btn-edit'>Modifier</a>
                                    <a href='../equipements/supprimer.php?idEquipement={$row['idEquipement']}' onclick=\"return confirm('Voulez-vous vraiment supprimer cet équipement ?')\" class='btn-delete'>Supprimer</a>
                                </td>
                            </tr>";
                    }

                ?>
            </tbody>
        </table>

    </main>
</div>

</body>
</html>