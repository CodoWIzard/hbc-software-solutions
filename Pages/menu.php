<?php
$query = "SELECT * FROM menu_items";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<div class="menu">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="menu-item">';
        echo '<img src="images/' . $row['image'] . '" alt="' . $row['name'] . '">';
        echo '<h3>' . $row['name'] . '</h3>';
        echo '<p>€' . number_format($row['price'], 2) . '</p>';
        echo '<button class="add-to-cart" data-id="' . $row['id'] . '">Add to Cart</button>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo 'No menu items found.';
}
?>