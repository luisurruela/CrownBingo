<?php 
require_once('functions.php');
require_once('views/header.php');
$clientes = todos_los_clientes();
$series = todas_las_series();
?>

<section id="main" class="container pt-5 pb-5">

    <div class="col-lg-9 m-auto">

        <?php if(isset($_SESSION['confirmation'])) : ?> <!-- Confirmación -->
        <div class="alert alert-<?=$_SESSION['confirmation']['status'] == 'success' ? 'success': 'danger'; ?> alert-dismissible fade show" role="alert">
            <strong>Excelente!</strong> <?=$_SESSION['confirmation']['msg']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['confirmation']); endif ?> <!-- /Confirmación -->

        <?php if($series->num_rows > 0) : ?>
        <div class="card">
            <div class="card-header">
                Series
            </div>
            <div class="card-body">
                <?php while ($serie = $series->fetch_assoc()):?>
                    <a href="print.php?id=<?=$serie['id']?>"><?=$serie['id']?></a><br>
                <?php endwhile ?>
            </div>
        </div>
        <?php endif ?>

        <?php if($clientes->num_rows > 0) : ?>
        <div class="card mt-5">
            <div class="card-header">
                Clientes
            </div>
            <div class="card-body text-secondary">
                <?php while ($cliente = $clientes->fetch_assoc()):?>
                    <div class="clearfix">
                        <div class="dropdown float-right">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" type="button" href="">Agregar Depósito</a>
                                <a class="dropdown-item" type="button" href="">Agregar Serie</a>
                                <a class="dropdown-item" type="button" href="">Editar</a>
                            </div>
                        </div>
                        <?= $cliente['nombre'] ?>
                    </div>
                    <hr>
                <?php endwhile ?>
            </div>
            <?php endif ?>
        </div>
    </div>
</section>

<?php require_once('views/footer.php') ?>
<?php require_once('views/home/modals.php') ?>