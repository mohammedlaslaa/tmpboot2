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
    foreach ($resultCat as $value) {
        if ($id == $value['id']) {
            unset($resultCat[$value['id']]);
        }
    }
    $resultfinal = json_encode($resultCat, JSON_PRETTY_PRINT);
    file_put_contents($file, $resultfinal);
}