<?php


$nom = $_GET['Nom_produit'];
$prix = $_GET['Prix'];
$description = $_GET['Description'];
$menu = $_GET['MenuJour'];
$typePlat = $_GET['Type_plat'];
$img = str_replace("./view", "..", $_GET['Img']);
$id = $_GET['Id_Produit'];
$checked = "";

?>



<div class="formAjout">
    <input type="text" id="id" value="<?php echo $id; ?>" style="display: none;"><br><br>
    <div class="form-group">
        <label for="nomProduit">Nom du produit :</label>
        <input type="text" id="nomProduit" name="nomProduit" value="<?php echo $nom; ?>" required><br><br>
    </div>

    <div class="form-group">
        <label for="description">Description :</label>
        <textarea id="description" name="description" required><?php echo $description; ?></textarea><br><br>
    </div>
    <div class="form-group">
        <label for="prix">Prix :</label>
        <input type="number" id="prix" value="<?php echo $prix; ?>" name="prix" required><br><br>
    </div>
    <div class="form-group">
        <label for="imageUrl">Image URL :</label>
        <input type="text" id="imageUrl" value="<?php echo $img; ?>" name="imageUrl" required><br><br>
    </div>
    <div class="form-group">
        <label for="menuJour">Menu du jour :</label>
        <input type="checkbox" id="menu_Jour" onchange="menu(this)" name="menuJour" <?php echo ($menu == 1) ? "checked" : "" ?>><br><br>
    </div>
    <div class="form-group">
        <label for="typePlat">Type de plat :</label>
        <select id="typePlat" name="typePlat" required>
            <option value="<?php echo $typePlat; ?>"><?php echo $typePlat; ?></option>
            <option value="entree">Entrée</option>
            <option value="plat">Plat principal</option>
            <option value="dessert">Dessert</option>
            <option value="boisson">Boisson</option>
        </select>
    </div>

    <input type="button" onclick="modifier_Produit()" value="Soumettre" name="enrg" id="modifP">
</div>




<!-- end container -->
<!-- end pricing-main -->