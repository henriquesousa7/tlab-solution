<div class="login-form">
    <form action="/eventos/registerResponse" method="post">
        <h2 class="text-center">Registre-se</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" required="required" name="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Senha" required="required" name="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </div>    
        <div class="clearfix">
            <p class="text-center"><a href="/eventos">Voltar ao login</a></p>
        </div>
    </form>
</div>