<?php
$oVino = new Usager();
$aUsagers = $oVino->lireTypesUsager();
?>

<tr>
    <td>id</td>
    <td class="non-modifiable"><?php echo (isset($body) && isset($body->id)) ? $body->id : "** valeur auto-générée **"; ?></td>
</tr>
<tr>
    <td>nom</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->nom)) echo $body->nom; ?></td>
</tr>
<tr>
    <td>adresse</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->adresse)) echo $body->adresse; ?></td>
</tr>
<tr>
    <td>telephone</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->telephone)) echo $body->telephone; ?></td>
</tr>
<tr>
    <td>courriel</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->courriel)) echo $body->courriel; ?></td>
</tr>
<tr>
    <td>date_naissance</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->date_naissance)) echo $body->date_naissance; ?></td>
</tr>
<tr>
    <td>ville</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->ville)) echo $body->ville; ?></td>
</tr>
<tr>
    <td>nom_utilisateur</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->nom_utilisateur)) echo $body->nom_utilisateur; ?></td>
</tr>
<tr>
    <td>type_utilisateur</td>
    <td contenteditable="true">
        <select name="type_utilisateur" id="type_utilisateur">
            <option value="-1">Choisir le type d'utilisateur</option>

            <?php
            $type_utilisateur = (isset($body) && isset($body->type_utilisateur)) ? $body->type_utilisateur : "";

            foreach ($aUsagers as $unUsager) {
            ?>
                <option value="<?= $unUsager['id']; ?>" <?php if ($type_utilisateur == $unUsager['id']) {
                                                            echo ' selected="selected"';
                                                        } ?>>
                    <?= $unUsager['nom'] ?> </option>
            <?php
            }
            ?>
        </select>
    </td>
</tr>
<tr>
    <td>date_creation</td>
    <td class="non-modifiable"><?php echo (isset($body) && isset($body->date_creation)) ? $body->date_creation : "** valeur auto-générée **"; ?></td>
</tr>
<tr>
    <td>date_modification</td>
    <td class="non-modifiable"><?php echo (isset($body) && isset($body->date_modification)) ? $body->date_modification : "** valeur auto-générée **"; ?></td>
</tr>
<tr>
    <td>dernier_access</td>
    <td class="non-modifiable"><?php echo (isset($body) && isset($body->dernier_access)) ? $body->dernier_access : "** valeur auto-générée **"; ?></td>
</tr>