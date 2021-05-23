<?php
   echo "<h2>Проверка правильности ввода данных</h2>";
    echo "Ваше Имя : ".$_POST['Name']."";
    echo "<br>";
    echo "Ваш телефон: ".$_POST['Telefon']."";
    echo "<br>";
    echo "Электронная почта: ".$_POST['Email']."";
    echo "<br>";
    echo "Ваш комментарий: ".$_POST['Komment']."";
    echo "<br>"; 
    

    //Данные для подключения к серверу MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Вводим название базы данных
    $dbname = "obratnaj_svjz";

    //Созданиие подключения
    $conn = mysqli_connect($servername, $username, $password, $obratnaj_svjz);
    mysqli_query($conn, 'set names utf8');

    //Проверка соединения с БД
    if (!$conn) {
    die("Подключение не выполнено: " . mysqli_connect_error());
    }

    //Строка с текстом sql запроса для таблицы 
    $sql = "INSERT INTO obratnaj_svjz.obratnaj_svjz (Name, Telefon,Email, Komment) 
   VALUES ('".$_POST['Name']."','".$_POST['Telefon']."','".$_POST['Email']."',
'".$_POST['Komment']."')";

    // mysqli_query($conn, $sql) - выполнение sql запроса

    //Проверка статуса выполнения sql запроса
    if (mysqli_query($conn, $sql)) {
    echo "Запись успешно добавлена</br>";
echo "<a href='Glavnaj.php'>На главную</a>";
     } else {
    echo "Ошибка добавления записи: " . $sql . "<br>" . mysqli_error($conn);
    }

    //Закрытие соединения
    mysqli_close($conn);

?>