<?php

namespace App\Views\Book\Forms;

use App\Views\Main;

class Create extends Main
{
    public function content($data, $books, $users)
    {
?>
        <div class="block block-themed">
            <div class="block-header bg-success">
                <h3 class="block-title">Create book</h3>
            </div>
            <div class="block-content block-content-full">
                <form action="/books/add" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="font-size-sm text-muted">
                                Enter the title, description and upload image
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="formControlSelect">Author</label>
                                <select class="form-control" id="formControlSelect">
                                    <?php
                                    foreach ($data as $key => $value) {
                                        foreach ($value as $key2 => $value2) {
                                            echo '<option value="' . $value2['id'] . '">' . $value2['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input-alt">Title</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input-alt" name="title" placeholder="Title ...">
                            </div>
                            <div class="form-group">
                                <label for="example-textarea-input-alt">Decription</label>
                                <textarea class="form-control form-control-alt" id="example-textarea-input-alt" name="description" rows="7" placeholder="Description ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="example-password-input-alt">Image</label>
                                <input type="file" class="form-control form-control-alt" id="example-password-input-alt" name="image" placeholder="Upload image">
                            </div>
                            <div class="custom-control custom-switch custom-control-success custom-control-lg mb-2">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom-success-lg2" name="status" checked="">
                                <label class="custom-control-label" for="example-sw-custom-success-lg2">Status</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-success float-right">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php
    }
}
