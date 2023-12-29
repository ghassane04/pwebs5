<?php session_start();?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome to our website</title>
        <!-- CSS FILES -->        
        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/templatemo-ebook-landing.css" rel="stylesheet">
        <link rel="stylesheet" href="css/courses.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <style>
        .contain{
            width: 1000px;
            margin: auto;
            transition: 0.5s;
        }
        header{
            display: grid;
            grid-template-columns: 1fr 50px;
            margin-top: 50px;
        }
        header .shopping{
            position: relative;
            text-align: right;
        }
        header .shopping span{
            background: red;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            position: absolute;
            top: -5px;
            left: 80%;
            padding: 3px 10px;
        }
         .list{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            column-gap: 50px;
            row-gap: 20px;
            margin-top: 100px;
        }
        .list .item{
            text-align: center;
            background-color: #DCE0E1;
            padding: 20px;
            box-shadow: 0 50px 50px #757676;
            letter-spacing: 1px;
        }
        .list .item img{
            width: 90%;
            height: 150px;
            object-fit: cover;
        }
        .list .item .title{
            font-weight: 600;
        }
        .list .item .price{
            margin: 10px;
        }
        .list .item button{
            background-color: orange;
            color: #fff;
            width: 100%;
            padding: 10px;
        }
        .card{
            position: fixed;
            top:15%;
            left: 100%;
            width: 500px;
            background-color: #453E3B;
            height: 85vh;
            transition: 0.5s;
        }
        .active .card{
            left: calc(100% - 500px);
        }
        .active .container{
           transform: translateX(-200px);
        }
        .card h1{
            color: #E8BC0E;
            font-weight: 100;
            margin: 0;
            padding: 0 20px;
            height: 80px;
            display: flex;
            align-items: center;
        }
        .card .checkOut{
            position: absolute;
            bottom: 0;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        
        }
        .card .checkOut div{
            background-color: #E8BC0E;
            width: 100%;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            cursor: pointer;
        }
        .card .checkOut div:nth-child(2){
            background-color: #1C1F25;
            color: #fff;
        }
        .listCard li{
            display: grid;
            grid-template-columns: 100px repeat(3, 1fr);
            color: #fff;
            row-gap: 10px;
        }
        .listCard li div{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .listCard li img{
            width: 90%;
        }
        .listCard li button{
            background-color: #fff5;
            border: none;
        }
        .listCard .count{
            margin: 0 10px;
        }</style> 
    </head>
    <body class="">
            <nav class="navbar navbar-expand-lg" style="background-color:black;left:0%">
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
                                <a class="nav-link click-scroll" href="#section_5"><i class='bx bxs-contact'></i>Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="setting.php"><i class='bx bx-cog'></i>Settings</a>
                            </li>                          
                        </ul>
                        <div class="d-none d-lg-block">
                            <a href="logout.php" data-toggle="modal" data-target="#modal-form"class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                                <i class="btn-icon"></i>
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav><br><br>
                <div class="allpage">
                    <div class="categories"style="margin-left: 2%;">
                        <h5 style="color:yellow">Categories :</h5>
                        <div class="p">
                            <ul>
                                <li class="li" style="cursor: pointer;"><a onclick=All()>ALL</a></li>
                                <li class="li"style="cursor: pointer;"><a onclick=Html()>HTML</a></li>
                                <li class="li"style="cursor: pointer;"><a onclick=Css()>Css</a></li>
                                <li class="li"style="cursor: pointer;"><a onclick=Js()>JS</a></li>
                                <li class="li"style="cursor: pointer;"><a onclick=Php()>PHP</a></li>
                              </ul>
                        </div>
                    </div>   
                        <div class="contain">
                            <header>
                                <h1 style="margin-left: 10%;">Your Shopping Cart</h1>
                                <div class="shopping" style="cursor: pointer;">
                                    <h1><i class='bx bx-shopping-bag'></i></h1>
                                    <span class="quantity">0</span>
                                </div>
                            </header>
                            <div class="list">
          
                            </div>
                        </div>
                        <div class="card">
                            <h1>Card</h1>
                            <ul class="listCard">
                            </ul>
                            <div class="checkOut">
                            <div class="total">0</div>
                            <div class="closeShopping">Close</div>
                        </div>
                        </div>
                        </div>
                       <br><br>
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
                                <br><br><a rel="nofollow" href="" target="_blank">Designed by Ghassane & Ali</a></p>
                            </div>
                        </div>
                    </div>
                </section>
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script>
        let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

var courses = [{
    image: 'images/whatisJS.jpeg',
    title: 'The Basics Of Javascript',
    category: 'JS',
    price: 29.9
  },
  {
    image: 'images/html.jpeg',
    title: 'Basics Of HTML',
    category: 'HTML',
    price: 9.9
},
  {
      image: 'images/cssbas.jpeg',
      title: 'Basics Of CSS',
      category: 'CSS',
      price: 5.9
  },
  {
      image: 'images/html_tags.jpeg',
      title: 'HTML Elements And Tags',
      category: 'HTML',
      price: 9.9
  },
  {
      image: 'images/css_selectors.jpeg',
      title: 'CSS Selectors',
      category: 'CSS',
      price: 69.9
  },
  {
      image: 'images/js_operators.jpeg',
      title: 'Javascript Operators And Conditions',
      category: 'JS',
      price: 29.9
  },
  {
      image: 'images/html_attri.jpeg',
      title: 'HTML Attributes And Values',
      category: 'HTML',
      price: 19.9
  },
  {
      image: 'images/css_propreties.jpeg',
      title: 'CSS Properties',
      category: 'CSS',
      price: 29.9
  },
  {
      image: 'images/js _array.jpeg',
      title: 'Javascript Objects And Arrays',
      category: 'JS',
      price: 39.9
  },
  {
      image: 'images/cssanim.jpeg',
      title: 'CSS Animations',
      category: 'CSS',
      price: 19.9
  },
  {
      image: 'images/js_event.jpeg',
      title: 'Javascript Events',
      category: 'JS',
      price: 59.9
  },
  {
      image: 'images/css_color.jpeg',
      title: 'Css Colors',
      category: 'CSS',
      price: 29.9
  },
  {
      image: 'images/php_basics.jpeg',
      title: 'Getting Started With Php',
      category: 'PHP',
      price: 15.9
  },
  {
      image: 'images/js_funct.jpeg',
      title: 'Functions And Loops With Javascript',
      category: 'JS',
      price: 19.9
  },
  {
      image: 'images/conect_data_php.jpeg',
      title: 'Connecting To Database Using PHP',
      category: 'PHP',
      price: 29.9
  },
  { 
      image: 'images/crud_php.jpeg',
      title: 'Manipulating Crud Using Php',
      category: 'PHP',
      price: 45.9
  }];
let listCards  = [];
function initApp(){
    courses.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="${value.image}"><br><br>
            <div class="title">${value.title}</div>
            <div class="price">$${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] =courses[key];
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="${value.image}"/></div>
                <div>${value.title}</div>
                <div>$${value.price.toLocaleString()}</div>
                `;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * courses[key].price;
    }
    reloadCard();
}
        </script>
    </body>
</html>