<?php

class Card {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertCard($userId, $cardNumber, $expirationDate, $cvv) {
        $query = "INSERT INTO Cards (user_id, card_number, expiration_date, cvv) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("isss", $userId, $cardNumber, $expirationDate, $cvv);

        return $stmt->execute();
    }

    public function getCardInfo($cardId) {
        $query = "SELECT * FROM Cards WHERE card_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $cardId);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    // Autres méthodes en fonction des besoins (mettre à jour la carte, supprimer la carte, etc.)
}

// Exemple d'utilisation
include('back/connection.php');
$connection = new Connection();
$connection->selectDatabase('Projet');

// Créer une instance de la classe Card
$card = new Card($connection->conn);

// Exemple d'insertion d'une nouvelle carte
$userId = 1; // Remplacez ceci par l'ID de l'utilisateur réel
$cardNumber = '1234567890123456'; // Remplacez ceci par le vrai numéro de carte
$expirationDate = '2023-12-31'; // Remplacez ceci par la vraie date d'expiration
$cvv = 123; // Remplacez ceci par le vrai CVV

if ($card->insertCard($userId, $cardNumber, $expirationDate, $cvv)) {
    echo "Card inserted successfully.";
} else {
    echo "Failed to insert card.";
}

// Exemple de récupération des informations de la carte
$cardId = 1; // Remplacez ceci par l'ID de la carte réelle
$cardInfo = $card->getCardInfo($cardId);

if ($cardInfo) {
    echo "Card Information: ";
    print_r($cardInfo);
} else {
    echo "Card not found.";
}

// Fermez la connexion à la base de données si nécessaire
$connection->closeConnection();

?>
