
/* abrir e fechar modal */
const _btn_criar_evento = document.querySelector("#btn-criar");
const _btn_fechar_modal = document.querySelector("#btn-fechar");
const _modal_criar_evento = document.querySelector("#modal-criar-evento");
const _link_criar_evento = document.querySelector("#link-criar");
const _modal_editar_evento = document.querySelector("#btn-fechar-editar");


if(_btn_criar_evento){
    _btn_criar_evento.addEventListener("click", () => {
        _modal_criar_evento.className = "modal-wrapper-show";
    });
}


if(_btn_fechar_modal){
    _btn_fechar_modal.addEventListener("click", () => {
        _modal_criar_evento.className = "modal-wrapper-hide";
    });
}


if( _link_criar_evento){
    _link_criar_evento.addEventListener("click", (event) => {
        event.preventDefault();

        localStorage.setItem("isCriar", true);
        window.location.href = "/";
    });
}

function abrirModal(){
    const isCriar = localStorage.getItem("isCriar");

    if(isCriar && isCriar == 'true'){
        _modal_criar_evento.className = "modal-wrapper-show";
        localStorage.setItem("isCriar", false);
    }
}

abrirModal();


if(_modal_editar_evento){
    _modal_editar_evento.addEventListener('click', () => {
        window.location.href = "/dashboard";
    })
}