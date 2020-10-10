<nav class="navbar navbar-dark bg-primary justify-content-between">
    <h4 class="navbar-brand">Eventos</h4>
    <div class="form-inline mr-sm-2">
        <p class="mr-2 mt-3 text-white">Usuario: <?php echo session()->get('usuario')?></p>
        <a href="/eventos/loginResponse" class="btn btn-danger mr-2">Menu principal</a>
        <a href="/eventos/logout" class="btn btn-danger">Sair</a>
    </div>
</nav>
<div class="login-form">
    <form action="/eventos/eventoResponse" method="post">
        <h2 class="text-center">Adicionar evento</h2>       
        <div class="form-group">
            <textarea class="form-control" name="descricao" id="descricao" rows="2" required="required" placeholder="Descricao"></textarea>
        </div>
        <div class="form-group">
            <input type="time" class="form-control" required="required" id="h_inicio" name="h_inicio">
        </div>
        <div class="form-group">
            <input type="time" class="form-control" required="required" id="h_termino" name="h_termino">
        </div>
        <input type="hidden" id="id_criador" name="id_criador" value="<?php echo $usuario['id_usuario'] ?>">
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
        </div>    
    </form>
</div>