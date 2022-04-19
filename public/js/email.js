//Variables
const email = document.querySelector('#email');
const subject = document.querySelector('#subject');
const message = document.querySelector('#message');
const submitBtn = document.querySelector('#submitBtn');
const resetBtn = document.querySelector('#resetBtn');
const formEmail = document.querySelector('#formEmail');
const submitline = document.querySelector('.submitline');
const er = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//EventListeners
eventListeners();
function eventListeners(){
    document.addEventListener('DOMContentLoaded', startapp);

    email.addEventListener('blur', validateForm);
    subject.addEventListener('blur', validateForm);
    message.addEventListener('blur', validateForm);

    formEmail.addEventListener('submit');
}

//Starting the app
function startapp(){
    submitBtn.classList.add('disablebutton');
}

//Validate Form
function validateForm(e){
    e.preventDefault();
    if (e.target.value.length > 0) {
        //DeleteErrors
        const errormessage = document.querySelector('.errorBox');
        if(errormessage){
            errormessage.remove();
        }
        e.target.classList.remove('redinput');
        e.target.classList.add('greeninput');
    }else{
        e.target.classList.remove('greeninput');
        e.target.classList.add('redinput');
        showError('This field is required');
    }

    if(e.target.type === 'email') {

        if(er.test(e.target.value)){
            console.log('Email valid');
        }else{
            console.log('Email not valid');
            e.target.classList.remove('greeninput');
            e.target.classList.add('redinput');
            showError('Invalid Email');
        }
    }
    if(er.test(email.value) && subject.value != '' && message.value != ''){
        console.log('Validation successful');
        submitBtn.classList.remove('disablebutton');
    }
}

//Error
function showError(info){
    const text = document.createElement('p');
    text.textContent = info;
    text.classList.add('errorBox');

    const errors = document.querySelectorAll('.errorBox');

    if (errors.length === 0) {
        formEmail.appendChild(text);
    }
}
