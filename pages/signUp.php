<h1 class = 'text-center'>SignUp</h1>
<?php showMessage()?>
<form action="index.php?page=signUp.php" method="POST">
    <div class="form-group">
        <label for="userName">Your Name</label>
        <input type="text" class="form-control
        <?= getError('userName') ? 'is-invalid' : ''?>" id="userName" name="userName"
        value="<?= getSession('oldInput')['userName'] ?? null?>"
        >
        <?= getError('userName') ? '<div class="invalid-feedback">' . getError('userName') . '</div>' : ''?>
    </div>
    <div class="form-group">
        <label for="userEmail">Email</label>
        <input type="email" class="form-control
        <?= getError('userEmail') ? 'is-invalid' : '' ?>" id="userEmail" name="userEmail"
        value="<?= getSession('oldInput')['userEmail'] ?? null?>"
        >
        <?= getError('userEmail') ? '<div class="invalid-feedback">' . getError('userEmail') . '</div>' : '' ?>
    </div>
    <div class="form-group">
        <label for="userPassword">Password</label>
        <input type="password" class="form-control
        <?= getError('userPassword') ? 'is-invalid' : '' ?>" id="userPassword" name="userPassword"
        value="<?= getSession('oldInput')['userPassword'] ?? null?>"
        >
        <?= getError('userPassword') ? '<div class="invalid-feedback">' . getError('userPassword') . '</div>' : ''?>
    </div>
    <button class="btn btn-primary" name="action" value="signUp">Send</button>
</form>