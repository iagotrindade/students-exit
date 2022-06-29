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
                    <h2 class="login-form-header">Recupere sua senha</h2>
                    <p class="recover-form-paragraph">
                        <?php if (!empty($warningSuccess)) {
                            echo ($warningSuccess);
                        }
                        else {
                            echo ('Digite seu e-mail e enviaremos uma mensagem de recuperação para você!');
                        }
                        ?>
                    </p>

                    <div class="login-form-area">
                        <form class="login-form" method="POST" action="<?=$base;?>/recover">
                            <?php if(!empty($_SESSION['flash'])): ?>
                               <div class="warning">
                                   <p><?php echo ($_SESSION['flash'])?></p>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($_SESSION['flashSuccess'])): ?>
                               <div class="login-warning-success">
                                   <p><?php echo ($_SESSION['flashSuccess'].' '. $user->name)?></p>
                                </div>
                            <?php endif; ?>
                            <input type="email" name="email" placeholder="E-mail:">
        
                            <div class="login-form-buttons">
                                <button class="login-button-submit" style="margin:10px;" type="submit">Enviar</button>
                            </div>

                            <div class="recover-password-link">
                                <p>Lembrou sua senha? <a href="login">Faça Login!</a></p>
                            </div>

                            <div class="create-account-link">
                                <p>Não possui conta? <a href="cadastro">Cadastre-se!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
</body>
</html>
