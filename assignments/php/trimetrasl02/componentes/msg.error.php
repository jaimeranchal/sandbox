<div class="row vh-100 justify-content-center align-items-center text-center">
    <div class="col-6">
    <h2 class="display-4">Ouch...</h2>
    <?php if (isset($mensajeError)): ?>
        <p class="lead text-danger"><?=$mensajeError?></p>
    <?php endif; ?>
        <p class="lead">Revisa los datos y vuelve a intentarlo</p>
        <a class="btn btn-lg btn-secondary m-2" href="./<?=$link?>">
            <span class="fas fa-undo-alt"></span>
            Reintentar
        </a>
    </div>
</div>
