<?php
class Cart {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addItem($userId, $courseId) {
        if ($this->isItemInCart($userId, $courseId)) {
            return false; // Item already in cart
        }

        // Add item to cart
        $stmt = $this->db->prepare("INSERT INTO CartItems (cart_id, course_id, quantity, price) SELECT cart_id, ?, 1, price FROM Courses WHERE id_C = ? AND NOT EXISTS (SELECT * FROM CartItems WHERE cart_id = (SELECT cart_id FROM Cart WHERE user_id = ?) AND course_id = ?)");
        $stmt->bind_param("iiii", $courseId, $courseId, $userId, $courseId);
        $stmt->execute();

        // Update total price
        $this->updateTotalPrice($userId);
        return true;
    }

    public function deleteCartItem($cartItemId, $userId) {
        $stmt = $this->db->prepare("DELETE FROM CartItems WHERE cart_item_id = ? AND cart_id = (SELECT cart_id FROM Cart WHERE user_id = ?)");
        $stmt->bind_param("ii", $cartItemId, $userId);
        $stmt->execute();

        // Update total price
        $this->updateTotalPrice($userId);
    }

    private function updateTotalPrice($userId) {
        $stmt = $this->db->prepare("UPDATE Cart SET total_price = (SELECT SUM(price * quantity) FROM CartItems WHERE cart_id = (SELECT cart_id FROM Cart WHERE user_id = ?)) WHERE user_id = ?");
        $stmt->bind_param("ii", $userId, $userId);
        $stmt->execute();
    }

    private function isItemInCart($userId, $courseId) {
        $stmt = $this->db->prepare("SELECT * FROM CartItems WHERE course_id = ? AND cart_id = (SELECT cart_id FROM Cart WHERE user_id = ?)");
        $stmt->bind_param("ii", $courseId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }
}



?>
