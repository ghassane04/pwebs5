<?php
class Cart {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addItem($userId, $courseId) {
        // Check if item is already in the cart
        if ($this->isItemInCart($userId, $courseId)) {
            return false; // Item already in cart
        }
    
        // Start a transaction
        $this->db->begin_transaction();
    
        try {
            // Add item to cart
            $insertItemStmt = $this->db->prepare("INSERT INTO CartItems (cart_id, course_id) SELECT cart_id, ? FROM Cart WHERE user_id = ?");
            $insertItemStmt->bind_param("ii", $courseId, $userId);
            $insertItemStmt->execute();
    
            // Get the cart_id for the total price update
            $cartIdQuery = $this->db->prepare("SELECT cart_id FROM Cart WHERE user_id = ?");
            $cartIdQuery->bind_param("i", $userId);
            $cartIdQuery->execute();
            $result = $cartIdQuery->get_result();
            $cartRow = $result->fetch_assoc();
            $cartId = $cartRow['cart_id'];
    
            // Calculate new total price
            $totalPriceQuery = $this->db->prepare("SELECT SUM(Courses.price) AS total_price FROM CartItems JOIN Courses ON CartItems.course_id = Courses.id_C WHERE CartItems.cart_id = ?");
            $totalPriceQuery->bind_param("i", $cartId);
            $totalPriceQuery->execute();
            $totalPriceResult = $totalPriceQuery->get_result();
            $totalPriceRow = $totalPriceResult->fetch_assoc();
            $totalPrice = $totalPriceRow['total_price'];
    
            // Update total price in Cart table
            $updatePriceStmt = $this->db->prepare("UPDATE Cart SET total_price = ? WHERE cart_id = ?");
            $updatePriceStmt->bind_param("di", $totalPrice, $cartId);
            $updatePriceStmt->execute();
    
            // Commit the transaction
            $this->db->commit();
            return true;
        } catch (mysqli_sql_exception $exception) {
            // Rollback the transaction in case of error
            $this->db->rollback();
            throw $exception;
        }
    }
    

    public function isItemInCart($userId, $courseId) {
        $stmt = $this->db->prepare("SELECT * FROM CartItems JOIN Cart ON CartItems.cart_id = Cart.cart_id WHERE Cart.user_id = ? AND CartItems.course_id = ?");
        $stmt->bind_param("ii", $userId, $courseId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function getCartItems($userId) {
        $query = "SELECT Courses.id_C, Courses.title, Courses.price, Courses.image, CourseCategories.category_name 
                  FROM CartItems 
                  JOIN Courses ON CartItems.course_id = Courses.id_C 
                  JOIN Cart ON CartItems.cart_id = Cart.cart_id 
                  LEFT JOIN CourseCategories ON Courses.category_id = CourseCategories.category_id
                  WHERE Cart.user_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public static function deleteCartItem($cartItemId, $conn) {
        $sql = "DELETE FROM CartItems WHERE cart_item_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $cartItemId);
        $stmt->execute();
        $stmt->close();
    }
}

?>
