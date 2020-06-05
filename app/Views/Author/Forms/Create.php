<?php

namespace App\Views\Author\Forms;

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
                <form action="/authors/add" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="font-size-sm text-muted">
                                Enter the name and name author
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="example-text-input-alt">Name</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input-alt" name="author_name" placeholder="Authorname ...">
                            </div>
                            <div class="form-group">
                                <label for="example-textarea-input-alt">Biographia</label>
                                <textarea class="form-control form-control-alt" id="example-textarea-input-alt" name="biographia" rows="7" placeholder="Biographia ..."></textarea>
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
