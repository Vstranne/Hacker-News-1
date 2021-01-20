<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Checking that everything from register is properly filled out.
if (isset($_POST['email'], $_POST['username'], $_POST['passphrase'])) {
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $passphrase = password_hash($_POST['passphrase'], PASSWORD_DEFAULT);
    $avatar = 'avatar-placeholder.png';
    $bio = 'Empty.';

    if (empty($email) || empty($username) || empty($passphrase)) {
        echo 'Fill in all the fields, please.';

        exit();
        // redirect('/gui-ls-register.php');
    }


    // Checking if e-mail already exists in database.
    $statement = $pdo->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $checkEmail = $statement->fetch(PDO::FETCH_ASSOC);
    if ($checkEmail && $checkEmail['email'] === $email) {
        echo 'We\'re sorry. That e-mail is already assigned to one of our users.';
        exit();
        // redirect('/gui-ls-register.php');
    };


    // Checking if username already exists in database.
    $statement = $pdo->prepare('SELECT username FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $checkUsername = $statement->fetch(PDO::FETCH_ASSOC);
    if ($checkUsername && $checkUsername['username'] === $username) {
        echo 'That username is taken. Try another one.';
        exit();
        // redirect('/gui-ls-register.php');
    };


    // If everything above goes through, inserts the new user to the database.
    $sql = "INSERT INTO users (email, username, passphrase, avatar, bio) VALUES (:email, :username, :passphrase, :avatar, :bio)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':passphrase', $passphrase, PDO::PARAM_STR);
    $statement->bindParam(':avatar', $avatar, PDO::PARAM_STR);
    $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
    $statement->execute();


    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Session for logging in the new user.
    $_SESSION['loggedIn'] = [
        'username' => $user['username'],
        'avatar' => $user['avatar'],
        'email' => $user['email'],
        'bio' => $user['bio'],
        'userId' => $user['id']
    ];

    // Take the user to the index page as soon as the registration is finished.
    redirect('../../index.php');
};

// If things don't go through - take the user back to the register page.
redirect('../../front/gui-ls-register.php');
