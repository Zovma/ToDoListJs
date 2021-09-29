<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoListJs</title>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="index.css" </head>

<body>
    <div class='App'>
        <form method="POST">
            <input class="input" type="text" name="task">
            <input type="submit" value="Добавить">
        </form>
        <ul class="list"></ul>


        <script src="./index.js"></script>
    </div>

    <?php

    


    if (isset($_POST["task"])) {

        try {
            $conn = new PDO("mysql:host=localhost:3305;dbname=todolist", "root", "27109Dbd");
            $sql = "INSERT INTO list (task) VALUES (:task)";
            // определяем prepared statement
            $stmt = $conn->prepare($sql);
            // привязываем параметры к значениям
            $stmt->bindValue(":task", $_POST["task"]);
            // выполняем prepared statement
            $affectedRowsNumber = $stmt->execute();
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }

    $conn = new PDO("mysql:host=localhost:3305;dbname=todolist", "root", "27109Dbd");
    $sql = "SELECT * FROM list";
    $result = $conn->query($sql);
    $task = [];
    $idSql = [];
    foreach ($result as $row) {
        $task[] = $row['task'];
        $idSql[] = $row['id'];
    }

    ?>

    <script>
        var task = <?php echo json_encode($task, JSON_HEX_TAG); ?>;
        var idSql = <?php echo json_encode($idSql, JSON_HEX_TAG); ?>;
        console.log(task);
        console.log(idSql);

        $(window).ready(createLi())

        function createLi() {
            for (let i = 0; i < task.length; i++) {

                $('.list').append('<li>' + task[i] + '<form action="delete.php" method="post"> <input type = "hidden" name = "id" value = ' + idSql[i] + ' ><input type = "submit" value = "Удалить"></form></li>')
            }
        }
    </script>

</body>

</html>