<?php
require_once './db_conn.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do-list</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main-section">
        <div class="add-section">
            <form action="app/add.php" method="POST" autocomplete="off">
                <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') : ?>
                    <input type="text" name="title" style="border-color: #ff6666" placeholder="Ce champ doit être rempli">
                    <button type="submit">Add &nbsp;<span>&#43;</span> </button>
                <?php else : ?>
                    <input type="text" name="title" placeholder="Que voulez-vous faire?">
                    <button type="submit">Add &nbsp;<span>&#43;</span> </button>
                <?php endif; ?>
            </form>
        </div>
        <?php
        $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
        ?>
        <?php if (isset($todos) && $todos->rowCount() <= 0) : ?>
            <div class="show-todo-section">
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/image1.jpg" width="95%" alt="image de bloc notes">
                        <img src="img/loader.gif" width="80%" alt="loader">
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="show-todo-section">
                <div class="todo-item">
                    <span id="<?= $todo['id']; ?>" class="remove-to-do">X</span>
                    <?php if ($todo['checked']) : ?>
                        <input type="checkbox" class="check-box" checked id="<?= $todo['id']; ?>">
                        <h2 class="checked"><?= $todo['title']; ?></h2>
                    <?php else : ?>
                        <input type="checkbox" class="check-box" id="<?= $todo['id']; ?>">
                        <h2><?= $todo['title']; ?></h2>
                    <?php endif; ?>
                    <small>created : <?= $todo['date_time']; ?></small>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <script src="js/app.js"></script>
</body>

</html>