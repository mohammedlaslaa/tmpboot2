<?php

function disconnect()
{
    session_destroy();
    header("Location: index.php");
}

function deleteElementData($id, $filename)
{
    $file = DATA_PATH . $filename;
    $category = file_get_contents($file);
    $resultCat = json_decode($category, true);
    foreach ($resultCat as $key => $value) {
        if ($id == $value['id']) {
            unset($resultCat[$key]);
        }
    }
    $resultfinal = json_encode($resultCat, JSON_PRETTY_PRINT);
    file_put_contents($file, $resultfinal);
}

function auth()
{
    if (isset($_SESSION['user_right']) && $_SESSION['user_right'] < ADMIN) {
        // die('Direct access not permitted'); or
        header("Location: http://localhost/tmpboot2");
    };
}

function setsession($arg, &$arg2)
{
    if (isset($_GET['edit'])) {
        $_SESSION['value'] = $_GET['edit'];
        foreach ($arg as $val) {
            if ($_GET['edit'] == $val['id']) {
                $arg2 = $val['name'];
            }
        }
    };
}

function getUsers()
{
    return json_decode(file_get_contents('../data/user.json'), true);
}

function getArticles()
{
    return json_decode(file_get_contents('../data/articles.json'), true);
}

function getCategories()
{
    return json_decode(file_get_contents('../data/categories.json'), true);
}
