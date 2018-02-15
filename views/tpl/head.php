<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le pendu</title>
</head>
<body>
<div>
    <h1>Trouve le mot en moins de <?= $this::MAXTRIALS ?> coups !</h1>
</div>
<div>
    <p>Le mot à deviner compte <?= $this->wordSize ?>        lettres&nbsp;: <?= $this->hiddenWord ?></p>
</div>
<div>
    <img src="images/pendu<?= $this->missed ?>.gif"
         alt="">
</div>
<div>
    <p>Voici les lettres que tu as déjà essayées&nbsp;: <?= $this->usedLetterStr() ?></p>
</div>