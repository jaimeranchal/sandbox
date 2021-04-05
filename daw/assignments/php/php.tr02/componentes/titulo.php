<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto border-bottom text-center">
<h2 class="display-4"><?=$title?></h2>
    <?php if (isset($subtitle)): ?>
    <p class="lead"><i><?=$subtitle?></i></p>
    <?php endif; ?>
    <!-- mensajes -->
    <?php if (isset($mensajeError)): ?>
    <hr class="my-4">
    <div class="alert alert-warning" role="alert">
        <?=$mensajeError?>
    </div>
    <?php endif; ?>

    <!-- Mensajes de información -->
    <?php if (isset($mensaje)): ?>
        <div class="alert alert-info" role="alert">
            <?=$mensaje?>
        </div>
    <?php endif; ?>

    <!-- página jugar -->
    <?php if (isset($retos)): ?>
        <div class="alert alert-warning" role="alert">
        <?php if (count($retos) == 1): ?>
        Tienes un desafío
        <?php else: ?>
        Tienes <?=count($retos)?> desafíos
        <?php endif; ?>
        </div>
    <?php endif; ?>

</div>
