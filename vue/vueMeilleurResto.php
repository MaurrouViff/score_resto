<h1>Les 4 meilleurs restaurants ça tourne bien pas d'explication + giveaway handspinner</h1>

<?php
for ($i = 0; $i < 4; $i++) {
    $lesPhotos = getPhotosByIdR($bestRestos[$i]['idR']);
    $img = $bestRestos[$i]['idR'];
    ?>
    <div class="card">
        <div class="photoCard">
            <?php if (count($lesPhotos) > 0) { ?>
                <img src="photos/<?= $lesPhotos[0]["cheminP"] ?>" alt="photo du restaurant" />
            <?php } ?>
        </div>
        <div class="descrCard"><?php echo "<a href='./?action=detail&idR=" . $bestRestos[$i]['idR'] . "'>" . $bestRestos[$i]['nomR'] . "</a>"; ?>
            <br />
            <?= $bestRestos[$i]["numAdrR"] ?>
            <?= $bestRestos[$i]["voieAdrR"] ?>
            <br />
            <?= $bestRestos[$i]["cpR"] ?>
            <?= $bestRestos[$i]["villeR"] ?>
        </div>
        <div class="tagCard">
            <ul id="tagFood">
            </ul>
        </div>
    </div>
    <?php
}
?>