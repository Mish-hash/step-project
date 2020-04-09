<h2>Гостевая книга</h2>

<?php showMessage() ?>
<?php //showReviews() ?>


<form action="index.php?page=guest-book" method="POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control <?= getError('name') ? 'is-invalid' : ''?>"
        value="<?= getSession('oldInput')['name'] ?? null?>">

        <?= getError('name') ? '<div class="invalid-feedback">' . getError('name') . '</div>' : '' ?>
        
    </div>
    <div class="form-group">
        <label for="review">Review:</label>
        <textarea name="review" id="review" class="form-control <?= getError('review') ? 'is-invalid' : ''?>"></textarea>
        
        <?= getError('review') ? '<div class="invalid-feedback">' . getError('review') . '</div>' : '' ?>
    </div>
    <button class="btn btn-primary" name="action" value="sendReview">Send</button>
</form>