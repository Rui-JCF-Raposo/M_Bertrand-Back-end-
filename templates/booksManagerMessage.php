<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Livros</title>
    <link rel="stylesheet" href="../../css/main.css">    
    <link rel="stylesheet" href="../../css/checkOut.css">    
</head>
<body id="success-order">
    <div class="message">
        <div class="brand-col-10">
            <div class="brand">
                <img src="../../logo/book.svg" alt="logo">
                <div class="brand-name">
                    <h1>MYPROJECT</h1>
                    <h1><span>Livreiros</span></h1>
                </div>
            </div>
        </div>
        <div>
        <?php if((isset($created_category) && $created_category) || isset($book_created) && $book_created) { ?>
            <h1>Criad<?=isset($created_category) ? "a":"o"?> com sucesso</h1>
        <?php } else { ?>
            <h1>Erro ao criar <?=isset($created_category) ? "categoria":"livro"?></h1>
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