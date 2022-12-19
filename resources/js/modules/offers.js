import OffersServices from "../Services/OffersServices";

let OX = new OffersServices;


/**
 * @param ruta Phat associated with the route to validate.
 * @return Boolean
 */
function inUrlLocation(ruta){
    let url_pathname = window.location.pathname.split("/")
    if(ruta === "inicio" || ruta === "home") {
        if(url_pathname[1] === "" || url_pathname[1] === "city") return true;
        else return false
    }
    else {
        return url_pathname.some((path) => path === ruta)
    }
}


// Modificar incono de presupuesto form.
const budgetIcon = document.getElementById('budget-icon')
const input_currency = document.getElementById('currency')

if(input_currency) {
    input_currency.addEventListener('change', (e) => {
        const dollarIcon = `<i class="far fa-dollar-sign"></i>`
        const euroIcon = `<i class="fas fa-euro-sign"></i>`
        budgetIcon.innerHTML = dollarIcon
        if(e.target.value === "EUR") budgetIcon.innerHTML = euroIcon
    })
}

// Confirmación de guardar oferta
const formCreateOffers = document.getElementById('formCreateOffers')
const confirmSaveBtn = document.getElementById('btn_confirm_save')
const modalConfirmSave = document.querySelector('#modalConfirmSave')
if(confirmSaveBtn){
    confirmSaveBtn.addEventListener('click', (e) => {
        formCreateOffers.submit()
        $('#modalConfirmSave').modal('hide')
    })
}

// Validación de agregado new offer
if(inUrlLocation("show")){
    (function(){
        // Don't go any further down the script if [data-notification] is not set.
        let responseCreate = document.getElementById('responseCreate')
        if ( !responseCreate )
            return false;

        let dataResponseCreate = JSON.parse(responseCreate.value)
        if(dataResponseCreate.code === 200) {
            Swal.fire({
                icon: 'success',
                title: 'Oferta creada exitosamente',
            })
        }
        if(dataResponseCreate.code === 500) {
            Swal.fire({
                icon: 'error',
                title: 'No se pudo registrar la oferta',
            })
        }
    })();
}





