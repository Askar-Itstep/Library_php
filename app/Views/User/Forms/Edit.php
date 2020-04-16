<?php


namespace App\Views\User\Forms;


use App\Views\Main;

class Edit extends Main
{
    public function content($data = [])
    {
        ?>

        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Edit User</h3>
            </div>
            <div class="block-content block-content-full">
                <form action="/user/edit" method="POST">
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="font-size-sm text-muted">
    Inter user name, email, password
    </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <input type="hidden" name="id" value="<?php $data['id']; ?>">
                            <div class="form-group">
                                <label for="example-text-input-alt">User name</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input-alt" name="example-text-input-alt" value="<?=$data['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input-alt">E-mail</label>
                                <input type="email" class="form-control form-control-alt" id="example-text-input-alt" name="example-text-input-alt" value="<?=$data['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="example-password-input-alt">Password</label>
                                <input type="password" class="form-control form-control-alt" id="example-password-input-alt" name="example-password-input-alt" placeholder="Password..">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-danger float-left">Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php
    }

}