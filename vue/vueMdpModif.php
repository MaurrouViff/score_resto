
<h1>Modifier mon compte</h1>

Mon adresse électronique : <?= $util["mailU"] ?> <br />
Mon pseudo : <?= $util["pseudoU"] ?> <br />

Voici les caractères autorisés :
<ul>
    <li>A-Z</li>
    <li>a-z</li>
    <li>0-9 </li>
</ul>

<hr>
<form action="./?action=updProfil" method="POST">
    Nouveau pseudo : <br />
    <input type="text" pattern="[a-zA-Z0-9]+" name="pseudoU" placeholder="Écrivez votre nouveau nom d'utilisateur"> <br>
    <input type="submit">
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
    <input type="submit">
</form>
<br>
<hr>
Restaurant aimés :
<form action="./?action=updProfil" method="POST">
    Liste des restaurants aimés : <br />
    <?php for($i=0;$i<count($mesRestosAimes);$i++){ ?>
        <input type="checkbox">
        <a href="./?action=detail&idR=<?= $mesRestosAimes[$i]["idR"] ?>"><?= $mesRestosAimes[$i]["nomR"] ?></a><br />
    <?php } ?>
    <input type="submit" name="button_supprimer_restaurant">
</form>
<br>
<hr>
Les types de cuisines aimés :
<form action="./?action=updProfil" method="POST">
    Liste des restaurants aimés : <br />
    <?php for($i=0;$i<count($mesTypeCuisineAimes);$i++){ ?>
        <input type="checkbox">
        <li class="tag"><span class="tag">#</span><?= $mesTypeCuisineAimes[$i]["libelleTC"] ?></li><br />
    <?php } ?>
    <input type="submit" name="button_supprimer_restaurant">
</form>
<br>
<hr>