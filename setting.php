<?php
session_start();
$emailValue = $_SESSION['email'] ?? ''; // Use null coalescing operator to handle unset session variable
$usernameValue = $_SESSION['username'] ?? '';
$errorMesage = "";
$successMesage = "";

include('back/connection.php');
   
// Create an instance of class Connection
$connection = new Connection();

// Call the selectDatabase method
$connection->selectDatabase('Projet');

// Include the user file
include('back/user.php');

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client = new stdClass();
    $client->email = $emailValue;
    $client->username = $_POST['username'];
    $user_id= $_SESSION['user_id'];

    // Call updateClientInfo function with correct arguments
    $mysqli = $connection->conn; // Replace 'conn' with the actual property name
    user::updateClientInfo($client, "Users", $mysqli,$user_id);
    
    if (isset(user::$successMsg)) {
        $successMesage = user::$successMsg;
    } elseif (isset(user::$errorMsg)) {
        $errorMesage = user::$errorMsg;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-ebook-landing.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <style>
        .a{
            display:none;  
            margin-left:20%;
        } 
.form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  background-color: #ffffff;
  padding: 30px;
  width: 450px;
  border-radius: 20px;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
::placeholder {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.form button {
  align-self: flex-end;
}
.flex-column > label {
  color: #151717;
  font-weight: 600;
}
.inputForm {
  border: 1.5px solid #ecedec;
  border-radius: 10px;
  height: 50px;
  display: flex;
  align-items: center;
  padding-left: 10px;
  transition: 0.2s ease-in-out;
}
.input {
  margin-left: 10px;
  border-radius: 10px;
  border: none;
  width: 85%;
  height: 100%;
}
.input:focus {
  outline: none;
}
.inputForm:focus-within {
  border: 1.5px solid #2d79f3;
}
.flex-row {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 10px;
  justify-content: space-between;
}
.flex-row > div > label {
  font-size: 14px;
  color: black;
  font-weight: 400;
}
.span {
  font-size: 14px;
  margin-left: 5px;
  color: #2d79f3;
  font-weight: 500;
  cursor: pointer;
}
.button-submit {
  margin: 20px 0 10px 0;
  background-color: #151717;
  border: none;
  color: white;
  font-size: 15px;
  font-weight: 500;
  border-radius: 10px;
  height: 50px;
  width: 100%;
  cursor: pointer;
}
.button-submit:hover {
  background-color: #252727;
}
.p {
  text-align: center;
  color: black;
  font-size: 14px;
  margin: 5px 0;
}
.btn {
  margin-top: 10px;
  width: 100%;
  height: 50px;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: 500;
  gap: 10px;
  border: 1px solid #ededef;
  background-color: white;
  cursor: pointer;
  transition: 0.2s ease-in-out;
}
.btn:hover {
  border: 1px solid #2d79f3;
  ;
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
                        <a class="nav-link click-scroll" href="lessons.php"><i class='bx bx-book-open'></i>Courses</a>
                    </li>                       
                </ul>
                <div class="d-none d-lg-block">
                    <a href="logout.php"data-toggle="modal" data-target="#modal-form"class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                        <i class="btn-icon"></i>
                        <span>Log out</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="sidebar hidden-print">
    <br><br><br><br>
      <ul class="nav-links">
        <li>
          <a href="#">
          <i class='bx bx-info-circle'></i>
            <span class="links_name"id=btn >INFORMATION</span>
          </a>
        </li><br><br>
        <li>
          <a href="#" >
          <i class='bx bx-edit-alt' ></i>
            <span class="links_name"id=b >MODIFICATION</span>
          </a>
        </li><br><br>
        <li>
          <a href="#">
          <i class='bx bx-credit-card'></i>
            <span class="links_name">CARD</span>
          </a>
        </li>
        <li>
          <a href="#">
          <i class='bx bx-credit-card'></i>
            <span class="links_name">DECONEXION</span>
          </a>
        </li>
      </ul>
    </div>
    <br>
    <form method="POST">
    <div id=a class="a">
    <center><form class="form" method="post">
                <h3>Modification</h3>
    
    <div class="flex-column">
      <label>New Username</label></div>
      <div class="inputForm">
        <input type="text" name="username" value="<?php echo htmlspecialchars($usernameValue); ?>"class="input" placeholder="Enter your New Username">
      </div>
    <div class="flex-column">
      <label>New Email </label></div>
      <div class="inputForm">
        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
        <input type="email" name="email" value="<?php echo htmlspecialchars($emailValue); ?>"class="input" placeholder="Enter your New Email">
      </div>   
    <button class="button-submit" type="submit" name="submit">Update</button>
    <?php
            if(!empty($successMesage)){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$successMesage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
</button>
</div>";
            }
  ?><?php

    if(!empty($errorMesage)){
  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>$errorMesage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </div>";
    }?>
    </form></center>
    </div>
    </form>
    <div id=c>
        <aside style="margin-left:70%;margin-top:0%;">
        <div id="card-container" >
            <div id="card">
                <div id="front">
                    <div class="reflection"></div>
                    <div class="type">PLATINUM</div>
                    <div class="title-text">CIH Bank</div>
                    <div class="details">
                        <div class="name">Person Name</div>
                        <p id="hidden-number">1111 XXXX XXXX 1452</p>
                    </div>
                    <button id="show-btn">View Card Details</button>
                    <div class="logo">MasterCard</div>
                </div>
                <div id="back">
                    <div class="reflection"></div>
                    <div id="chip">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="title-text">Bank Name</div>
                    <div class="details">
                        <div class="name">Person Name</div>
                        <p id="hidden-number">1111 1223 1223 1452</p>
                        <span id="cvv">CVV: 304</span>
                        <span id="valid-date"> Expiry: 02/30</span>
                    </div>
                    <button id="hide-btn">Hide Card Details</button>
                    <div class="logo">MasterCard</div>
                </div>
            </div>
        </div>
        </aside>
        <aside style="margin-left:25%;top:0%">
            <tr><th>USERNAME : </th><br><br><br><br>
            <th>EMAIL : </th><br><br><br><br>
            <th >PASSWORD : </th>
        </tr>
        </aside>
    </div>
    
    
    <script>
        const b=document.querySelector('#b');
        const a=document.querySelector('#a');
        const btn=document.querySelector('#btn');
        const c=document.querySelector('#c');

        b.addEventListener('click', ()=>{ a.style.display='block';c.style.display='none';});
        btn.addEventListener('click', ()=>{ c.style.display='block';a.style.display='none';});
        flip = () => {
            document.getElementById('card').classList.toggle('flipped')
            document.querySelector('#front .reflection').classList.toggle('move')
            document.querySelector('#back .reflection').classList.toggle('move')
        }
        document.getElementById('show-btn').addEventListener('click', flip)
        document.getElementById('hide-btn').addEventListener('click', flip)
    </script>
</body>
</html>