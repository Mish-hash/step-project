<?php
$action = $_POST['action'] ?? null; //sendMail
if ($action) {
    $action(); //sendMail
}

function sendMail() {
    $email = htmlentities(trim($_POST['email'] ?? null));
    $message = htmlentities(trim($_POST['message'] ?? null));
    $errors = [];
    if (!$email) {$errors['email'] = 'Email is required' ;}
    if (!$message) {$errors['message'] = 'Message is required' ;}

    if ($errors) {
        setSession('oldInput', compact('email', 'message'));
        setMessage($errors, 'danger');
    }
    else { setMessage('Thanks for the mail', 'success');}
   redirect('contacts');

}
function signUp() {
    $userName = htmlentities(trim($_POST['userName'] ?? null));
    $userEmail = htmlentities(trim($_POST['userEmail'] ?? null));
    $userPassword = htmlentities(trim($_POST['userPassword'] ?? null));
    $errors = [];
    if(!$userName) {$errors['userName'] = 'Name is required';}
    if(!$userEmail) {
        $errors['userEmail'] = 'Email is required';
    }elseif (!preg_match("/^[0-9a-z_\.]+@[0-9a-z_^\.]+\.[a-z]{2,6}$/i", $userEmail)) {
        $errors['signEmail'] = 'you entered an invalid Email. Enter on pattern mail@gmail.com ';
    }

    if(!$userPassword) {
        $errors['userPassword'] = 'Password is required';
    }elseif (!preg_match("/(?=[#$:-?{-~!\"^_`\[\]a-zA-Z]*([0-9#$:-?{-~!\"^_`\[\]]))(?=[#$:-?{-~!\"^_`\[\]a-zA-Z0-9]*[a-zA-Z])[#$:-?{-~!\"^_`\[\]a-zA-Z0-9]{8,}/i", $userPassword)) {
        $errors['signPassword'] = 'Invalid password';
    }
    if($errors) {
        setSession('oldInput', compact('userName', 'userEmail', 'userPassword'));
        setMessage($errors, 'danger');
    }else {
        setMessage("Welcome  $userName",'success' );
    }
    if(!$errors) {
        setSession('user', $userName);
        redirect('home');
        setMessage("welcome $userName", 'success');
    }else{
        redirect('signUp');
    }

}
function signIn() {
    $signEmail = htmlentities(trim($_POST['signEmail'] ?? null));
    $signPassword = htmlentities(trim($_POST['signPassword'] ?? null));
    $errors = [];
    if(!$signEmail) {
        $errors['signEmail'] = 'Email is required';
    }elseif (!preg_match("/^[0-9a-z_\.]+@[0-9a-z_^\.]+\.[a-z]{2,6}$/i", $signEmail)) {
        $errors['signEmail'] = 'you entered an invalid Email. Enter on pattern mail@gmail.com ';
    }

    if(!$signPassword) {
        $errors['signPassword'] = 'Password is required';
    }elseif (!preg_match("/(?=[#$:-?{-~!\"^_`\[\]a-zA-Z]*([0-9#$:-?{-~!\"^_`\[\]]))(?=[#$:-?{-~!\"^_`\[\]a-zA-Z0-9]*[a-zA-Z])[#$:-?{-~!\"^_`\[\]a-zA-Z0-9]{8,}/i", $signPassword)) {
        $errors['signPassword'] = 'Invalid password';
    }
    if($errors) {
        setSession('oldInput', compact('signEmail', 'signPassword'));
        setMessage($errors, 'danger');
    }else {
        setMessage('Welcome', 'success' );
    }
    if(!$errors) {

        redirect('home');

    }else redirect('signIn');
}

function redirect($page) {
    header('Location: index.php?page=' . $page);
    exit();
}

function uploadImage() {
    $file = $_FILES['file'] ?? null;

    $fName = saveFile($file, 'images');
    if ($fName){
        cropImage('images/' . $fName, 150);
        resizeImage('images/' . $fName, 500);
        setMessage('File upload', 'success');
        redirect('uploads');
    }
}

function resizeImage($path, $w_dest) {
    $src = imagecreatefromjpeg($path);
    $w_src = imagesx($src); // ширина оригинального изображения
    $h_src = imagesy($src); // высота оригинального изображения

    $h_dest = $h_src / ($w_src / $w_dest);
    $dest = imagecreatetruecolor($w_dest, $h_dest);

    imagecopyresized( $dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src );

    list($dir, $fName) = explode('/', $path);
    $fName = "{$w_dest}x{$h_dest}_{$fName}";
    imagejpeg($dest,  $dir . '/' . $fName);
}

function saveFile($file, $dir) {
    if(!$file || $file['error'] == 4) {
        setMessage('File is required', 'danger');
        redirect('uploads');

    } 
    if($file['size'] > 10 * 1024 * 1024) {
        setMessage('File must be 1Mb', 'danger');
        redirect('uploads');
    }

    $arrMime = [
        'image/jpg',
        'image/jpeg',
        'image/gif',
        'image/png',
    ];

    if ( !in_array( $file['type'], $arrMime) ) {
        setMessage('File must be image', 'danger');
        redirect('uploads');

    }

    if($file && !$file['error'] == 4) {
        if(!file_exists($dir)) {
            mkdir($dir);
        }
        $fName = time() . '_' . rand(10, 1000) . $file['name'];
        move_uploaded_file( $file['tmp_name'], $dir . '/' . $fName );
        return $fName;
    }
}

function cropImage($path, $size) {
    $src = imagecreatefromjpeg($path);
    $w_src = imagesx($src); // ширина оригинального изображения
    $h_src = imagesy($src); // высота оригинального изображения

    $dest = imagecreatetruecolor($size, $size);

    if ($w_src > $h_src) {
        imagecopyresized( $dest, $src, 0, 0, ($w_src - $h_src) / 2, 0, $size, $size, $h_src, $h_src );
    }
    else {
        imagecopyresized( $dest, $src, 0, 0, 0, ($h_src - $w_src) / 2, $size, $size, $w_src, $w_src );
    }

    list($dir, $fName) = explode('/', $path);
    $fName = "{$size}x{$size}_{$fName}";
    imagejpeg($dest,  $dir . '/' . $fName);
}

function sendReview() {
    $name = $_POST['name'] ?? null;
    $review = $_POST['review'] ?? null;
    $str = $name . '|' . $review . '|' . time() . "\r\n";
    $file = fopen('reviews.txt', 'a+');

    fwrite($file, $str);
    fclose($file);
    redirect('guest-book');
}

/* function showReviews() {

} */


