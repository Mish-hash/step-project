<?php
function renderLislCategories() {
    $listDir = glob('images/*', GLOB_ONLYDIR);
    $listDir = preg_replace('/images\//', '',$listDir);
    foreach($listDir as $listDir) {
        echo "<option>{$listDir}</option>";
    }
}