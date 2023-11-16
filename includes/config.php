<?php

//
//// Change  db connect information.
//$username = 'root';
//$password = 'password';
//// Database connection.
//try {
//    $db = new PDO("mysql:host=mysql", $username, $password);
//    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//
//    // Creating a database if it does not exist.
//    $db->exec("CREATE DATABASE IF NOT EXISTS test_db");
//
//    // After creating the database, select it.
//    $db->exec("USE test_db");
//
//    // Checking the presence of the "results" table.
//    $resultsTableCheck = $db->query("SELECT 1 FROM results LIMIT 1");
//    if ($resultsTableCheck === false) {
//        $createTableQuery = "
//            CREATE TABLE results (
//                id INT AUTO_INCREMENT PRIMARY KEY,
//                name VARCHAR(255),
//                total INT,
//                correct INT,
//                incorrect INT)";
//        $db->exec($createTableQuery);
//    }
//} catch (PDOException $e) {
//    exit('Connection error: ' . $e->getMessage());
//}
//
//// data Questions.
//$questions_and_answers = json_decode(file_get_contents("../assets/data/questions.json"), true);
