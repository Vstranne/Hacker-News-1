<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<!-- Sign in form. -->
<a class="navLink" href="/index.php">Home</a>
<link rel="stylesheet" href="/assets/styles/app.css">


<form action="app/users/login.php" method="post">

	<section>
		<label for="email">E-mail:</label>
		<input type="email">
	</section>

	<br>

	<section>
		<label for="password">Passphrase:</label>
		<input type="password">
	</section>

	<br>

	<p><b>Forgot your password?</b></p>

	<button>Sign in</button>

</form>

<p>Are you new to our site?</p>
<p>Click <a class="sign-up-link" href="/sign-up.php"><b><u>here</u></b></a> to create an account.</p>