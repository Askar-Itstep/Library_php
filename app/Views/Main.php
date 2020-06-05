<?php


namespace App\Views;


class Main
{
    public function render($data = [], $booksOrders = [], $users = [])
    {
        // print_r($users);//(localhost/books):$users == $authors! (стр. 25 BookControll.)
        // // print_r($booksOrders);
        // die;
?>

        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

            <title>Home Page</title>

            <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
            <meta name="author" content="pixelcave">
            <meta name="robots" content="noindex, nofollow">

            <!-- Open Graph Meta -->
            <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
            <meta property="og:site_name" content="OneUI">
            <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
            <meta property="og:type" content="website">
            <meta property="og:url" content="">
            <meta property="og:image" content="">


            <link rel="shortcut icon" href="/assets/media/favicons/favicon.png">
            <link rel="icon" type="image/png" sizes="192x192" href="/assets/media/favicons/favicon-192x192.png">
            <link rel="apple-touch-icon" sizes="180x180" href="/assets/media/favicons/apple-touch-icon-180x180.png">

            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
            <link rel="stylesheet" id="css-main" href="/assets/css/oneui.min.css">
            <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        </head>

        <body>
            <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
                <h1 class="d-flex justify-content-center" >Новая Библиотека</h1>
                <h3 class="d-flex justify-content-center">("чистое PHP")</h3>
                <nav id="sidebar" aria-label="Main Navigation">
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="/">
                                    <i class="nav-main-link-icon si si-speedometer"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">User Interface</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon si si-energy"></i>
                                    <span class="nav-main-link-name">Users</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="/users">
                                            <span class="nav-main-link-name">All Users</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="/user/add">
                                            <span class="nav-main-link-name">New User</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-heading">Books Interface</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon si si-energy"></i>
                                    <span class="nav-main-link-name">Books</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="/books">
                                            <span class="nav-main-link-name">All books</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="/books/add">
                                            <span class="nav-main-link-name">New book</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon si si-energy"></i>
                                    <span class="nav-main-link-name">Authors</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="/authors">
                                            <span class="nav-main-link-name">All authors</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="/authors/add">
                                            <span class="nav-main-link-name">New author</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-heading">Order Interface</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon si si-energy"></i>
                                    <span class="nav-main-link-name">Orders</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="/orders">
                                            <span class="nav-main-link-name">All Orders</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <header id="page-header">

                    <div id="page-header-search" class="overlay-header bg-white">
                        <div class="content-header">
                            <form class="w-100" action="be_pages_generic_search.html" method="POST">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                        <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                                            <i class="fa fa-fw fa-times-circle"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="page-header-loader" class="overlay-header bg-white">
                        <div class="content-header">
                            <div class="w-100 text-center">
                                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                            </div>
                        </div>
                    </div>
                </header>
                <!--154.Main -------------------------------------------my content --------------------------------------------------------------->
                <main id="main-container">
                    <div class="content">
                        <?= $this->content($data, $booksOrders, $users) ?>
                    </div>
                </main>

                <footer id="page-footer" class="bg-body-light">
                    <div class="content py-3">
                        <div class="row font-size-sm">
                            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                                Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                            </div>
                            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                                <a class="font-w600" href="https://1.envato.market/xWy" target="_blank">OneUI 4.3</a> &copy; <span data-toggle="year-copy"></span>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

            <script src="/assets/js/oneui.core.min.js"></script>
            <script src="/assets/js/oneui.app.min.js"></script>
            <script src="/assets/js/jquery2.js"></script>
        </body>

        </html>

        <?php
    }
    //============================================== my functions =========================================================
    // 185.Main --------------Dashboard-------------------------------------------------------
    public function content($data, $books, $authors)
    {
        // print_r($authors);
        // die;
        foreach ($data as $item) {
        ?>
            <div class="block">
                <div class="block-content">
                    <div class="row items-push">
                        <div class="col-md-4 col-lg-5">
                            <a href="be_pages_blog_story.html">
                                <img class="img-fluid" src="<?= $item['image'] ?>" alt="" width="300">
                            </a>
                        </div>
                        <div class="col-md-8 col-lg-7">
                            <h4 class="h3 mb-1">
                                <a class="text-primary-dark" href="#"><?= $item['title']; ?></a>
                            </h4>
                            <div class="font-size-sm mb-3">
                                <a href="authors/edit?id=<?= $item['author_id'] ?>"><em class="text-muted">Author:
                                    </em> <?php
                                            foreach ($authors as $key => $value) {
                                                // print_r($key);
                                                // print_r($item['author_id']);
                                                if ($key+1 == $item['author_id']) {
                                                    echo $value['name'];
                                                }
                                            }
                                            ?>
                                </a>
                            </div>
                            <p class="font-size-sm">
                                <?php
                                if (strlen($item['description']) > 255) {
                                    echo '<td class="font-w600 font-size-sm">' . substr($item['description'], 0, 255) . '... </td>';
                                }
                                ?>
                            </p>
                            <a class="btn btn-sm btn-light" href="/books/show?id=<?= $item['id'] ?>">Continue Reading..</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }

    //---------------------------------вызывается только в наследниках!-----------------------------------------
    public function table($data, $options, $books = 0, $users = 0)
    {
        // print_r($users);
        // die;
        function getUserName($user_id, $users)  //$data[$options]->$user_id,  /books: $users = $authors
        {
            // echo $user_id;   //2!
            // print_r($users);
            // die;
            foreach ($users as $indx => $user) {
                $currId = 0;
                foreach ($user as $key => $value) {
                    if ($key == 'id') {
                        $currId =  $value;
                    }
                    if ($key == 'name' && $user_id == $currId) {
                        // echo $currId;
                        return ($value);
                    }
                }
            }
        }
        function getBookTitle($book_id, $books)
        {
            // echo $book_id . '<br>';
            // print_r($books);
            // die;
            foreach ($books as $indx => $user) {
                $currId = 0;
                foreach ($user as $key => $value) {
                    if ($key == 'id') {
                        $currId =  $value;
                    }
                    if ($key == 'title' && $book_id == $currId) {
                        // echo $currId;
                        return ($value);
                    }
                }
            }
        }
        ?>
        <div class="block">
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <?php
                                if ($_SERVER['REQUEST_URI'] === '/users') {
                                    echo '<th class="text-center" style="width: 100px;">
                                    <i class="far fa-user"></i>
                                </th>';
                                }
                                //----------отрисовка шапки табл. ---------------------------------
                                foreach ($options as $key => $option) {
                                    if ($key == 'actions') {
                                        echo '<th class="text-center" style="width: 100px">Actions</th>';
                                    } elseif ($key == 'id') {
                                        echo '<th style="width: 5%;">' . $option['label'] . '</th>';
                                    } elseif ($key == 'biographia') {
                                        echo '<th style="width: 55%;">' . $option['label'] . '</th>';
                                    } else {
                                        echo '<th style="width: 30%;">' . $option['label'] . '</th>';
                                    }
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //--------------- отрисовка строк табл -----------------------------------
                            foreach ($data as $row => $item) {
                            ?>
                                <tr>
                                    <?php
                                    if ($_SERVER['REQUEST_URI'] === '/users') {
                                        echo    '<td class="text-center">
                                    <img class="img-avatar img-avatar48" src="/assets/media/avatars/avatar2.jpg" alt="">
                                </td>';
                                    }
                                    foreach ($options as $col => $option) {
                                        if ($col == 'actions') {
                                            echo '<td class="text-center"><div class="btn-group">';
                                            foreach ($option as $button) {
                                                echo '<a href="' . $button['route'] . '?id=' . $item['id'] . '" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip" title="'
                                                    . $key . '" data-original-title="Edit"><i class="fa fa-fw ' . $button['icon'] . '"></i></a>';
                                            }
                                            echo '</div></td>';
                                        } else if ($col == 'image') {
                                            echo '<td><img src="' . $item[$col] . '" alt="image" width="150" style="border-radius:20px"></td>';
                                        } else if ($col == 'status') {
                                            echo $item[$col] == 'on' ? '<td><i class="far fa-check-circle fa-2x text-success ajaxSubmit" data-id="'
                                                . $item['id'] . '"></i></td>' : '<td><i class="fa fa-ban fa-2x text-danger ajaxSubmit" data-id="' . $item['id'] . '"></i></td>';
                                        } else {
                                            if ($_SERVER['REQUEST_URI'] === '/books' && strlen($item[$col]) > 255) {
                                                echo '<td class="font-w600 font-size-sm">' . substr($item[$col], 0, 100) . '... </td>';
                                            } elseif ($col == 'user_id' || $col == 'author_id') {  //для orders, books
                                                echo '<td class="font-w600 font-size-sm">' .
                                                    getUserName($item[$col], $users); //user['Name'], ... book['Title']
                                                ' </td>';
                                            } elseif ($col == 'book_id') { //для orders
                                                echo '<td class="font-w600 font-size-sm">' .
                                                    getBookTitle($item[$col], $books);
                                                ' </td>';
                                            } else {
                                                echo '<td class="font-w600 font-size-sm col-md-sm">' . $item[$col] . ' </td>';
                                            }
                                        }
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<?php
    }
}
