<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset = "UTF-8">
    <meta http-equiv="Cache-Control" content="no-sotore">
      
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Controle de Saída de Alunos</title>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <i class='bx bx-user icon'></i>
                </span>

                <div class="text logo-text">
                    <span class="name"><?=$loggedUser->surname?></span>
                    <span class="profession"><?=$loggedUser->matter?></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <form name = 'search' method = 'GET' action = '<?=$base;?>/search'>
                        <input type="text" placeholder="Procurar..." name = "searching">
                    </form>
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="<?=$base?>">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a onclick="openModal()">
                            <i class='bx bx-plus-circle icon'></i>
                            <span class="text nav-text">Nova Saída</span>
                        </a>
                    </li>

                    <!-- <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li> -->

                    <li class="nav-link">
                        <a href="about">
                            <i class='bx bx-copyright icon'></i>
                            <span class="text nav-text">Sobre</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="<?=$base;?>/sair" onclick='return confirmExit()'>
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>
    </nav>