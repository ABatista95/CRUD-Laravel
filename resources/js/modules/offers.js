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

// Money validation format
const valueMoney = 500123456


function moneyFormat(value, format) {
    const result = new Intl.NumberFormat(format, {
        minimumFractionDigits: 0
    }).format(valueMoney)
    return result
}


/**
 * @param locale is a string that represents a location code :: 'en-US'
 *
 */
function dateFormatter(locale, currency, digit, valueInput) {
    const currencyFormatter = new Intl.NumberFormat(locale, {
        currency,
        minimumFractionDigits: digit
    })
    return currencyFormatter.format(valueInput)
}

const input_budget = document.getElementById('budget')
const input_currency = document.getElementById('currency')

console.log(dateFormatter('es-ES', 'COP', 0, 1234))
console.log(Number(1500).toLocaleString('es-CO', {
    currency: 'COP'
}))


// Forma fallida, debido a que no se puede meter numeros en imput.

// input_budget.addEventListener('keyup', (e) => {
//     console.log('Entro..')
//     let valueInput = e.target.value.replace(',','')
//     valueInput = valueInput.replace('.', '')
//     let valueFormatt = Number(valueInput).toLocaleString('es-CO', {
//         currency: 'COP'
//     })
//     e.target.value = valueFormatt
// }, false)


// let resultFormat
//
// input_budget.addEventListener('keyup', (e) => {
//     let locale = input_currency.selectedOptions[0].dataset.locale
//     let currency = input_currency.selectedOptions[0].dataset.currency
//     let valueInput = e.target.value.replace(',','')
//     valueInput = valueInput.replace('.', '')
//
//     console.log('Value a format:: ', valueInput)
//     resultFormat = dateFormatter(locale, currency, 0, valueInput);
//     console.log('Valor de :: ', {locale, valueInput, currency, resultFormat,}, resultFormat)
//     e.target.value = resultFormat
// }, )


// Modificar incono de presupuesto form.
const budgetIcon = document.getElementById('budget-icon')
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





