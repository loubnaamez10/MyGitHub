<?php

function Afficher($data) {
    echo "<fieldset>";
    echo "<legend>Données saisies</legend>";

    if (!empty($data['nom'])) echo "Nom : " . htmlspecialchars($data['nom']) . "<br>";
    if (!empty($data['prenom'])) echo "Prénom : " . htmlspecialchars($data['prenom']) . "<br>";
    if (!empty($data['telephone'])) echo "Téléphone : " . htmlspecialchars($data['telephone']) . "<br>";
    if (!empty($data['date_naissance'])) echo "Date de naissance : " . htmlspecialchars($data['date_naissance']) . "<br>";
    if (!empty($data['adresse'])) echo "Adresse : " . htmlspecialchars($data['adresse']) . "<br>";
    if (!empty($data['genre'])) echo "Genre : " . htmlspecialchars($data['genre']) . "<br>";
    if (!empty($data['type_stage'])) echo "Type de stage : " . htmlspecialchars($data['type_stage']) . "<br>";
    if (!empty($data['langues'])) echo "Langues : " . implode(" - ", $data['langues']) . "<br>";
    if (!empty($data['specialite'])) echo "Spécialité : " . htmlspecialchars($data['specialite']) . "<br>";

    echo "</fieldset>";
}

function Verifier() {
    $erreurs = [];

    if (empty($_POST['nom'])) $erreurs[] = "Veuillez remplir le champ Nom.";
    if (empty($_POST['prenom'])) $erreurs[] = "Veuillez remplir le champ Prénom.";
    if (empty($_POST['telephone'])) $erreurs[] = "Veuillez remplir le champ Téléphone.";
    if (empty($_POST['date_naissance'])) $erreurs[] = "Veuillez remplir le champ Date de naissance.";
    if (empty($_POST['adresse'])) $erreurs[] = "Veuillez remplir le champ Adresse.";
    if (empty($_POST['genre'])) $erreurs[] = "Veuillez remplir le champ Genre.";
    if (empty($_POST['type_stage'])) $erreurs[] = "Veuillez remplir le champ Type de stage.";
    if (empty($_POST['langues'])) $erreurs[] = "Veuillez remplir le champ Langues.";
    if (empty($_POST['specialite'])) $erreurs[] = "Veuillez remplir le champ Spécialité.";

    return $erreurs;
}

function AfficherErreurs($erreurs) {
    echo "<fieldset style='color:red'>";
    echo "<legend>Champs manquants</legend>";
    foreach ($erreurs as $erreur) {
        echo $erreur . "<br>";
    }
    echo "<br><a href='index.html'>Retour au formulaire</a>";
    echo "</fieldset>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $erreurs = Verifier();

    if (empty($erreurs)) {
        Afficher($_POST);
    } else {
        AfficherErreurs($erreurs);
    }
}
?>