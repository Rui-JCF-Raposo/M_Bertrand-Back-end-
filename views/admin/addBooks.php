<!DOCTYPE html>
<html lang="pt">
    
    <?php require("templates/mainHeader.php"); ?>

<body class="admin-zone">
    
    <?php require("templates/adminMainNav.php"); ?> 
    <?php require("templates/adminCategoriesNav.php"); ?>
    
    <main>
        
        <div class="add-book-container">
            <h1>Adicione um livro</h1>
            <form method="POST" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nome do livro</label>
                    <input type="text" id="name" name="name" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label for="author">Autor</label>
                    <input type="text" id="author" name="author" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label for="author">Categoria</label>
                    <select name="" id="" id="author" name="author" class="form-control" required>
                        <?php foreach($categories as $category) { ?>
                            <option value="<?=$category["category_name"]?>"><?=$category["category_name"]?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3">
                    <div class="form-group price">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" class="form-control" min="1" max="10000" required/>
                    </div>
                    <div class="form-group stock">
                        <label for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control" min="1" max="1000000" required/>
                    </div>
                    <div class="form-group">
                        <label for="cover">Capa do livro</label>
                        <input type="file" id="cover" name="cover" class="form-file" accept="image/*" required>
                    </div>
                </div>
                <button type="submit" name="send">Adicionar</button>
            </form>
        </div>

        <div class="add-category-container">
            <h1>Adicione uma categoria</h1>
            <form method="POST" action="#">
                <div class="form-group">
                    <label for="newCategory">Nome da Categoria</label>
                    <input type="text" id="newCategory" name="newCategory" class="form-control" required/>
                </div>
                <button type="submit" name="send">Adicionar</button>
            </form>
        </div>

    
    </main>



</body>
</html>