<?php

require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
    $task = $_POST['task'];

    try {

        $stmt = $pdo->prepare("INSERT INTO tasks (task) VALUES (:task)");
        $stmt->execute(['task' => $task]);
    } catch (PDOException $e) {
        die("Error adding task: " . $e->getMessage());
    }
}

header("Location: index.php");
exit;
?>