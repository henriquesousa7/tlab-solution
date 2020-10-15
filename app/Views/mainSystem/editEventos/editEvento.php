<nav class="navbar navbar-dark bg-primary justify-content-between">
    <h4 class="navbar-brand">Eventos</h4>
    <div class="form-inline mr-sm-2">
        <p class="mr-2 mt-3 text-white">Usuario: <?php echo session()->get('usuario')?></p>
        <a href="/eventos/loginResponse" class="btn btn-danger mr-2">Menu principal</a>
        <a href="/eventos/logout" class="btn btn-danger">Sair</a>
    </div>
</nav>

<main>
    <div class="login-form">
        <form action="/eventos/editResponse" method="post">
            <h2 class="text-center">Editar evento</h2>       
            <div class="form-group">
                <textarea class="form-control" name="descricao" id="descricao" rows="2" required="required" placeholder="Descricao"><?php echo $evento['descricao'] ?></textarea>
            </div>
            <div class="form-group">
                <input type="time" class="form-control" required="required" id="h_inicio" name="h_inicio" value="<?php echo $evento['inicio'] ?>">
            </div>
            <div class="form-group">
                <input type="time" class="form-control" required="required" id="h_termino" name="h_termino" value="<?php echo $evento['termino'] ?>">
            </div>
            <input type="hidden" id="id_evento" name="id_evento" value="<?php echo $evento['id_evento'] ?>">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Editar</button>
            </div>    
        </form>
    </div>
</main>