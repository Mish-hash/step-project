<h1 class = 'text-center'>Contacts</h1>

   <?php showMessage() ?>



<form action="index.php?page=contacts" method="post">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control <?= getError('email') ? 'is-invalid' : ''?>"
               id="email" name="email" value="<?= getSession('oldInput')['email'] ?? null ?>">
        <?= getError('email') ? '<div class="invalid-feedback">' . getError('email') . '</div>' : '' ?>
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <img src="php_images/captcha.php" alt="">
        <input type="text" name="user-captcha" class="form-control"></input>
    </div>
    <button class="btn btn-primary" name="action" value="sendMail">Send</button>
</form>

