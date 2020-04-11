<h1>Home</h1>

<?php //showMessage();?>

<?php 
    $sliders = glob('images/*', GLOB_ONLYDIR); //images/animals

    foreach($sliders as $slider) {
        $images = glob($slider . '/150x150_*');
        print_r($images);

        echo '<div class="bg-secondary my-3 slider">';
        foreach($images as $img) {
            echo '<img src="'.$img.'">';
        }
        echo '</div>';
    }

    
?>


