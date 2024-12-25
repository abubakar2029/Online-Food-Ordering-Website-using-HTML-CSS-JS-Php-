<?php
$errors = [];
$email = $subject = $message = "";

if (isset($_POST['send'])) {
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (!$email) {
        $errors['email'] = 'Email is required';
    }
    if (!$subject) {
        $errors['subject'] = 'Subject is required';
    }
    if (!$message) {
        $errors['message'] = 'Message is required';
    }

    if (empty($errors)) {
        $submitResponse = "Your message has been sent successfully!";
    }
}

$pageTitle = 'Contact';
$pageHeading = 'Contact Us';
?>
<?php include 'includes/head.php'; ?>

<main class="min-h-screen bg-gray-50 flex items-center justify-center px-4">
    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center"><?= $pageHeading ?></h1>
        
        <!-- Success Message -->
        <?php if (!empty($submitResponse)) : ?>
            <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded">
                <?= $submitResponse ?>
            </div>
        <?php endif; ?>

        <!-- Error Messages -->
        <?php if (!empty($errors)) : ?>
            <div class="mb-4 p-4 text-red-800 bg-red-100 border border-red-300 rounded">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Contact Form -->
        <form action="" method="post" id="contact" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input name="email" id="email" type="text" value="<?= $email ?>" 
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    required>
            </div>
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                <input name="subject" id="subject" type="text" value="<?= $subject ?>" 
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    required>
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea name="message" id="message" 
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    rows="4"><?= $message ?></textarea>
            </div>
            <div>
                <button type="submit" name="send" 
                    class="w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Send Message
                </button>
            </div>
        </form>
    </div>
</main>

<?php include 'components/footer.php'; ?>
</body>
</html>
