<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Task</title>
</head>
<body>
    <h1>МОНИТОРИНГ</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Номер талона</th>
                <th>Цель посещения</th>
                <th>ИИН</th>
                <th>Дата бронирования</th>
                <th>Время бронирования</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $database = "task_db";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }
                $sql = "SELECT * FROM `users`";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while($row = $result->fetch_assoc()) {
                     echo "
                     <tr>
                        <td>$row[id]</td>
                        <td>$row[iin]</td>
                        <td>$row[goal]</td>
                        <td>$row[date]</td>
                        <td>$row[time]</td>
                        <td>$row[operation]</td>
                    </tr>
                     ";
                }
            ?>
        </tbody>
    </table>
    <div class="button">
        <form method="post" action="report.php">
            <button type="sybmit" id="pdf" name="report">pdf выгрузкка</button>
        </form>
    </div>
</body>
</html>