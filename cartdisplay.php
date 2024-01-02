<?php
session_start();
require_once 'back/connection.php';
require_once 'back/cart.php';
require_once 'back/cours.php';

$connection = new Connection();
$db = $connection->conn;
$connection->selectDatabase('Projet');

if (isset($_GET['delete'])) {
    Cart::deleteCartItem($_GET['delete'], $db);
    header('Location: cartdisplay.php');
    exit();
}

// Fetch cart items for the user
$totalPrice = 0;

// Fetch cart items for the user
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch the total price from Cart table
    $totalPriceQuery = "SELECT total_price FROM Cart WHERE user_id = ?";
    $stmtTotal = $db->prepare($totalPriceQuery);
    $stmtTotal->bind_param("i", $user_id);
    $stmtTotal->execute();
    $resultTotal = $stmtTotal->get_result();
    if ($totalRow = $resultTotal->fetch_assoc()) {
        $totalPrice = $totalRow['total_price'];
    }

    $cart_items_query = "SELECT CartItems.cart_item_id, Courses.id_C, Courses.title, CourseCategories.category_name, Courses.price, Courses.image FROM CartItems JOIN Courses ON CartItems.course_id = Courses.id_C JOIN CourseCategories ON Courses.category_id = CourseCategories.category_id JOIN Cart ON CartItems.cart_id = Cart.cart_id WHERE Cart.user_id = ?";
    $stmt = $db->prepare($cart_items_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
}
    ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>My Shopping Cart</title>
        <!-- CSS FILES -->        
        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/templatemo-ebook-landing.css" rel="stylesheet">
        <link rel="stylesheet" href="css/courses.css">
        <link rel="stylesheet" href="css/lessons.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                                <a class="nav-link click-scroll" href="lessons.php"><i class='bx bx-book-open'></i>Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="cartdisplay.php"><i class='bx bx-shopping-bag'></i>Cart</a>
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
            </nav><br><br><br><br>
<h1>Your Cart</h1>
<table class="table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_C']; ?></td>
                    <td><img src="<?php echo $row['image']; ?>"style="width:100px; height:auto;"></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><a href="cartdisplay.php?delete=<?php echo $row['cart_item_id']; ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <?php echo "<p style='margin-left:70%;'>Total Price: $" . number_format($totalPrice, 2) . "</p>";
            echo "<a style='margin-left:70%;'href='carduser.php'>Proceed to Payment</a>";?>
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
    </body>
</html>