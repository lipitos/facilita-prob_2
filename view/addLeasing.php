<?php 
$types = $type_model->list(); 
$books = $book_model->list();

?>

<form action="" method="post" >
    <div class="card" style="top:40px">
        <div class="card-header">
            <span class="card-title">Livro</span>
        </div>
        <div class="card-body">
        Livro:
        <select class="form-control" name="book">
            <option value="0">Selecione</option>
            <?php foreach ($books as $book): ?>
                <option value="<?php echo $book->getId(); ?>"><?php echo $book->getName(); ?></option>
            <?php endforeach; ?>
        </select>
        <br>Tipo de Reserva:
        <select class="form-control" name="type">
            <option value="0">Selecione</option>
            <?php foreach ($types as $type): ?>
                <option value="<?php echo $type->getId(); ?>"><?php echo $type->getType(); ?></option>
            <?php endforeach; ?>
        </select>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" type="submit">Cadastrar</button>
            <button class="btn btn-secondary" type="reset">Limpar</button>
            <a class="btn btn-danger" href="index.php">Cancelar</a>
        </div>
    </div>
</form>
