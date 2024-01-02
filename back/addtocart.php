<?php
// In addtocart.php
require_once 'cart.php';
require_once 'connection.php';

session_start();
$connection = new Connection();
$db = $connection->conn;
$connection->selectDatabase('Projet');
$cart = new Cart($db);

if (isset($_POST['course_id']) && isset($_SESSION['user_id'])) {
    $courseId = $_POST['course_id'];
    $userId = $_SESSION['user_id'];

    if ($cart->addItem($userId, $courseId)) {
        // Item added successfully
        header('Location: ../lessons.php');
    } else {
        // Item already in cart
        header('Location: ../lessons.php?error=already_in_cart');
    }
    exit();
}

?>
