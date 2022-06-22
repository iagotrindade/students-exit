<?=$render('header',['loggedUser'=>$loggedUser]);?>

    <section class="home">
        <!--for demo wrap-->
        <h1>Saídas dos Alunos</h1>
        
        <div class="add-student-button">
            <button class="add-button" onclick="openModal()">Adicionar</button>
            <select class="add-button">
                <option selected disabled>Filtrar</option>
                <option>301</option>
                <option>302</option>
            </select>
            <section class="add-student-section" style="margin: 0; margin-bottom: 10px">
                <div class="add-student-modal">
                    <h3 class="add-form-header">Preencha os campos</h3>
                    <div class="add-student-form-area">
                        <form class="add-student-form" method="POST" action="<?=$base;?>/add">
                            <input type="text" name="group" placeholder="Turma:">
                            <input type="text" name="student-name" placeholder="Nome do Aluno:">
        
                            <div class="add-student-form-buttons">
                                <button class="add-button-submit" type="submit">Adicionar</button>
                                <button class="add-button-close" onclick="closeModal()">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                <th>#</th>
                <th>Turma</th>
                <th>Aluno</th>
                <th>Período</th>
                <th>Ações</th>
                </tr>
            </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>301</td>
                        <td>Fulaninho de Tal</td>
                        <td>1º (Primeiro)</td>
                        <td>
                            <div class="section-action-buttons">
                                <a href="#" class="action-button">
                                    <p>Retorno</p> <i class='bx bx-check act-icon'></i>
                                </a>

                                /

                                <a href="#" class="action-button">
                                    <p>Excluir</p> <i class='bx bx-x act-icon'></i>
                                </a>
                            </div>
                        </td>

                        <tr>
                        <td>02</td>
                        <td>302</td>
                        <td>Ciclaninho de Tal</td>
                        <td>2º (Segundo)</td>
                        <td>
                            <div class="section-action-buttons">
                                <a href="#" class="action-button">
                                    <p>Retorno</p> <i class='bx bx-check act-icon'></i>
                                </a>

                                /

                                <a href="#" class="action-button">
                                    <p>Excluir</p> <i class='bx bx-x act-icon'></i>
                                </a>
                            </div>
                        </td>
                </tbody>
            </table>
        </div>
    </section>

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
