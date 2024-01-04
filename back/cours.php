<?php
class Course {
    private $id;          
    private $image;
    private $title;
    private $category;
    private $price;

    public function __construct($id, $image, $title, $category, $price) {
        $this->id = $id;   
        $this->image = $image;
        $this->title = $title;
        $this->category = $category;
        $this->price = $price;
    }

    // Getter method for id
    public function getId() {
        return $this->id;
    }

    public function displayCourse() {
        echo "<div class='item'>";
        echo "<img src='{$this->image}' alt='{$this->title}'><br><br>";
        echo "<div class='title'>{$this->title}</div>";
        echo "<div class='price'>$ {$this->price}</div>";
        echo '<form action="back/addtocart.php" method="post">';
        echo '<input type="hidden" name="course_id" value="' . $this->id . '">';
        echo '<input type="submit" name="add_to_cart" value="Add to Cart">';
        echo '</form>';
        echo "</div>";
    }

    public static function  selectAllCourses($tableName,$conn){
        $sql = "SELECT * FROM $tableName ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $data=[];
                while($row = mysqli_fetch_assoc($result)) {
                
                    $data[]=$row;
                }
                return $data;
            }
        }
}
    
function getCourseById($id, $courses) {
    foreach ($courses as $course) {
        if ($course->getId() == $id) {
            return $course;
        }
    }
    return null;
}
?>
