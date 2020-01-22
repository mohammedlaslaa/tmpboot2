<?php

function disconnect()
{
    session_destroy();
    header("Location: index.php");
}

?>