<?php
$oVino = new Vino();
$aCelliers = $oVino->lireTypesCellier();
?>

<div class="col-md-12 groupe-action">
    <div class="btn-confirmer" title="Confirmer" data-js-btn-confirmer>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
        </svg>
    </div>

    <div class="btn-annuler" title="Annuler" data-js-btn-annuler>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path d="M376.6 427.5c11.31 13.58 9.484 33.75-4.094 45.06c-5.984 4.984-13.25 7.422-20.47 7.422c-9.172 0-18.27-3.922-24.59-11.52L192 305.1l-135.4 162.5c-6.328 7.594-15.42 11.52-24.59 11.52c-7.219 0-14.48-2.438-20.47-7.422c-13.58-11.31-15.41-31.48-4.094-45.06l142.9-171.5L7.422 84.5C-3.891 70.92-2.063 50.75 11.52 39.44c13.56-11.34 33.73-9.516 45.06 4.094L192 206l135.4-162.5c11.3-13.58 31.48-15.42 45.06-4.094c13.58 11.31 15.41 31.48 4.094 45.06l-142.9 171.5L376.6 427.5z" />
        </svg>
    </div>
</div>

<div class="col-md-12 groupe-modifier hide">
    <div class="btn-modifier" title="Modifier" data-js-btn-modifier>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z" />
        </svg>
    </div>
</div>

<div>
    <table>
        <thead>
            <tr>
                <th><span>Nom du champ</span></th>
                <th><span>Valeur</span></th>
            </tr>
        </thead>
        <tbody id="detail-body">
            <tr>
                <td>Id cellier</td>
                <td class="non-modifiable"><?php echo (isset($body) && isset($body->id_cellier)) ? $body->id_cellier : "** valeur auto-générée **"; ?></td>
            </tr>
            <tr>
                <td>Id usager</td>
                <?php if (isset($body) && isset($body->id_usager)) { ?>
                    <td class="non-modifiable"><?= $body->id_usager ?></td>
                <?php } else { ?>
                    <td contenteditable="true"></td>
                <?php } ?>
            </tr>
            <tr>
                <td>Nom du cellier</td>
                <td contenteditable="true"><?php if (isset($body) && isset($body->nom_cellier)) echo $body->nom_cellier; ?></td>
            </tr>
            <tr>
                <td>Description du cellier</td>
                <td contenteditable="true"><?php if (isset($body) && isset($body->description_cellier)) echo $body->description_cellier; ?></td>
            </tr>
            <tr>
                <td>Type de cellier</td>
                <td>
                    <select name="type_cellier_id" id="type_cellier_id">
                        <option value="-1">Aucun type de cellier</option>

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
        </tbody>
    </table>
</div>