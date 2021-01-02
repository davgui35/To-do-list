<?php

if (isset($_POST['title'])) {
    require '../db_conn.php';

    $title = $_POST['title'];

    if (empty($title)) {
        header('Location: ../index.php?mess=error');
    } else {
        $insert = $conn->prepare("INSERT INTO todos(title) VALUES(?)");
        $result = $insert->execute([$title]);

        if ($result) {
            header("Location: ../index.php?mess=success");
        } else {
            header('Location: ../index.php');
        }

        $conn = null;
        exit();
    }
} else {
    header('Location: ../index.php?mess=error');
}
