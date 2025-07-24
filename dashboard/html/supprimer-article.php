<?php
require '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id_article']);

    if ($id > 0) {
        $stmt = $conn->prepare("DELETE FROM articles WHERE id_article = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'invalid';
    }

    $stmt->close();
    $conn->close();
}
?>
