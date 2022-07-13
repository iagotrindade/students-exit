<?=$render('header',['loggedUser'=>$loggedUser, 'students' => $students, 'classes' => $classes, 'filterClass' => $filterClass]);?>

    <section class="home">
        <h1>Saídas dos Alunos</h1>
        
        <div class="section-area-add-student">
            <div class = "header-buttons">
                <button class="add-button" onclick="openModal()">Adicionar</button>
                <form method = "POST" name = 'filter-form' action = "<?=$base;?>/filter">
                    <select class="add-button" name ="class-select">
                        <option selected disabled>Turmas</option>
                        <?php foreach($classes as $classe): ?>
                            <option><?=$classe->classNumber?></option>
                        <?php endforeach?>
                    </select>

                    <button class="add-button">Filtrar</button>
                </form>
            </div>
            <section class="add-student-section" style="margin: 0; margin-bottom: 10px">
                <div class="add-student-modal">
                    <h3 class="add-form-header">Preencha os campos</h3>
                    <div class="add-student-form-area">
                        <form class="add-student-form" method="POST" action="<?=$base;?>/add">
                            <input type="text" name="class" placeholder="Turma:">
                            <input type="text" name="student_name" placeholder="Nome do Aluno:">
                            <input type="number" name="student_number" placeholder="Número do Aluno:">
        
                            <div class="add-student-form-buttons">
                                <button class="add-button-submit" type="submit">Adicionar</button>
                                <button class="add-button-close" onclick="closeModal()">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <?php if(!empty($flashSuccess)): ?>
            <div class="home-warning-success">
                <p><?php echo ($flashSuccess)?></p>
                <i class='bx bx-x-circle close-warning' style = "font-size: 25px;" onclick="closeWarning()"></i>
            </div>
        <?php endif; ?>

        <?php if(!empty($flashError)): ?>
            <div class="home-warning-error">
                <p><?php echo ($flashError)?></p>
                <i class='bx bx-x-circle close-warning' style = "font-size: 25px;" onclick="closeWarning()"></i>
            </div>
        <?php endif; ?>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>      
                        <th>Turma</th>
                        <th>Aluno</th>
                        <th>Período</th>
                        <th>Motivo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            </table>
            <p class = 'search-term'>
                Você filtrou por: <?=$filterClass?>
            </p>
        </div>

        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php foreach($students as $student): ?>
                        <tr>
                            <td><?=$student->classNumber?></td>
                            <td><?=$student->name?></td>
                            <td><?=$student->outPeriod?></td>
                            <td><?=$student->situation?></td>
                            <td>
                                <div class="section-action-buttons">
                                    <!--Função removida a pedido do usuário-->

                                    <!--<a href="<?=$base;?>/<?=$student->id?>/return" class="action-button">
                                        <p>Retorno</p> <i class='bx bx-check act-icon'></i>
                                    </a>
                                    /-->

                                    <a href="<?=$base;?>/<?=$student->id?>/delete" class="action-button" onclick='return confirmDel()'>
                                        <p>Excluir</p> <i class='bx bx-x act-icon'></i>
                                    </a>
                                </div>
                            </td>
                        <tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </section>

    <script>
         setTimeout (() => {
            document.querySelector('.home-warning-success').style.display = 'none';
        }, 3000);

        setTimeout (() => {
            document.querySelector('.home-warning-error').style.display = 'none';
        }, 3000);
        
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
