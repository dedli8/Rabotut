<?php
/* Article FructCode.com */
if (isset($_POST["name"]) && isset($_POST["category"]) && isset($_POST["city"]) && isset($_POST["description"]) && isset($_POST["type"]) && isset($_POST["sum"]) && isset($_POST["place"]) ) {

    // Формируем массив для JSON ответа
    $result = array(
        'name' => $_POST["name"],
        'category' => $_POST["category"],
        'city' => $_POST["city"],
        'description' => $_POST["description"],
        'type' => $_POST["type"],
        'sum' => $_POST["sum"],
        'place' => $_POST["place"]
    );

    // Переводим массив в JSON
    echo json_encode($result);
}

?>