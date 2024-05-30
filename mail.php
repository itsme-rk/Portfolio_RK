<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['Name'];
  $email = $_POST['E-mail'];
  $phone = $_POST['Phone'];
  $message = $_POST['Message'];

  // Validate inputs
  if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    http_response_code(400);
    echo "Please fill all required fields.";
    exit;
  }

  // Recipient email
  $to = "your-email@example.com";
  $subject = "Contact Form Message";

  // Email content
  $content = "Name: $name\n";
  $content .= "Email: $email\n";
  $content .= "Phone: $phone\n";
  $content .= "Message: $message\n";

  // Email headers
  $headers = "From: $email";

  // Send email
  if (mail($to, $subject, $content, $headers)) {
    http_response_code(200);
    echo "Thank you for your message.";
  } else {
    http_response_code(500);
    echo "Something went wrong.";
  }
} else {
  http_response_code(403);
  echo "Invalid request.";
}
?>
