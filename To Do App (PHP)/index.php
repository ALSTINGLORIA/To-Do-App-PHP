<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $task = trim($_POST['task']);
    if (!empty($task)) {
        $_SESSION['tasks'][] = $task;
    }
}


if (isset($_GET['delete'])) {
    $taskIndex = $_GET['delete'];
    if (isset($_SESSION['tasks'][$taskIndex])) {
        unset($_SESSION['tasks'][$taskIndex]);
        $_SESSION['tasks'] = array_values($_SESSION['tasks']); 
    }
}

include 'index.html';
?>
