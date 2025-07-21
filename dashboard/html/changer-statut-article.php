<?php
require '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id_article']);
    $status = ($_POST['status'] === 'active') ? 'active' : 'disabled';

    $stmt = $conn->prepare("UPDATE articles SET status = ? WHERE id_article = ?");
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>
