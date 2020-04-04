<h2>Гостевая книга</h2>

<?php //showReviews() ?>

<form action="index.php?page=guest-book" method="POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="review">Review:</label>
        <textarea name="review" id="review" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary" name="action" value="sendReview">Send</button>
</form>