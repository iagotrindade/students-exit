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