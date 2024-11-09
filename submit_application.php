<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    $fullName = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $resumeFile = $_FILES['resume'] ?? '';

    if (empty($fullName) || empty($email) || empty($resumeFile)) {
        // If any required field is empty, return an error response
        http_response_code(400);
        echo json_encode(array("error" => "All fields are required."));
        exit;
    }

    // Handle uploaded resume file
    $uploadDir = 'uploads/';
    $resumePath = $uploadDir . basename($resumeFile['name']);
    if (move_uploaded_file($resumeFile['tmp_name'], $resumePath)) {
        // If file uploaded successfully, return success response
        echo json_encode(array("success" => "Application submitted successfully!"));
    } else {
        // If file upload failed, return error response
        http_response_code(500);
        echo json_encode(array("error" => "There was an error uploading your resume. Please try again later."));
    }
} else {
    // If request method is not POST, return error response
    http_response_code(405);
    echo json_encode(array("error" => "Method Not Allowed"));
}
?>
