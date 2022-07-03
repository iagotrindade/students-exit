<?=$render('header',['loggedUser'=>$loggedUser]);?>

    <section class="home" style = "display:flex; flex-direction:column; align-items:center;">
        <h1>Sobre o desenvolvedor</h1>
        <div class = "section-area-about">
            <div class = "section-area-about-modal">
                <div class = "picture-area">
                    <div class = "picture-area-img"></div>
                    <p class = "main-info">
                        Iago Silva da Trindade</br>
                        Desenvolvedor
                    </p>
                </div>
                    

                <div class = "text-area">
                    <ul class = "list-about-items">
                        <li class = "list-about-item">
                            <div class = "list-about-spec">
                                <i class='bx bxs-graduation'></i>
                                <p>-> Analista de 
                                    <p class = "text-colored">Sistemas</p>
                                </p>
                            </div>
                        </li>

                        <li class = "list-about-item">
                            <div class = "list-about-spec">
                                <i class='bx bxs-heart'></i>
                                <p>-> Apaixonado por 
                                    <p class = "text-colored">Tecnologia</p>
                                </p>
                            </div>
                        </li>

                        <li class = "list-about-item">
                            <div class = "list-about-spec">
                                <i class='bx bx-code-alt'></i>
                                <p>-> Programador 
                                    <p class = "text-colored">Fullstack</p>
                                </p>
                            </div>
                        </li>

                        <li class = "list-about-item">
                            <div class = "list-about-spec">
                                <i class='bx bx-mail-send'></i>
                                <p>-> E-mail: <a href="mailto:iagost1@hotmail.com">iagost1@hotmail.com</a></p>
                            </div>
                        </li>

                        <li class = "list-about-item">
                            <div class = "list-about-spec">
                                <i class='bx bx-mail-send'></i>
                                <p>-> Fone / Whatsapp: <a href="https://wa.me/555191657516" target="_blank">(51) 9 9165-7516</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    <script>
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click" , () =>{
            sidebar.classList.toggle("close");
        })

    searchBtn.addEventListener("click" , () =>{
        sidebar.classList.remove("close");
    })

    modeSwitch.addEventListener("click" , () =>{
        body.classList.toggle("dark");
    
        if(body.classList.contains("dark")){
            modeText.innerText = "Light mode";
        }else{
            modeText.innerText = "Dark mode";
        
        }
        });
    </script>

    <script src="<?=$base?>/assets/js/vanilla.js"></script>
</body>
</html>
