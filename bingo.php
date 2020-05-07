<?php 
require_once('functions.php');
require_once('views/header.php');
$cartones = todos_los_cartones_del_dia();
$numeros = todos_los_numeros_del_bingo_del_dia();
?>

<section id="main" class="container pt-5 pb-5">

    <div class="col-lg-9 m-auto">
        <?php if(isset($_SESSION['confirmation'])) : ?> <!-- Confirmación -->
        <div class="alert alert-<?=$_SESSION['confirmation']['status'] == 'success' || $_SESSION['confirmation']['status'] == 'win' ? 'success': 'danger'; ?> alert-dismissible fade show" role="alert">
            <?=$_SESSION['confirmation']['msg']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['confirmation']); endif ?> <!-- /Confirmación -->
        <div class="card mt-5">
            <div class="card-header">
                Bingo del día (<?=date('d-m-Y')?>)
            </div>
            <div class="card-body text-secondary">
                <form action="inc/bingo.php" method="post">
                    <div class="form-group">
                        <input id="numero" class="form-control form-control-lg" type="number" name="numero" min="1" max="99">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="guardar_numero">Guardar número</button>
                    </div>
                </form>
                <p class="pt-4 pb-4">Cartones en juego: <?= $cartones->num_rows ?></p>
                
                <?php if((count($numeros) > 0) && !empty($numeros[0])) : ?>
                    <h3>Números: <?=count($numeros)?></h3>
                    <div class="row p-3">
                        <?php foreach($numeros as $numero): ?>  
                        <div class="col-1 p-2 bg-warning m-1 text-center text-dark"><?= $numero ?></div>
                        <?php endforeach ?>
                    </div>
                    <hr>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>

<?php require_once('views/footer.php') ?>
<?php require_once('views/home/modals.php') ?>