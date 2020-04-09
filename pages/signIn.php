<h1 class="text-center">Sign-In</h1>

<?php showMessage()?>

<form action="index.php?page=signIn.php" method="POST">
    <div class="form-group">
        <label for="signEmail">Enter your email</label>
        <input type="email" class="form-control
                <?= getError('signEmail') ? 'is-invalid' : '' ?>"
               id="signEmail" name="signEmail"
               value="<?= getSession('oldInput')['signEmail'] ?? null?>"
               placeholder="youremail@gmail.com"
        >
        <?= getError('signEmail') ? '<div class="invalid-feedback">' . getError('signEmail') . '</div>' : '' ?>
    </div>
    <div class="form-group">
        <label for="signPassword">Enter your password</label>
        <input type="password" class="form-control
                <?= getError('signPassword') ? 'is-invalid' : ''?>"
               id="signPassword" name="signPassword"
               value="<?= getSession('lodInput')['signPassword'] ?? null ?>"
               placeholder="123asdwW"
        >
        <?= getError('signPassword') ? '<div class="invalid-feedback">'. getError('signPassword') .'</div>' :'' ?>
    </div>
    <button class="btn btn-primary" name="action" value="signIn">SignIn</button>
</form>