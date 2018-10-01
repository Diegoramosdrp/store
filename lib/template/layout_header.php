<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title><?php echo $page_title; ?></title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  
    <!-- our custom CSS -->
    <link rel="stylesheet" href="lib/css/custom.css" />
  
</head>
<body>
 
    <!-- container -->
    <div class="container">
        <div class='right-button-margin'>
            <a href='products.php' class='btn btn-default pull-right'>Ver Produtos</a>
        </div>
        <div class='right-button-margin'>
            <a href='create_product.php' class='btn btn-default pull-right'>Criar Produto</a>
        </div>
        <!--// show page header -->
         <div class='page-header'>
            <h1><?php echo $page_title; ?></h1>
         </div>
    </div>