<h1>Top 4 des meilleurs restaurants ça tourne mal explication, le 3ème va vous surprendre</h1>
<form action="./?action=listeMeilleursResto" method="POST">
    <input type="submit" name="liste-resto byScore" value="Voir la liste des meilleurs restaurants">
</form>

<h1>Liste des restaurants</h1>

<?php
for ($i = 0; $i < count($listeRestos); $i++) {

    $lesPhotos = getPhotosByIdR($listeRestos[$i]['idR']);
    ?>

    <div class="card">
        <div class="photoCard">
            <?php if (count($lesPhotos) > 0) { ?>
                <img src="photos/<?= $lesPhotos[0]["cheminP"] ?>" alt="photo du restaurant" />
            <?php } ?>


        </div>
        <div class="descrCard"><?php echo "<a href='./?action=detail&idR=" . $listeRestos[$i]['idR'] . "'>" . $listeRestos[$i]['nomR'] . "</a>"; ?>
            <br />
            <?= $listeRestos[$i]["numAdrR"] ?>
            <?= $listeRestos[$i]["voieAdrR"] ?>
            <br />
            <?= $listeRestos[$i]["cpR"] ?>
            <?= $listeRestos[$i]["villeR"] ?>
        </div>
        <div class="tagCard">
            <ul id="tagFood">


            </ul>


        </div>

    </div>





    <?php
}
?>


