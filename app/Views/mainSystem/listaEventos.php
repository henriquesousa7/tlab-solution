<nav class="navbar navbar-dark bg-primary justify-content-between">
    <h4 class="navbar-brand">Eventos</h4>
    <div class="form-inline mr-sm-2">
        <p class="mr-2 mt-3 text-white">Usuario: <?php echo session()->get('usuario')?></p>
        <a href="/eventos/loginResponse" class="btn btn-danger mr-2">Menu principal</a>
        <a href="/eventos/logout" class="btn btn-danger">Sair</a>
    </div>
</nav>
<div class="search">
      	<input id="inputSearch" type="text" class="form-control" placeholder="Procurar">
</div>
<ul class="list-group">
    <?php if(!empty($eventos)): ?>
        <li class="list-group-item d-flex justify-content-between">
            <p><strong>Descricao</strong></p>
            <p><strong>Horario inicio</strong></p>
            <p><strong>Horario termino</strong></p>
            <p><strong>Acao</strong></p>
        </li>
        <?php foreach ($eventos as $evento): ?>
            <li class="list-group-item d-flex justify-content-between">
                <p><?php echo $evento['descricao'] ?></p>
                <p><?php echo $evento['inicio'] ?></p>
                <p><?php echo $evento['termino'] ?></p>
                <span>
                    <a href="/eventos/editarEvento/<?php echo $evento['id_evento'] ?>" class="btn btn-info btn-sm">
                        Alterar
                    </a>
                    <a href="/eventos/excluirEvento/<?php echo $evento['id_evento'] ?>" class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </span>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li class="list-group-item d-flex justify-content-between">
            <span>Nenhum evento encontrado</span>
        </li>
    <?php endif; ?>
</ul>
<script>
    function remover(){

    }

    $()
</script>