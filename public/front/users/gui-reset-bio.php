<?php require __DIR__ . '/../../header.php'; ?>

<article>
    <h1>Edit Bio</h1>

    <form action="/public/back/users/edit-bio.php" method="post">
        <div class="form-group">
            <label for="article">Type in your new bio here:</label>
            <textarea class="form-control" type="text" name="bio" id="bio" rows="3" placeholder="" required></textarea>
            <small>(max x characters long)</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>
