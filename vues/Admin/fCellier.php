<?php
$oVino = new Vino();
$aCelliers = $oVino->lireTypesCellier();
?>

<tr>
    <td>id_cellier</td>
    <td class="non-modifiable"><?php echo (isset($body) && isset($body->id_cellier)) ? $body->id_cellier : "** valeur auto-générée **"; ?></td>
</tr>
<tr>
    <td>id_usager</td>
    <?php if (isset($body) && isset($body->id_usager)) { ?>
        <td class="non-modifiable"><?= $body->id_usager ?></td>
    <?php } else { ?>
        <td contenteditable="true"></td>
    <?php } ?>
</tr>
<tr>
    <td>nom_cellier</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->nom_cellier)) echo $body->nom_cellier; ?></td>
</tr>
<tr>
    <td>description_cellier</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->description_cellier)) echo $body->description_cellier; ?></td>
</tr>
<tr>
    <td>type_cellier</td>
    <td contenteditable="true">
        <select name="type_cellier_id" id="type_cellier_id">
            <option value="-1">Choisir un type de cellier</option>

            <?php
            $type_cellier_id = (isset($body) && isset($body->type_cellier_id)) ? $body->type_cellier_id : "";

            foreach ($aCelliers as $unCellier) {
            ?>
                <option value="<?= $unCellier['id_type_cellier']; ?>" <?php if ($type_cellier_id == $unCellier['id_type_cellier']) {
                                                                            echo ' selected="selected"';
                                                                        } ?>>
                    <?= $unCellier['nom_type_cellier'] ?> </option>
            <?php
            }
            ?>
        </select>
    </td>
</tr>