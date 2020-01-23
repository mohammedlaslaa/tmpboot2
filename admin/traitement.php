<?php
session_start();
$jsonto = json_decode(file_get_contents('../data/articles.json'), true);
echo $_POST['title'];
?>