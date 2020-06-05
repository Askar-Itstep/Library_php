<?php

namespace App\Views\Book\Forms;

use App\Views\Main;

class Show extends Main
{
    public function content($data, $books, $user)
    {
        ?>
        <main id="main-container">
            <div class="bg-image" style="background-image: url('/<?=$data['image'] ?>');">
                <div class="bg-primary-op">
                    <div class="content content-full overflow-hidden">
                        <div class="my-8 text-center">
                            <h1 class="text-white mb-2 js-appear-enabled animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown"><?=$data['title'] ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white">
                <div class="content content-boxed">
                    <div class="text-center font-size-sm push">
                        <span class="d-inline-block py-2 px-4 bg-body-light rounded">
                            <a class="link-effect font-w600" href="be_pages_generic_profile.html"><em>Author: </em> <?=$data['author_name'] ?></a>
                        </span>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-8">
                            <article class="story">
                                <p>
                                    <?=$data['description'] ?>
                                </p>
                            </article>

                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
    }
}