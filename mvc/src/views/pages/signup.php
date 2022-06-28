<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Saída de Alunos</title>
</head>

<body>
    <section class="login-section">
        <!--for demo wrap-->
        <div class="login-area">
            <section class="login-modal-area" style="margin: 0; margin-bottom: 10px">
                <div class="login-modal">
                    <h2 class="login-form-header">Criar uma Conta</h2>
                    <div class="login-form-area">
                        <form class="login-form" method="POST" action="<?=$base;?>/cadastro">
                            <input type="text" name="name" placeholder="Nome Completo:">
                            <input type="text" name="surname" placeholder="Nome de Usuário (Apelido):">
                            <input type="text" name="email" placeholder="E-mail:">
                            <input type="text" name="matter" placeholder="Matéria:">
                            <input type="password" name="password" placeholder="Senha:"> 
                            
                            <div class="login-form-buttons">
                                <button class="login-button-submit" style="margin:10px;" type="submit">Cadastre-se</button>
                            </div>
                            <div class="create-account-link">
                                <p style="text-align:left;">Já possui uma conta? <a href="login">Faça Login!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
</body>
</html>
