<?php 
$leasings = $leasing_model->list(); 
?>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Livro</th>
        <th>Tipo de Empréstimo</th>
        <th>Data de Devolução</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($leasings as $leasing): ?>
    <tr>
        <td><?php echo $leasing->getId(); ?></td>
        <td><?php echo convertBook($leasing->getId_Book()); ?></td>
        <td><?php echo convertType($leasing->getId_Type()); ?></td>
        <td><?php echo date_form($leasing->getDate()); ?></td>
        <td>        
            <div class="btn-group" role="group" aria-label="First group">
            <a href="view/verify.php?id=<?php echo $leasing->getId();  ?>" class="btn btn-success btn-sm" title="Verificar">
                <i class="fas fa-search"></i>
            </a>
            <a href="view/remove.php?id=<?php echo $leasing->getId();  ?>" class="btn btn-danger btn-sm" title="Excluir">
                <i class="fa fa-trash-alt"></i>
            </a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
