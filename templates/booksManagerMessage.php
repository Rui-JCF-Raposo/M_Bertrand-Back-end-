<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Livros</title>
    <link rel="stylesheet" href="../css/main.css">    
    <link rel="stylesheet" href="../css/checkOut.css">    
</head>
<body id="success-order">
    <div class="message">
        <div class="brand-col-10">
            <div class="brand">
                <img src="../logo/book.svg" alt="logo">
                <div class="brand-name">
                    <h1>MYPROJECT</h1>
                    <h1><span>Livreiros</span></h1>
                </div>
            </div>
        </div>
        <div>
        <?php if (isset($created_category) && $created_category === true) { ?>
            <h2>Criada com sucesso</h2>
        <?php  } else if (isset($created_category) && $created_category === false) {?>
            <h2>Erro ao criar categoria</h2>
        <?php ?>
        <?php } if(isset($repetition) && $repetition === true) { ?>
            <h2>Categoria já existente</h2>
        <?php } ?>
        <?php if((isset($book_created) && $book_created === true)) { ?>
            <h2>Livro criado com sucesso</h2>
        <?php } else if((isset($book_created) && $book_created === false)) { ?>
            <h2>Erro ao criar livro</h2>
        <?php } ?>
        <?php if(isset($book_repetition) && $book_repetition === true) { ?>
            <h2>O ISBN do Livro já existe</h2>
        <?php } ?>
        <?php if(isset($book_removed) && $book_removed === true) { ?>
            <h2>Livro removido com sucesso</h2>
        <?php } else if(isset($book_removed) && $book_removed === false) { ?>
            <h2>Erro ao remover livro</h2>
        <?php } ?>
        <?php if(isset($category_removed) && $category_removed === true) { ?>
            <h2>Categoria removida com sucesso</h2>
        <?php } else if(isset($category_removed) && $category_removed === false) { ?>
            <h2>Erro ao remover categoria</h2>
        <?php } ?>
        <?php if(isset($category_contains_books) && $category_contains_books) { ?>
            <h2>Erro, a categoria contém livros</h2>
        <?php } ?>
        </div>
        <div>
            <a href="<?=BASE_PATH."admin/booksManaging"?>">
                <button>Voltar para administração</button>
            </a>
        </div>
    </div>
</body>
</html>