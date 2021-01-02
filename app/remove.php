<?php

if (isset($_GET['id'])) {
    require_once '../db_conn.php';

    var_dump($_GET['id']);

    $id = $_GET['id'];

    if (empty($id)) {
        header('Location: ../index.php?mess=error');
    } else {
        $delete = $conn->prepare("DELETE FROM todos WHERE id=?");
        $result = $delete->execute([$id]);

        if ($result) {
            header('Location: ../index.php');
        } else {
            header('Location: ../index.php?mess=error');
        }
        $conn = null;
        exit();
    }
} else {
    header('Location: ../index.php?mess=error');
}
