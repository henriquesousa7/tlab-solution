<div class="login-form">
    <form action="/eventos/registerResponse" method="post" onsubmit="return validarSenha()">
        <h2 class="text-center">Registre-se</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" required="required" name="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Senha" required="required" name="password" id="password">
        </div>
        <div class="form-group" id="password_message">
            <input type="password" class="form-control" placeholder="Repetir senha" required="required" name="password2" id="password2">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" id="submitButton">Registrar</button>
        </div>    
        <div class="clearfix">
            <p class="text-center"><a href="/eventos">Voltar ao login</a></p>
        </div>
    </form>
</div>

<script>

    function validarSenha(){
        var senha1 = $('#password');
        var senha2 = $('#password2');

        if(senha1.val() !== senha2.val()){

            event.preventDefault();

            if(!$("#password-error").length){
                let divPassword = $('#password_message')
                let p = $('<p>', {class: "text-center text-danger", text: "Senhas Diferentes", id: "password-error"})
                divPassword.append(p);
            }
            senha1.val("")
            senha2.val("")
        }
    }

    $('#submitButton').click(function(){
        validarSenha(event);
    })

</script>