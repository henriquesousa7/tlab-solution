<div class="login-form">
    <form action="/eventos/loginResponse" method="post">
        <h2 class="text-center">Login</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username" id='username'>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Senha" required="required" name="password" id='password'>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
        <div class="clearfix">
            <p class="text-center"><a href="/eventos/register">Registrar conta</a></p>
        </div>        
    </form>
</div>