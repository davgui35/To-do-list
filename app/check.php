<?php

if (isset($_GET['id'])) {
    require_once '../db_conn.php';

    $id = $_GET['id'];

    if (empty($id)) {
        header('Location: ../index.php?checked=error');
    } else {
        $todos = $conn->prepare("SELECT id, checked FROM todos WHERE id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $userId = $todo['id'];
        $checked = $todo['checked'];
        $userChecked = $checked ? 0 : 1;
        $result = $conn->query("UPDATE todos SET checked=$userChecked WHERE id=$userId");

        if ($result) {
            header('Location: ../index.php?checked=sucess');
        } else {
            header('Location: ../index.php?checked=error');
        }
        $conn = null;
        exit();
    }
} else {
    header('Location: ../index.php?mess=error');
}
