<nav class="navbar navbar-dark bg-primary justify-content-between">
    <h4 class="navbar-brand">Eventos</h4>
    <div class="form-inline mr-sm-2">
        <p class="mr-2 mt-3 text-white">Usuario: <?php echo session()->get('usuario')?></p>
        <a href="/eventos/loginResponse" class="btn btn-danger mr-2">Menu principal</a>
        <a href="/eventos/logout" class="btn btn-danger">Sair</a>
    </div>
</nav>
<div class="login-form">
    <a class="btn btn-primary btn-block" href="/eventos/listarEventos">Listar eventos</a>
    <a class="btn btn-primary btn-block" href="/eventos/addEvento">Adicionar evento</a>
</div>