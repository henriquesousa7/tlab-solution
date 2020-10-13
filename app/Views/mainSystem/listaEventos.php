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
<?php if(!empty($eventos)): ?>
    <table class="table table-borderless text-center ">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Horario inicio</th>
                <th>Horario termino</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventos as $evento): ?>
                <tr>
                    <td><?php echo $evento['descricao'] ?></td>
                    <td><?php echo $evento['inicio'] ?></td>
                    <td><?php echo $evento['termino'] ?></td>
                    <td>
                        <a href="/eventos/editarEvento/<?php echo $evento['id_evento'] ?>" class="btn btn-info btn-sm">
                             Alterar
                        </a>
                        <a href="/eventos/excluirEvento/<?php echo $evento['id_evento'] ?>" class="btn btn-danger btn-sm">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="text-center"><strong>Nenhum evento encontrado</strong><p>
<?php endif; ?>

<script>
    function search_table(value){
        $('tbody tr').each(function(){
            var found = 'false';
            $(this).each(function(){
                if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
                    found = 'true';                    
                }
            })
            if(found == 'true'){
                $(this).show()
            }else{
                $(this).hide()
            }
        })
    }

    $('#inputSearch').keyup(function(){
        search_table($(this).val());
    })
</script>