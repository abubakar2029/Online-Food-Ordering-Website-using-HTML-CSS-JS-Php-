<html>
<?php
$errors = [];
// Declaring varibales through chain assignment
$email = $subject = $message = ""; 

if (isset($_POST['send'])) {
    // Read Data
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
// Check Data
if (!$email)$errors['email'] = 'Email is required';
if (!$subject) $errors['subject'] = 'Subject is required';
if (!$message) $errors['message'] = 'Message is required';

// Success Response
if (empty($errors)) 
    $submitResponse = "Your message has been sent successfully!";

}
// Page Elements
$pageTitle = 'Contact';
$pageHeading = 'Contact Us'

?>
<?php include 'components/header.php' ?>
<body>
    <main>

<!-- Success or Error Section -->
 <div id="response">

 </div>

 <!-- Contact Form -->
  <form action="" method="post" id="contact">
<p>
    <label for="email">Email</label>
    <input name="email" id="email" type="text" value="<?=$email?>" required >
</p>
<p>
    <label for="subject">Subject</label>
    <input name="subject" id="subject" type="text" value="<?=$subject?>" required>
</p>
<p>
    <label for="message">Message</label>
    <textarea name="message" id="message" value="<?=$message?>"></textarea>
</p>
<p>
    <button type="submit" name="send-btn">Send Message</button>
</p>
  </form>
    </main>
    <?php include 'components/footer.php'; ?>
</body>
</html>