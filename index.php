<?php 
require_once('functions.php');
require_once('views/header.php');
$clientes = todos_los_clientes();
$series = todas_las_series();
$depositos = todos_los_depositos();
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
                Series en Juego
            </div>
            <div class="card-body text-secondary">
                <?php while ($serie = $series->fetch_assoc()):?>
                    <p>Serie ID: <?=$serie['id']?> | Cliente: <?=$serie['cliente']?></p>
                    <?php $cartones = cartones_de_la_serie($serie['id']);
                    $counter = 1;
                    while($carton = $cartones->fetch_assoc()):?>
                    <div class="mt-3 d-inline"><a class="btn btn-outline-secondary btn-sm" href="print.php?id=<?=$serie['id']?>&fecha=<?=$carton['fecha_juego']?>">Cartones Día <?=$counter?></a></div>
                    <?php $counter++; endwhile ?>
                    <hr>
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
                                <a class="dropdown-item small" data-toggle="modal" href="#" data-target="#nuevo_deposito" data-cliente="<?=$cliente['id']?>">Nuevo Depósito</a>
                                <form action="inc/series.php" method="post">
                                <input type="hidden" name="cliente_id" value="<?=$cliente['id']?>">
                                    <button type="submit" class="dropdown-item small" name="crear">Crear Serie</button>
                                </form>
                                <a class="dropdown-item small" data-toggle="modal" href="#" data-target="#editar_cliente" data-id="<?=$cliente['id']?>" data-nombre="<?=$cliente['nombre']?>">Editar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item small text-danger" data-toggle="modal" href="#" data-target="#eliminar_cliente" data-id="<?=$cliente['id']?>"><i class="far fa-trash-alt"></i> Eliminar</a>
                            </div>
                        </div>
                        <strong><?= $cliente['nombre'] ?></strong><br><span class="text-secondary small lead">ID: <?= $cliente['id']?> | Fecha de Registro: <?=date('d/m/y', strtotime($cliente['created_at']))?></span>
                    </div>
                    <hr>
                <?php endwhile ?>
            </div>
        </div>
        <?php endif ?>

        <?php if($depositos->num_rows > 0) : ?>
        <div class="card mt-5">
            <div class="card-header">
                Últimos Depósitos
            </div>
            <div class="card-body text-secondary">
                <?php while ($deposito = $depositos->fetch_assoc()):?>
                <strong>$ <?= $deposito['cantidad'] ?></strong> | <?=$deposito['nombre']?> | <?=date('d/m/Y H:m:s', strtotime($deposito['created_at']))?>
                <hr>
                <?php endwhile ?>
            </div>
        </div>
        <?php endif ?>
    </div>
</section>

<?php require_once('views/footer.php') ?>
<?php require_once('views/home/modals.php') ?>