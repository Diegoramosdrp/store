<?php

// include database and object files
include_once '../config/database.php';
include_once '../model/product.php';
include_once '../model/category.php';
 
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
$category = new Category($db);
 
// query products
$stmt = $product->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// set page header
$page_title = "Produtos";
include_once "../lib/template/layout_header.php";
?>

<?php 

// display the products if there are any
if($num>0):  
?>
 
    <table class='table table-hover table-responsive table-bordered'>";
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
            extract($row);
        ?>
        <tr>
            <td><?php echo $name ?></td>
            <td><?php echo $price ?></td>
            <td><?php echo $description ?></td>
            <td><?php
                    $category->id = $category_id;
                    $category->readName();
                    echo $category->name;
                    ?>
            </td>
            <td>
                <!-- read product button -->
                <a href='read_one.php?id=<?php $id ?>' class='btn btn-primary left-margin'>
                    <span class='glyphicon glyphicon-list'></span> Ver
                </a>
 
                <!-- edit product button -->
                <a href='update_product.php?id=<?php $id ?>' class='btn btn-info left-margin'>
                    <span class='glyphicon glyphicon-edit'></span> Editar
                </a>
 
                <!-- delete product button -->
                <a delete-id='<?php $id ?>' class='btn btn-danger delete-object'>";
                    <span class='glyphicon glyphicon-remove'></span> Excluir
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
 
    </table>
    <!-- paging buttons will be here -->

 
<!-- tell the user there are no products -->
<?php else: ?>
    <div class='alert alert-info'>Sem registros</div>
    
<?php endif; ?>
    
<?php
// set page footer
include_once "../lib/template/layout_footer.php";
?>