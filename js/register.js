// Version Boostrap 5.1.x
// (function () {
//     'use strict'

//     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//     let forms = document.querySelectorAll('.needs-validation')
    
//     // Loop over them and prevent submission
//     Array.prototype.slice.call(forms)
//     .forEach(function (form) {
//         form.addEventListener('submit', function (event) {
//             if (!form.checkValidity()) {
                // event.preventDefault()
                // event.stopPropagation()
//             }
            
//             form.classList.add('was-validated')
//         }, false)
//     })
// })()

// Pour définir un évenement sur tous les inputs
let inputs = document.querySelectorAll('input:not(#password_check):not(#cguCheck)');

inputs.forEach(input => {
    input.addEventListener('input', function() {
        if(this.checkValidity()){
            this.classList.contains('is-invalid') ? this.classList.remove('is-invalid') : '';
            this.classList.add('is-valid');
        }else{
            this.classList.contains('is-valid') ? this.classList.remove('is-valid') : '';
            this.value == '' ? this.classList.remove('is-invalid') : this.classList.add('is-invalid');
        }
    })
})

// Pour définir l'état de l'input password_check
let passwordCheck = document.getElementById('password_check');
let password = document.getElementById('password');

passwordCheck.addEventListener('input', function (){
    if(this.value == password.value){
        this.classList.contains('is-invalid') ? this.classList.remove('is-invalid') : '';
        this.classList.add('is-valid');
    }else{
        this.classList.contains('is-valid') ? this.classList.remove('is-valid') : '';
        this.value == '' ? this.classList.remove('is-invalid') : this.classList.add('is-invalid');
    }
})

// Pour définir l'état du select
let select = document.getElementById('address');

select.addEventListener('input', function(){
    if(this.checkValidity()){
        this.classList.contains('is-invalid') ? this.classList.remove('is-invalid') : '';
        this.classList.add('is-valid');
    }else{
        this.classList.contains('is-valid') ? this.classList.remove('is-valid') : '';
        this.value == '' ? this.classList.remove('is-invalid') : this.classList.add('is-invalid');
    }
})

// Empêche l'envoi du formulaire si des valeurs ne conviennent pas
let form = document.querySelector('form');

form.addEventListener('submit', function (event) {
    if(!form.checkValidity() || password.value != passwordCheck.value){
        event.preventDefault();
        event.stopPropagation();
    }
})