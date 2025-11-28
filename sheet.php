<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $to = "graphicsmix378@gmail.com"; // Change to your email
    $subject = "New AFELUX Submission";
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $message = "Name: $name\nPhone: $phone\n";
    $headers = "From: no-reply@afelux.com";

    // Attachment (optional)
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image']['name'];
        move_uploaded_file($file_tmp, "uploads/".$file_name);
        $message .= "\nImage uploaded: uploads/$file_name";
    }

    mail($to, $subject, $message, $headers);
    echo "Form sent successfully!";
}
?>