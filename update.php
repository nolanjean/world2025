<?php
// Inclure la connexion à la base de données
require_once 'inc/manager-db.php';
// Vérifier si les données ont été envoyées via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    
    // Créer un tableau pour stocker les champs à mettre à jour
    $updateFields = [];
    $params = ['id' => $id]; // Ajouter l'ID pour la condition WHERE

    // Vérifier si chaque champ a été envoyé et l'ajouter à la requête si c'est le cas
    if (!empty($_POST['population'])) {
        $updateFields[] = "Population = :population";
        $params['population'] = $_POST['population'];
    }
    if (!empty($_POST['pnb'])) {
        $updateFields[] = "GNP = :pnb";
        $params['pnb'] = $_POST['pnb'];
    }
    if (!empty($_POST['chef'])) {
        $updateFields[] = "HeadOfState = :chef";
        $params['chef'] = $_POST['chef'];
    }
    if (!empty($_POST['esperance'])) {
        $updateFields[] = "LifeExpectancy = :esperance";
        $params['esperance'] = $_POST['esperance'];
    }

    // Si des champs ont été sélectionnés pour la mise à jour
    if (count($updateFields) > 0) {
        // Créer la clause SET dynamique
        $setClause = implode(", ", $updateFields);
        // Préparer la requête SQL
        $sql = "UPDATE Country SET $setClause WHERE id = :id";
        
        // Préparer et exécuter la requête
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute($params)) {
            // Redirection vers la page après la modification
            header("Location: index3.php?name=" . $id);
        } else {
            echo "Erreur lors de la mise à jour des données.";
        }

    } else {
        echo "Aucun champ à mettre à jour.";
    }
}