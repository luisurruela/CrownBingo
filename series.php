<?php 
require_once('functions.php');
require_once('views/header.php');
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
                Historial de Series
            </div>
            <div class="card-body">
                <table class="table table-light">
                    <thead>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">ID Serie</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Acciones</th>
                    </thead>
                    <tbody>
                        <?php while ($serie = $series->fetch_assoc()):?>
                        <tr>
                            <td class="text-center align-middle"><?=$serie['cliente']?></td>
                            <td class="text-center align-middle"><?=$serie['id']?></td>
                            <td class="text-center align-middle"><?=date('d/m/Y', strtotime($serie['created_at']))?></td>
                            <td class="text-center">
                            <?php $cartones = cartones_de_la_serie($serie['id']);
                            $counter = 1;
                            while($carton = $cartones->fetch_assoc()):?>
                            <div class="mt-3 d-inline"><a class="btn btn-outline-secondary btn-sm" href="print.php?id=<?=$serie['id']?>&fecha=<?=$carton['fecha_juego']?>"><i class="fas fa-file-download"></i> Día <?=$counter?></a></div>
                            <?php $counter++; endwhile ?>
                            </td>
                            <td align="center"><a class="btn btn-danger btn-sm text-white"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif ?>

    </div>
</section>

<?php require_once('views/footer.php') ?>
<?php require_once('views/home/modals.php') ?>