<?php
session_start();

if (isset($_POST)) {
    $errors = []; // Initialize an empty array to store errors

    // Validate first name (presence and minimum length)
    if (empty($_POST['first_name']) || strlen($_POST['first_name']) < 2) {
        $errors['first_name'] = 'First name is required and must be at least 2 characters long.';
    }

    // Validate email (presence and valid format)
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    // Handle errors and submit success
    if (count($errors) > 0) {
        // AJAX request: Return JSON
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            echo json_encode($errors);
            exit;
        }

        // Non-AJAX or JavaScript disabled: Display errors as an unordered list
        echo '<ul>';
        foreach ($errors as $key => $value) {
            echo '<li>' . htmlspecialchars($value) . '</li>'; // Escape for security
        }
        echo '</ul>';
        exit;
    } else {
        // Form validation successful! Process data here
        // Access validated data using $_POST (e.g., $_POST['first_name'], $_POST['email'])
        // ... your data processing logic here ...
    }
}
