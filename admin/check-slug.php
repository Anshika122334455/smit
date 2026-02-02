<?php
include 'includes/db.php'; // Include your database connection file

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['slug'])) {
    $slug = trim($_POST['slug']);
    
    // Prepare and execute query to check if slug exists
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM blogs WHERE slug = ?");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    // Return JSON response
    if ($row['count'] > 0) {
        echo json_encode(['available' => false]);
    } else {
        echo json_encode(['available' => true]);
    }
    
    $stmt->close();
} else {
    echo json_encode(['available' => true]);
}
?>