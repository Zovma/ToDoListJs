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
        foreach ($result as $row) {
            $task[] = $row["task"];
            
        }

        ?>

        <script>
            $('.btn').bind('click', function() {
                if (inputValue() !== '') {
                    $('.input').val('')
                    console.log('btn click');
                }
            });


            var inPhp = <?php echo json_encode($task, JSON_HEX_TAG); ?>; 
            console.log(inPhp);
            createLi()

            $(window).ready(createLi())

            function createLi(){
                for(let i = 0; i < inPhp.length; i++){
                    $('.list').append('<li>'+ inPhp[i] + '<button/></li>')
                }
            }
        </script>


</body>

</html>