<?php
session_start();
if(isset($_SESSION["email"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Preview</title>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-ebook-landing.css" rel="stylesheet">
    <style>

#main-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    min-width: 400px;
}

.content-box {
    display: flex;
    width: 400px;
    height: 500px;
    justify-content: center;
    align-items: center;
    border: 1px solid #1e1e1e;
    padding: 20px;
    position: relative;
    color: #ffffff;
    background: linear-gradient(45deg, #000000, #0a121f);
    border-radius: 10px;
}

.preview {
    width: 80%;
    height: 35%;
    position: absolute;
    top: 0%;
    transform: translateY(-50%);
    perspective: 1000px;
}

.card {
    width: 100%;
    height: 100%;
    transition: 1s;
    transform-style: preserve-3d;
    perspective: 1000px;
    border-radius: 8px;
}

.flipped,
.preview:hover .card {
    transform: rotateY(-180deg);
}

.front,
.back {
    width: 100%;
    height: 100%;
    position: absolute;
    background: #2c2c2c;
    backface-visibility: hidden;
    border-radius: 8px;
    overflow: hidden;
    color: white;
}

.back {
    transform: rotateY(-180deg);
}

.front::after,
.back::after,
.front::before,
.back::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0.5;
}

.front::after {
    background: #1a1a1a;
    border-radius: 0% 0% 0 160px;
    transform: translate(50%, -30%);
    top: 0;
}

.front::before {
    background: #3d3d3d;
    border-radius: 0 160px 0 0;
    transform: translate(-50%, 50%);
}

.title {
    position: absolute;
    right: 0;
    z-index: 1;
    letter-spacing: 1.5px;
    padding: 1rem;
}

#chip {
    top: 10%;
    position: absolute;
    background: #e0ab89;
    width: 15%;
    height: 18%;
    border-radius: 5px;
    margin-left: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
}

#chip span {
    position: absolute;
    background: #e0ab89;
    border: 1px solid black;
}

#chip span:nth-child(1) {
    height: 100%;
    width: 40%;
    border-top: none;
    border-bottom: none;
}

#chip span:nth-child(2) {
    height: 60%;
    width: 40%;
    left: 0;
    border-left: none;
    border-radius: 0 5px 5px 0;
}

#chip span:nth-child(3) {
    height: 60%;
    width: 40%;
    border-right: none;
    border-radius: 5px 0 0 5px;
    right: 0;
}

#chip span:nth-child(4) {
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}

#chip span:nth-child(5) {
    aspect-ratio: 1/1;
    width: 25%;
    border-radius: 2px;
}

.card-number,
.card-name,
.validity-box {
    position: absolute;
    margin-left: 15px;
}

.card-number {
    top: 42%;
    letter-spacing: 2px;
    font-size: 18px;
    z-index: 1;
}

.card-name {
    bottom: 8%;
    font-size: 14px;
    letter-spacing: 2px;
}

.validity-box {
    left: 40%;
    bottom: 25%;
    width: max-content;
    display: flex;
    font-size: 16px;
    align-items: center;
    z-index: 1;
    letter-spacing: 2px;
}

.validity-box span:first-child {
    font-size: 6px;
    color: #ffffffba;
    margin-right: 0px;
    letter-spacing: 2px;
}

.validity-box span:nth-child(2) {
    font-size: 8px;
    margin: 0 1px;
    color: #ffffff69;
}

.logo {
    position: absolute;
    font-size: 8px;
    width: 20%;
    height: 20%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    letter-spacing: 1px;
    bottom: 4%;
    right: 0%;
}

.logo::before,
.logo::after {
    content: '';
    position: absolute;
    width: 50%;
    aspect-ratio: 1/1;
    border-radius: 50%;
}

.logo::before {
    background: rgba(255, 0, 0, 0.525);
    left: 10%
}

.logo::after {
    background: rgba(255, 213, 0, 0.584);
    right: 10%;
}

.top-text {
    font-size: 5px;
    padding: 5px 0 1px 5px;
    color: #ffffff99;
}

.strip {
    width: 100%;
    height: 20%;
    background: black;
    position: relative;
    z-index: 1;
}

.box {
    width: 90%;
    height: 20%;
    position: relative;
    background: white;
    display: flex;
    align-items: center;
    margin: 10px auto;
    border-radius: 2px;
    overflow: hidden;
    z-index: 1;
}

.signature {
    width: 85%;
    height: 100%;
    background: repeating-linear-gradient(300deg, #e7e7e7 -2px, #e7e7e7 3px, #cccccc 0px, #cccccc 8px);
}

.card-cvv {
    width: 15%;
    color: black;
    letter-spacing: 2px;
    text-align: center;
}

.text {
    font-size: 6px;
    z-index: 1;
    position: relative;
    display: flex;
    flex-direction: column;
    grid-gap: 10px;
    color: #ffffff99;
    padding: 10px;
}

form {
    display: grid;
    grid-template-columns: auto auto;
    width: 100%;
    grid-gap: 30px;
}

.field {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
    font-size: 12px;
}

.field:nth-child(1) {
    grid-row: 1;
    grid-column: 1/3;
}

.field:nth-child(2) {
    grid-row: 2;
    grid-column: 1/3;
}

.field:nth-child(3) {
    grid-row: 3;
    grid-column: 1;
}

input {
    font-size: 16px;
    border: none;
    border-bottom: 1px solid #ffffff42;
    padding: 10px 0 4px;
    background: transparent;
    color: #ffffffb8;
    caret-color: white;
}

input:focus {
    outline: none;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg"style="background-color:black">
                <div class="container">
                    <a class="navbar-brand" href="index1.php">
                        <i class="navbar-brand-icon bi-book me-2"></i>
                        <span>SaCourses</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-auto me-lg-4">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="index1.php"><i class='bx bx-home'></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="lessons.php"><i class='bx bx-book-open'></i>Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5"><i class='bx bxs-contact'></i>Contact</a>
                            </li>
                        </ul>
                        <div class="d-none d-lg-block">
                            <a href="back/logout.php" data-toggle="modal" data-target="#modal-form"class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                                <i class="btn-icon"></i>
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav><br><br>
    <div id="main-container" style="font-family: serif;">
        <div class="content-box">
            <div class="preview">
                <div class="card">
                    <div class="front">
                        <div class="title">CREDIT CARD</div>
                        <div id="chip">
                            <span></span><span></span><span></span><span></span><span></span>
                        </div>
                        <div class="card-number">0000 0000 0000 0000</div>
                        <div class="card-name">Name Surname</div>
                        <div class="validity-box">
                            <span>
                                <p>VALID</p>
                                <p>THRU</p>
                            </span>
                            <span>►</span><span class="card-validity">00/00</span>
                        </div>
                        <div class="logo">MasterCard</div>
                    </div>

                    <div class="back">
                        <div class="top-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                        <div class="strip"></div>
                        <div class="box">
                            <div class="signature"></div>
                            <div class="card-cvv">000</div>
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quod accusamus!</p>
                        </div>
                    </div>
                </div>
            </div>
            <form>
                <div class="field">
                    <label for="number">Card Number</label>
                    <input type="text" id="number" oninput="UpdateAccountNumber(this);" maxlength="19">
                </div>

                <div class="field">
                    <label for="name">Card Holder</label>
                    <input type="text" id="name" oninput="updateCardHolder(this);" maxlength="25">
                </div>

                <div class="field">
                    <label for="validity">Valid upto (MM/YY)</label>
                    <input type="text" id="validity" oninput="updateValidity(this)" maxlength="5">
                </div>

                <div class="field">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" oninput="updateCardCvv(this)" maxlength="3">
                </div>

            </form>
        </div>
    </div>
    <section class="contact-section section-padding" id="section_5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12"style="margin-left:50%;">
                            <h6 class="mt-5">Let us a comment or talk to us</h6>
                            <h2 class="mb-4">Contact</h2>
                            <p class="mb-3">
                                <i class="bi-geo-alt me-2"></i>
                                Marrakech, Morocco
                            </p>
                            <p class="mb-2">
                                <a href="tel: +212(6)50-81-13-09" class="contact-link">
                                    +212(6)50-81-13-09
                                </a>
                            </p>
                            <p>
                                <a href="mailto:info@company.com" class="contact-link">
                                    info@gmail.com
                                </a>
                            </p>
                            <h6 class="site-footer-title mt-5 mb-3">Social</h6>
                            <ul class="social-icon mb-4">
                                <li class="social-icon-item">
                                    <a href="https://www.instagram.com/" class="social-icon-link bi-instagram"></a>
                                </li>
                                <li class="social-icon-item">
                                    <a href="https://twitter.com/" class="social-icon-link bi-twitter"></a>
                                </li>
                                <li class="social-icon-item">
                                    <a href="https://www.facebook.com/" class="social-icon-link bi-facebook"></a>
                                </li>
                                <li class="social-icon-item">
                                    <a href="" class="social-icon-link bi-whatsapp"></a>
                                </li>
                            </ul>
                            <p class="copyright-text">Copyright © 2023 e-learning
                            <br><br><a rel="nofollow" href="https://templatemo.com" target="_blank">Designed by Ghassane & Ali</a></p>
                        </div>
                    </div>
                </div>
            </section>
    <script>
        const card = document.querySelector('.card')
const cardNumber = document.querySelector('.card-number')
const cardHolder = document.querySelector('.card-name')
const cardValidity = document.querySelector('.card-validity')
const cardCvv = document.querySelector('.card-cvv')
const inputElement = document.querySelectorAll('input')
const cvvInput = document.querySelector('#cvv');

const dummy = {
    number: '0000 0000 0000 0000',
    name: 'Name Surname',
    validity: '00/00',
    cvv: '000'
}

inputElement.forEach((elem) => {

    elem.addEventListener('input', () => {
        if (elem.value.trim() === '') {
            const key = elem.getAttribute('id');
            const className = 'card-' + key;
            document.querySelector(`.${className}`).innerText = dummy[key]
        }
    })
})

function UpdateAccountNumber(input) {

    let inputValue = input.value.replace(/\D/g, '');
    let formattedValue = '';
    for (let i = 0; i < inputValue.length; i++) {
        if (i > 0 && i % 4 === 0) {
            formattedValue += '\u00A0';
        }
        formattedValue += inputValue[i];
    }
    input.value = formattedValue;
    cardNumber.innerText = formattedValue
}

function updateCardHolder(input) {
    let inputValue = input.value.replace(/[^A-Z a-z]/g, '');
    input.value = inputValue;
    cardHolder.innerText = inputValue
}

function updateValidity(input) {
    let inputValue = input.value.replace(/\D/g, '');
    let formattedValue = '';

    for (let i = 0; i < inputValue.length; i++) {
        const digit = parseInt(inputValue[i]);

        if ((i === 0 && digit > 1) || (i === 1 && digit > 2 && parseInt(inputValue[0]) != 0)) {
            break;
        }

        else if (i === 2) {
            formattedValue += '/';
        }
        formattedValue += digit;
    }
    input.value = formattedValue;
    cardValidity.innerText = formattedValue
}

function updateCardCvv(input) {
    let inputValue = input.value.replace(/\D/g, '');
    input.value = inputValue;
    cardCvv.innerText = inputValue
}

cvvInput.addEventListener('focus', () => card.classList.add('flipped'))
cvvInput.addEventListener('blur', () => card.classList.remove('flipped'))

    </script>
</body>
</html>
<?php
} else {
    echo "Session expired. Please <a href='login.php'>login</a> again.";
}
?>