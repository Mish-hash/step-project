<h2>Image upload and category management</h2>

<?php showMessage()?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card bg-light mb-6" style="max-width: 25rem;">
                <div class="card-header">Category management</div>
                <div class="card-body">
                <form action="index.php?page=upload-image" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">Create category</h4>
                    <input type="text" name="newDirectory" class="form-control" id="newDirectory"> <br>
                    <button class="btn btn-secondary" name="action" value="createDir">Create</button>
                </form>
                <form action="index.php?page=upload-image" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">Delete category</h4>
                    <select type="text" name="delDirectory" class="form-control" id="delDirectory">
                        <?php renderLislCategories() ?>
                    </select> <br>
                    <button class="btn btn-secondary" name="action" value="deleteDir">Delete</button>
                </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card bg-light mb-6" style="max-width: 25rem;">
                <div class="card-header">Управление изображениями</div>
                <div class="card-body">
                    <h4 class="card-title">Light card title</h4>
                    <p class="card-text"> e card's content.</p>
                </div>
            </div>
        </div>
    </div>

    <?php //renderLislCategories() ?>
</div>

