<?php
require_once 'src/Service/Rele.php';
require_once 'src/Service/Chave.php';
require_once 'src/Service/Disjuntor.php';
require_once 'src/Service/Contator.php';
?>
<form action="/calculate" method="post">
    <p>CV ou HP : <input type="text" name="cv" value="<?php echo $_POST["cv"] ?? ''; ?>" /></p>
    <p>Tensão : <input type="text" name="tensao" value="<?php echo $_POST["tensao"] ?? ''; ?>" /></p>
    <p>Sistema :
        <select name="sistema">
            <option value="1" <?php echo !empty($_POST["sistema"]) && $_POST["sistema"] == 1 ? 'selected': '' ?>>Monofásico</option>
            <option value="2" <?php echo !empty($_POST["sistema"]) && $_POST["sistema"] == 2 ? 'selected': '' ?>>Bifásico</option>
            <option value="3" <?php echo !empty($_POST["sistema"]) && $_POST["sistema"] == 3 ? 'selected': '' ?>>Trifásico</option>
        </select>
    <p><input type="radio" <?php echo !empty($_POST['type']) && $_POST['type'] == 'Rele' ? 'checked="checked"': '' ?> value="Rele" name="type" id="rele"/><label for="rele">Rele</label></p>
    <p><input type="radio" <?php echo !empty($_POST['type']) && $_POST['type'] == 'Chave' ? 'checked="checked"': '' ?> value="Chave" name="type" id="chave"/><label for="chave">Chave</label></p>
    <p><input type="radio" <?php echo !empty($_POST['type']) && $_POST['type'] == 'Disjuntor' ? 'checked="checked"': '' ?> value="Disjuntor" name="type" id="disjuntor"/><label for="disjuntor">Disjuntor</label></p>
    <p><input type="radio" <?php echo !empty($_POST['type']) && $_POST['type'] == 'Contator' ? 'checked="checked"': '' ?> value="Contator" name="type" id="contator"/><label for="contator">Contator</label></p>
    <input type="submit" value="Calcular">
</form>
<?php

if (empty($_POST['type']) || !in_array($_POST['type'], ['Rele', 'Chave', 'Disjuntor', 'Contator'])) {
    return;
}

$calculator = new $_POST['type']($_POST['cv'], $_POST['tensao'], $_POST['sistema']);
$result = $calculator->getResult();
if (count($result)) {
    ?><table border="1">
        <tr><td>Tipo</td><td>Opções</td></tr>
        <?php
        foreach ($result as $type => $options) {
            if (empty($options)) {
                continue;
            }
            ?><tr>
                <td><?php echo $type; ?></td>
                <td><?php
                    echo implode('<br />', $options);
                    ?></td>
            </tr><?
        }
    ?>
    </table>
    <?php
} else {
    echo 'Sem opções';
}