<!-- vueListeRestos.php -->
<h1>Liste des restaurants</h1>

<?php foreach ($listeRestos as $resto) : ?>
    <?php
    $lesPhotos = $photoManager->getPhotosByIdR($resto['idR']);
    ?>
    <div class="card">
        <div class="photoCard">
            <?php if (!empty($lesPhotos)) : ?>
                <img src="photos/<?= $lesPhotos[0]["cheminP"] ?>" alt="photo du restaurant" />
            <?php endif; ?>
        </div>
        <div class="descrCard">
            <?php echo "<a href='./?action=detail&idR=" . $resto['idR'] . "'>" . $resto['nomR'] . "</a>"; ?>
            <br />
            <?= $resto["numAdrR"] . " " . $resto["voieAdrR"] ?>
            <br />
            <?= $resto["cpR"] . " " . $resto["villeR"] ?>
        </div>
        <div class="tagCard">
            <ul id="tagFood">
                <!-- Ajoutez ici les balises li pour les tags alimentaires -->
            </ul>
        </div>
    </div>
<?php endforeach; ?>
