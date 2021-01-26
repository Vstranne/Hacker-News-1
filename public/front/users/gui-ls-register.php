<?php
require __DIR__ . '/../../header.php';

?>


<h1>Register</h1>

<div class="register-container">
    <form action="../../back/users/register.php" method="post">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="username">Username:</label>
            <input class="form-control" type="text" name="username" id="username" maxlength="15" required>
            <small class="form-text text-muted">(15 characters maximum).</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <span title="A passphrase is almost the same as a password. Instead of a just a single word however, we encourage our users to have at least four random words after each other. It's easy to remember and you reduce the risk of getting hacked. That way you're much safer off while surfing the web. If you have a password manager - even better!">
                <label for="passphrase">Passphrase:</label></span>
            <input class="form-control" type="password" name="passphrase" id="passphrase" minlength="6" required>
            <small class="form-text text-muted">(6 characters minimum)</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary" name="register-submit">Submit</button>
    </form>
</div>

<br>

<a href="/public/front/users/gui-ls-login.php">
    <p>Already a member? Click here to get to our login page.</p>
</a>
