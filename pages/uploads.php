<h2>Загрузка изображений</h2>

<div class="container">
    <div class="row">
        <div class="col-6">
            <?php showMessage() ?>
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file"> <br>
                <button class="btn btn-primary" name="action" value="uploadImage">Send</button>
            </form>
        </div>
        <div class="col-6"></div>
    </div>
    <?php 
        /* $dir = opendir('images');

        while($file = readdir($dir)) {
            if($file != '.' && $file != '..') {
                echo $file . '<br>';
            }
        }

        closedir($dir); */

        /* $files = scandir('images');
        foreach($files as $file) {
            if($file != '.' && $file != '..' && !is_dir('images/' . $file)) {
                echo $file . '<br>';
            }
        } */

        $files = glob('images/*.jpg');
        foreach($files as $file):
        ?>
            <a href="<?= $file ?>" download> Download <?= $file ?> </a> <br>
        <?php endforeach ?>

</div>