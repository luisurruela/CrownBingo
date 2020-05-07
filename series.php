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
                            <td class="text-center"><a href="print.php?id=<?=$serie['id']?>"><?=$serie['cliente']?></a></td>
                            <td class="text-center"><?=$serie['id']?></td>
                            <td class="text-center"><?=date('d/m/Y H:m:s', strtotime($serie['created_at']))?></td>
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