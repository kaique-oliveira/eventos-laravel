
/* abrir e fechar modal */
const _btn_criar_evento = document.querySelector("#btn-criar");
const _btn_fechar_modal = document.querySelector("#btn-fechar");
const _modal_criar_evento = document.querySelector("#modal-criar-evento");

_btn_criar_evento.addEventListener("click", () => {
    _modal_criar_evento.className = "modal-wrapper-show";
});

_btn_fechar_modal.addEventListener("click", () => {
    _modal_criar_evento.className = "modal-wrapper-hide";
});