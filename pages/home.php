<h2>PAINT</h2>

<img src="php_images/test.php?red=0&green=80&blue=0" alt="test">


<h2>Home</h2>

<?php //showMessage();?>

<?php 
    $sliders = glob('images/*', GLOB_ONLYDIR); //images/animals

    foreach($sliders as $slider) {
        $images = glob($slider . '/150x150_*');
        //print_r($images);

        echo '<div class="bg-secondary my-3 slider">';
        foreach($images as $img) {
            $big_img = str_replace('/150x150_', '/', $img);
            echo '<a href="' . $big_img . '"><img src="'.$img.'"></a>';
        }
        echo '</div>';
    }

    
?>






