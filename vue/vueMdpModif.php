
<h1>Modifier mon compte</h1>

Mon adresse électronique : <?= $util["mailU"] ?> <br />
Mon pseudo : <?= $util["pseudoU"] ?> <br />

Voici les caractères autorisés :
<ul>
    <li>A - Z</li>
    <li>a - z</li>
    <li>0 - 9</li>
</ul>

<hr>
<form action="./?action=updProfil" method="POST">
    Nouveau pseudo : <br />
    <input type="text" pattern="[a-zA-Z0-9]+" name="pseudoU" placeholder="Écrivez votre nouveau nom d'utilisateur"> <br>
    <input type="submit" value="Confirmer votre nouveau nom d'utilisateur">
</form>
<hr>
<form action="./?action=updProfil" method="POST">
    Votre ancien nom d'utilisateur: <br />
    <input type="password" pattern="[a-zA-Z0-9]+" placeholder="Votre ancien mot de passe" name="old_passwd">
    <br />
</form>
<form action="./?action=updProfil" method="POST">
    Votre nouveau mot de passe : <br />
    <input type="password" pattern="[a-zA-Z0-9]+" placeholder="Votre nouveau mot de passe" name="new_passwd">
    <br>
    Répéter votre mot de passe : <br />
    <input type="password" placeholder="Votre nouveau mot de passe" name="new_passwd2" pattern="[a-zA-Z0-9]+" > <br>
    <input type="submit" value="Confirmer votre nouveau mot de passe">
</form>
<br>
<hr>


Liste des restaurants aimés : <br />
<?php for($i=0;$i<count($mesRestosAimes);$i++){ ?>

    <a href="./?action=detail&idR=<?= $mesRestosAimes[$i]["idR"] ?>"><?= $mesRestosAimes[$i]["nomR"] ?></a>
    <a href='./?action=delResto&idR=<?= $mesRestosAimes[$i]['idR']; ?>'>Supprimer</a>
    <br />
<?php } ?>


<br>
<hr>
Les types de cuisines aimés :

<br />
<?php for($i=0;$i<count($mesTypeCuisineAimes);$i++){ ?>

    <li class="tag"><span class="tag">#</span><?= $mesTypeCuisineAimes[$i]["libelleTC"] ?></li>
    <a href='./?action=delCuisine&idR=<?= $mesTypeCuisineAimes[$i]["idTC"] ?>'>Supprimer</a><br />
<?php } ?>


<br>
<hr>
Les types de cuisines :
<br />

<?php for($j=0; $j<count($listeDesCuisine);$j++) { ?>
    <form action="./?action=addCuisine&idCuisine=<?= $listeDesCuisine[$j]["idTC"] ?>" method="post">
        <li class="tag"><span class="tag">#</span><?= $listeDesCuisine[$j]["libelleTC"] ?></li>

        <input value="confirmer" name="confirmer" type="submit">
        <br>
    </form>
<?php } ?>
<br/>
<hr>
