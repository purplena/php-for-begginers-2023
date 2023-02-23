<?php

use Core\App;
use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

$db = App::resolve(Database::class);
$errors = [];
$currentUserId = 1;

// Here we find our note
$note = $db->query('select * from notes where id = :id', [':id' => $_POST['id']])->findOrFail();

// Authorization
authorize($note['user_id'] === $currentUserId);

// Validation 
if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A post of no more tha 1 000 characters is required';
}

//If there are errors we return the view
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Your Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

//If there are no errors we proceed a query
$db->query('UPDATE notes SET body = :body where id = :id ', [
    ':body' => $_POST['body'],
    ':id' => $_POST['id']
]);

header('location: /notes');
die();
