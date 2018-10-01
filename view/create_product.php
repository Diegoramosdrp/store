<?php

// set page headers
$page_title = "Adicionar Produto";
include_once "../lib/template/layout_header.php";

// include database and object files
include_once '../config/database.php';
include_once '../model/product.php';
include_once '../model/category.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$product = new Product($db);
$category = new Category($db);
?>


<?php 
// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
 
    // set product property values
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->description = $_POST['description'];
    $product->category_id = $_POST['category_id'];
}
?>
<!-- create the product-->
<?php if($product->create()): ?>
<div class='alert alert-success'>Produto adicionado com sucesso</div>

<!--if unable to create the product, tell the user-->
<?php else: ?>
<div class='alert alert-danger'>Produto não adicionado</div>
<?php endif; ?>
 
<!-- HTML form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Nome</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Preço</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Descrição</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>
 
        <tr>
            <td>Categoria</td>
            <td>
                <?php
                // read the product categories from the database
                $stmt = $category->read();
                ?>
                <!-- put them in a select drop-down -->
                <select class='form-control' name='category_id'>
                    <option>Escolha categoria...</option>

                    <?php
                    while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)):
                        extract($row_category);
                    ?>
                    <option value='<?php echo $id; ?>'>
                        <?php echo $name; ?>
                    </option>
                    <?php endwhile;?>
                </select>
            </td>
        </tr>
 
        <tr>
            <td></td>
            <td class="right">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </td>
        </tr>
    </table>
</form>

<?php

// footer
include_once "../lib/template/layout_footer.php";