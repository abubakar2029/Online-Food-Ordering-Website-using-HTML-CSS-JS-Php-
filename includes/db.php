<?php
$dsn = 'mysql: host=localhost; dbname=food_app';
$user = 'root';
$password = '';

// connect database
function connect_db()
{
    global $dsn, $user, $password;
    try {
        $pdo = new PDO($dsn, $user, $password);
        return $pdo;
    } catch (PDOException $e) {
        die('oops');
    }
}

// fetch all food_items
function get_menu($pdo)
{
    $sql = "SELECT * FROM food_items";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
