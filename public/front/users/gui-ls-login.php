<?php require __DIR__ . '/../../header.php'; ?>

<article>
    <h1>Login</h1>

    <?php if (isset($_SESSION['errors'])) : ?>
        <?php foreach ($_SESSION['errors'] as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Woopsie! 🙀</h4>
                <?php echo $error; ?></p>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']) ?>
    <?php endif; ?>

    <form action="/public/back/users/ls-login.php" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input class="form-control" type="text" name="username" id="username" required>
            <small class="form-text text-muted"></small>
        </div><!-- /form-group -->

        <div class="form-group">
            <span title="A passphrase is almost the same as a password. Instead of a just a single word however, we encourage our users to have at least four random words after each other. It's easy to remember and you reduce the risk of getting hacked. That way you're much safer off while surfing the web. If you have a password manager - even better!">
                <label for="passphrase">Passphrase:</label></span>
            <input class="form-control" type="password" name="passphrase" id="passphrase" required>
            <small class="form-text text-muted"></small>
        </div><!-- /form-group -->

        <!-- <a href="#">
            <p>Lost your passphrase? Click here.</p>
        </a> -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>

<br>

<a href="/public/front/users/gui-ls-register.php">
    <p>New to this place? Click here to register.</p>
</a>
