<?php require __DIR__ . '/../../header.php';

if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif; ?>


<h2><i> 👋 Hello </i></h2>
<h1><?php echo $_SESSION['loggedIn']['username']; ?> </h1>
<br>

<?php $path = '/public/back/users/avatars/store/'; ?>
<img class="profile-picture" src="<?= $path . $_SESSION['loggedIn']['avatar']; ?> ">

<br>
<form action="/public/back/users/avatars/edit-avatar.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="avatar">Edit profile picture here:</label>
        <br>
        <input type="file" name="avatar" id="avatar" accept=".png, .jpg" required>
    </div>
    <br>
    <button type="button submit" class="btn btn-primary">Upload</button>
</form>
<br>

<br>
<br>
<div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
    <div class="card-header">Bio:</div>
    <div class="card-body">
        <p class="card-text"><?php echo $_SESSION['loggedIn']['bio']; ?></p>
    </div>
</div>
<br>
<br>

<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        ⚙️
    </a>
    <a href="/public/front/users/gui-acc-settings.php" class="list-group-item list-group-item-action">Account Settings</a>
    <a href="/public/front/users/gui-change-bio.php" class="list-group-item list-group-item-action">Edit Bio</a>
    <a href="/public/front/users/gui-acc-settings.php" class="list-group-item list-group-item-action">Manage Comments</a>
    <a href="/public/front/users/gui-acc-settings.php" class="list-group-item list-group-item-action">Manage Posts</a>
</div>
