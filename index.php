<?php

// Connect to a database
$connect_db = mysqli_connect('localhost', 'root', '', 'php_mysql');

// Check connection
if(mysqli_connect_errno()){
    $error = mysqli_connect_error();
    echo "<script type='text/javascript'>alert('$error')</script>";
} else {
    echo "Connected to DB...";
}

// Character coding query
mysqli_query($connect_db, "SET NAMES 'utf8'");

// Query from PHP
$all_notes_query = mysqli_query($connect_db, "SELECT * FROM notes");

while($note = mysqli_fetch_assoc($all_notes_query)) {
    var_dump($note);
    echo $note['color'];
}

// Insert data from PHP
$note_five = "INSERT INTO notes VALUES(null, 'Note Five', 'Note Five description', 'purple')";

$insert_note_five = mysqli_query($connect_db, $note_five);

if($insert_note_five) {
    echo "Note five inserted correctly";
} else {
    echo "Error" . mysqli_error($connect_db);
}