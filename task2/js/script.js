let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
let regCo = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([co]{2})$/;
let checkbox = document.getElementById('agreement');
var form = document.getElementById('form_id');
var input = document.getElementById('email');
var result = document.getElementById('result');
var submit = document.getElementById('submit');
var title = document.getElementsByClassName('container__title');
var subtitle = document.getElementsByClassName('container__subtitle');
var divForm = document.getElementsByClassName('container__form');
var container = document.getElementsByClassName('container');
var line = document.getElementsByClassName('container__line');
var social = document.getElementsByClassName('container__social');
var m1500 = window.matchMedia("(min-width:1500px)")
var m1280 = window.matchMedia("(min-width: 1280px) and (max-width: 1500px)");
var m1000 = window.matchMedia("(min-width:1000px) and (max-width:1280px)");
var m850 = window.matchMedia("(min-width:850px) and (max-width:1000px)");
var m0 = window.matchMedia("(max-width: 850px)");

form.addEventListener('submit', (event) => {
    event.preventDefault();
    let imageSuccess = document.createElement("img");
    imageSuccess.src = "../images/success.png";
    imageSuccess.style.height = "70px";
    imageSuccess.style.width = "44px";
    container[0].appendChild(imageSuccess);
    title[0].innerHTML = 'Thanks for subscribing!';
    subtitle[0].innerHTML = 'You have successfully subscribed to our email listing. Check your email for the discount code.';
    divForm[0].style.display = 'none';
    imageSuccess.style.position = "relative";
    social[0].style.position = 'relative';
    imageSuccess.style.left = "21%";

    if (m1280.matches) {
        imageSuccess.style.bottom = "78%";
        subtitle[0].style.top = "15%";
        title[0].style.marginTop = "10%";
        line[0].style.top = "15%";
        social[0].style.bottom = '0%';
        social[0].style.top = '15%';
    } else if (m0.matches) {
        imageSuccess.style.bottom = "72%";
        imageSuccess.style.left = "5%";
        title[0].style.top = "35%";
        subtitle[0].style.top = "32%"
        line[0].style.top = "32%";
        social[0].style.top = '28%';
    } else if (m1500.matches) {
        subtitle[0].style.top = "5%";
        social[0].style.bottom = '5%';
        imageSuccess.style.bottom = "88%";
        imageSuccess.style.left = "21%";
    } else if (m1000.matches) {
        imageSuccess.style.bottom = "88%";
        imageSuccess.style.left = "13%";
    }
})


submit.addEventListener('mouseover', (event) => {
    event.preventDefault();
    result.innerHTML = '';
    if (!input.value) {
        result.innerHTML = "Email address is required";
        submit.disabled = true;
    } else if (reg.test(input.value) == false) {
        result.innerHTML = 'Please provide a valid e-mail address';
        submit.disabled = true;
    } else if (regCo.test(input.value)) {
        result.innerHTML = 'We are not accepting subscriptions from Colombia emails';
        submit.disabled = true;
    } else if (!checkbox.checked) {
        result.innerHTML = 'You must accept the terms and conditions';
        submit.disabled = true;
    } else {
        submit.disabled = false;
    }
})
input.addEventListener('mouseover', () => {
    result.innerHTML = '';
    submit.disabled = false;
})

checkbox.addEventListener('focus', () => {
    result.innerHTML = '';
    submit.disabled = false;
})

result.style.color = "red";
result.style.marginTop = "5%";
result.style.paddingLeft = "5%";
result.style.fontWeight = "bold";
result.style.height = "15px";
