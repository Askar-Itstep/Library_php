<?php

namespace App\Views\Book\Forms;

use App\Views\Main;

class Edit extends Main
{
    public function content($data, $books, $authors)
    {
        // print_r($authors);
        // die;
?>
        <div class="block block-themed">
            <div class="block-header bg-primary">
                <h3 class="block-title">Edit book</h3>
            </div>
            <div class="block-content block-content-full">
                <form action="/books/edit" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="font-size-sm text-muted">
                                Enter the title, description and upload image
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                <label for="example-text-input-alt">Title</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input-alt" name="title" value="<?= $data['title'] ?>">
                            </div>
                            <select class="form-control" id="formControlSelect">
                                <?php
                                foreach ($authors as $key => $value) {
                                    echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                }
                                ?>
                            </select>
                            <div class="form-group">
                                <label for="example-textarea-input-alt">Decription</label>
                                <textarea class="form-control form-control-alt" id="example-textarea-input-alt" name="description" rows="7"><?= $data['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <img src="/<?= $data['image'] ?>" alt="image" width="100" style="border-radius: 20px; margin: 10px">
                                <label for="example-password-input-alt">Image</label>
                                <input type="file" class="form-control form-control-alt" id="example-password-input-alt" name="image" placeholder="Upload image">
                            </div>
                            <div class="custom-control custom-switch custom-control-primary custom-control-lg mb-2">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom-primary-lg2" name="status" checked="">
                                <label class="custom-control-label" for="example-sw-custom-primary-lg2">Status</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary float-right">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php
    }
}
