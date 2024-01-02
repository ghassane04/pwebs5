<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/courses.css">
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/templatemo-ebook-landing.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg" style="background-color:black">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <i class="navbar-brand-icon bi-book me-2"></i>
                        <span>SaCourses</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-auto me-lg-4">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="index.php"><i class='bx bx-home'></i>Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav><br><br><br>
<div class="container my-5">
    <h2>List of users</h2>
    <a  class="btn btn-primary" href="signin.php" role="button">Signup</a>
    <br>
    <br>
    <table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Date</th>
            <th>Shopping Cart</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        include('back/connection.php');
        //create in instance of class Connection
        $connection = new Connection();
        //call the selectDatabase method
        $connection->selectDatabase('Projet');
        include("back/user.php");
        $clients=user::selectAllClients('Users',$connection->conn);
        foreach($clients as $row) {
          echo " <tr>
          <td>$row[id]</td>
           <td>$row[username]</td>
           <td>$row[email]</td>
           <td>$row[reg_date]</td>
           <td>Cart<h1><i class='bx bx-shopping-bag'></i></h1></td>
           <td><a href='back/delete.php?id=$row[id];'>Delete</a></td>
       </tr>";
       }
       
       ?>
       </tbody>
  
   </table>
   </div>
   <script src="js/jquery.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
</body>
</html>