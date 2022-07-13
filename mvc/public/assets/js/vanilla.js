function confirmDel() {
    return confirm('Tem certeza que deseja excluir este aluno?');
}

function confirmExit() {
    return confirm('Tem certeza que sair da sua conta?');
}

function openModal () {
    let modal = document.querySelector('.add-student-section');
    
    if (typeof modal == undefined || modal === null)
    return;

    modal.style.display = "flex";
}

document.querySelector(".add-button-close").addEventListener("click", function(event){
    event.preventDefault()
});

function closeModal () {
    let modal = document.querySelector('.add-student-section');
    
    if (typeof modal == undefined || modal === null)
    return;

    modal.style.display = 'none';
}

function closeWarning () {
    document.querySelectorAll('.home-warning-success, home-warning-error').forEach((item)=>{
        item.style.display = 'none';
    });
}