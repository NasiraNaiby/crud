<?php
require 'connection.php';
$user = [
    'Name' => '',
    'Email' => '',
    'Password' => ''
];

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC) ?: $user;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'insert') {
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $stmt = $pdo->prepare("INSERT INTO user (Name,Email, Password) VALUES (?, ?, ?)");
        $stmt->execute([$Name, $Email,$Password]);

        header("Location: adminpage.php");
        exit();
    }
}
//deleting the user 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $pdo->beginTransaction();

    try {
        $stmt1 = $pdo->prepare("DELETE FROM user WHERE id = ?");
        $stmt1->execute([$id]);
        $pdo->commit();
        header("Location: adminpage.php");
        exit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Failed to delete records: " . $e->getMessage();
    }
}
//update the user

if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $stmt = $pdo->prepare("UPDATE user SET Name = ?, Email = ?, Password = ? WHERE id = ?");
    if ($stmt->execute([$Name, $Email, $Password, $id])) {
        header("Location: adminpage.php");
    } else {
        echo "Update failed.";
    }
}


?>
