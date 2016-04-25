<div class="headershop">
    <p>Goodies divers et variés</p>
    <form action="index.php"><input type="hidden" name="page" value="shop" /><input type="text" placeholder="Rechercher un article ..." name="search_name"/><button type="submit">Rechercher</button></form>
    <form action="index.php">
        <input type="hidden" name="page" value="shop" />
        <select type="text" name="search_type">
            <?php
                require_once("model/m_shop.php");
                foreach(getListType() as $type){
                    echo "<option>".$type."</option>";
                }
            ?>
        </select>
        <button type="submit">Rechercher</button>
    </form>
    <?php
        if($return){
            echo "<a href='index.php?page=shop'>Retourner à la Boutique</a>";
        }
    ?>
    <a>Accéder à mon panier</a>
</div>

<?php
    function afficheProduit($produit){ ?>
        <div class="produit">
            <img class="p_product" src="<?php echo $produit -> getPicture(); ?>" />
            <p class="t_product">
                <?php echo $produit -> getNom(); ?> - <?php echo $produit -> getPrix(); ?>€ - Stock restant : <?php echo $produit -> getStock(); ?>
            </p>
            <p class="d_product"><?php echo substr($produit -> getDescription(), 0, 200) ?></p>
            <div class="btn_product">
                <input type="number" name="nb<?php echo $produit -> getNom(); ?>" value="1">
                <p class="btn btn-default <?php echo $produit -> getNom(); ?>">Ajouter au panier</p>
            </div>
        </div>

    <?php } ?>