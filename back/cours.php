<?php
class Course {
    private $image;
    private $title;
    private $category;
    private $price;

    public function __construct($image, $title, $category, $price) {
        $this->image = $image;
        $this->title = $title;
        $this->category = $category;
        $this->price = $price;
    }
    public function displayCourse() {
        echo "<div class='course'>";
        echo "<img src='{$this->image}' alt='{$this->title}' width='50%' height='50%'>";
        echo "<h3>{$this->title}</h3>";
        echo "<p>Category: {$this->category}</p>";
        echo "<p>Price: $ {$this->price}</p>";
        echo "</div>";
    }

}
$course = new Course('images/whatisJS.jpeg', 'The Basics Of Javascript', 'JS', 29.9);
$course->displayCourse();

?>

