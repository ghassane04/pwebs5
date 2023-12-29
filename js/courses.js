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
  var html = [{
    image: 'html.jpeg',
    title: 'Basics Of HTML',
    category: 'HTML',
    price: 9.9
},
  {
      image: 'html_tags.jpeg',
      title: 'HTML Elements And Tags',
      category: 'HTML',
      price: 9.9
  },
  {
      image: 'html_attri.jpeg',
      title: 'HTML Attributes And Values',
      category: 'HTML',
      price: 19.9
  }];
  var css = [{
      image: 'css_selectors.jpeg',
      title: 'CSS Selectors',
      category: 'CSS',
      price: 69.9
  },
  {
    image: 'cssbas.jpeg',
    title: 'Basics Of CSS',
    category: 'CSS',
    price: 5.9
},
  {
      image: 'css_propreties.jpeg',
      title: 'CSS Properties',
      category: 'CSS',
      price: 29.9
  },
  {
      image: 'cssanim.jpeg',
      title: 'CSS Animations',
      category: 'CSS',
      price: 19.9
  },
  {
      image: 'css_color.jpeg',
      title: 'Css Colors',
      category: 'CSS',
      price: 29.9
  }];
  var js = [{
    image: 'whatisJS.jpeg',
    title: 'The Basics Of Javascript',
    category: 'JS',
    price: 29.9
  },
  {
      image: 'js_operators.jpeg',
      title: 'Javascript Operators And Conditions',
      category: 'JS',
      price: 29.9
  },
  {
      image: 'js _array.jpeg',
      title: 'Javascript Objects And Arrays',
      category: 'JS',
      price: 39.9
  },
  {
      image: 'js_event.jpeg',
      title: 'Javascript Events',
      category: 'JS',
      price: 59.9
  },
  {
      image: 'js_funct.jpeg',
      title: 'Functions And Loops With Javascript',
      category: 'JS',
      price: 19.9
  }];
  var php = [{
      image: 'php_basics.jpeg',
      title: 'Getting Started With Php',
      category: 'PHP',
      price: 15.9
  },
  {
      image: 'conect_data_php.jpeg',
      title: 'Connecting To Database Using PHP',
      category: 'PHP',
      price: 29.9
  },
  {
      image: 'crud_php.jpeg',
      title: 'Manipulating Crud Using Php',
      category: 'PHP',
      price: 45.9
  }];

  var container = document.querySelector('#cardContainer');
  courses.forEach((course, key) => {
      let newDiv = document.createElement('div');
      newDiv.classList.add('card', 'item');
      newDiv.innerHTML = `
          <img src="${course.image}" alt="" width="50%" height="50%">
          <h3 style="text-align: center;">${course.title}</h3>
          <div style="display: flex; align-items: center; justify-content: space-between;">
              <p class="cat">${course.category}</p>
              <p>$${course.price.toLocaleString()}</p>
          </div>
          <button onclick="addToCard(${key})">Add To Cart</button>`;
      container.appendChild(newDiv);
  });

function All(){
    var container = document.querySelector('#cardContainer2');
    document.getElementById('cardContainer').style.display = "none";
    document.getElementById('cardContainer2').style.display = "flex";
    document.getElementById('cardContainer3').style.display = "none";
    document.getElementById('cardContainer4').style.display = "none";
    document.getElementById('cardContainer5').style.display = "none";
    document.getElementById('cardContainer6').style.display = "none";
    courses.forEach((courses)=>{container.innerHTML += `
    <div class="card">
        <img src="${courses.image}" alt="" width="50%" height="50%">
        <h3 style="text-align: center;">${courses.title}</h3>
        <div style = "
        display: flex; 
        align-items: center;
        justify-content: space-between; ">
            <p class="cat">${courses.category}</p>
            <p>$${course.price.toLocaleString()}</p>
          </div>
          <button onclick="addToCard(${key})">Add To Cart</button>`;
})
}
function Html(){
    var container = document.querySelector('#cardContainer3');
    document.getElementById('cardContainer').style.display = "none";
    document.getElementById('cardContainer2').style.display = "none";
    document.getElementById('cardContainer3').style.display = "flex";
    document.getElementById('cardContainer4').style.display = "none";
    document.getElementById('cardContainer5').style.display = "none";
    document.getElementById('cardContainer6').style.display = "none";
    html.forEach((e)=>{container.innerHTML += `
    <div class="card">
        <img src="${e.image}" alt="" width="50%" height="50%">
        <h3 style="text-align: center;">${e.title}</h3>
        <div style = "
        display: flex; 
        align-items: center;
        justify-content: space-between; ">
            <p class="cat">${e.category}</p>
            <p>$${e.price}</p>
        </div>
        <b
    </div>
    `
})
}
function Css(){
    var container = document.querySelector('#cardContainer4');
    document.getElementById('cardContainer').style.display = "none";
    document.getElementById('cardContainer2').style.display = "none";
    document.getElementById('cardContainer3').style.display = "none";
    document.getElementById('cardContainer4').style.display = "flex";
    document.getElementById('cardContainer5').style.display = "none";
    document.getElementById('cardContainer6').style.display = "none";
    css.forEach((e)=>{container.innerHTML += `
    <div class="card">
        <img src="${e.image}" alt="" width="50%" height="50%">
        <h3 style="text-align: center;">${e.title}</h3>
        <div style = "
        display: flex; 
        align-items: center;
        justify-content: space-between; ">
            <p class="cat">${e.category}</p>
            <p>$${e.price}</p>
        </div>
    </div>
    `
})
}
function Js(){
    var container = document.querySelector('#cardContainer5');
    document.getElementById('cardContainer').style.display = "none";
    document.getElementById('cardContainer2').style.display = "none";
    document.getElementById('cardContainer3').style.display = "none";
    document.getElementById('cardContainer4').style.display = "none";
    document.getElementById('cardContainer5').style.display = "flex";
    document.getElementById('cardContainer6').style.display = "none";
    js.forEach((e)=>{container.innerHTML += `
    <div class="card">
        <img src="${e.image}" alt="" width="50%" height="50%">
        <h3 style="text-align: center;">${e.title}</h3>
        <div style = "
        display: flex; 
        align-items: center;
        justify-content: space-between; ">
            <p class="cat">${e.category}</p>
            <p>$${e.price}</p>
        </div>
    </div>
    `
})
}
function Php(){
    var container = document.querySelector('#cardContainer6');
    document.getElementById('cardContainer').style.display = "none";
    document.getElementById('cardContainer2').style.display = "none";
    document.getElementById('cardContainer3').style.display = "none";
    document.getElementById('cardContainer4').style.display = "none";
    document.getElementById('cardContainer5').style.display = "none";
    document.getElementById('cardContainer6').style.display = "flex";
    php.forEach((e)=>{container.innerHTML += `
    <div class="card">
        <img src="${e.image}" alt="" width="50%" height="50%">
        <h3 style="text-align: center;">${e.title}</h3>
        <div style = "
        display: flex; 
        align-items: center;
        justify-content: space-between; ">
            <p class="cat">${e.category}</p>
            <p>$${e.price}</p>
        </div>
    </div>
    `
})
}