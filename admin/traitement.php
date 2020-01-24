<?php
session_start();


if (isset($_POST['title']) && isset($_POST['txtarea'])) {
    $hey = json_encode($_POST);
    var_dump($hey);
}
?>