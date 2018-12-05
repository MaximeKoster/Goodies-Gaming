<?php

error_reporting( E_ALL );
ini_set('display_errors', 1);

echo App\Models\Catalogue::where('id', $_POST)->value('title');


/*
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
}
if (isset($_GET['title'])) {
    $title = $_GET['title'];
    if ($title != NULL) {
        echo $title;
    } else {
        echo "vide";
    }
}
*/
