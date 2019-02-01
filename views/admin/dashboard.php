<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Lato Font -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/assets/font-awesome-4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="/css/styles.min.css" />
        <title>Some Application</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </nav>

        <aside class="sidebar sidebar--small">
            <ul class="sidebar__list">
                <li class="sidebar__user-info">
                    <div class="user">
                        <span class="user__name">
                            Daniel La
                        </span>
                        <span class="user__type">
                            Admin
                        </span>
                    </div>
                </li>
                <a href="/admin/dashboard" class="sidebar__link sidebar__link--round-borders">
                    <li class="sidebar__list-item">
                        <i class="fa fa-line-chart"></i>
                        Dashboard
                    </li>
                </a>
                <a href="/admin/calendar" class="sidebar__link sidebar__link--round-borders">
                    <li class="sidebar__list-item">
                        <i class="fa fa-university"></i>
                        Organizations
                    </li>
                </a>
                <a href="" class="sidebar__link sidebar__link--round-borders">
                    <li class="sidebar__list-item">
                        <i class="fa fa-users"></i>
                        User List
                    </li>
                </a>
                <a href="" class="sidebar__link sidebar__link--round-borders">
                    <li class="sidebar__list-item">
                        Hello
                    </li>
                </a>
                <a href="" class="sidebar__link sidebar__link--round-borders">
                    <li class="sidebar__list-item">
                        Hello
                    </li>
                </a>
            </ul>
        </aside>
        <main class="main">
            <h1 class="page-title">Admin Dashboard <small>Welcome, Daniel</small></h1>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget widget--blue-bg">
                            <div class="widget__title">
                            Total Employees
                            </div>
                            <div class="widget__content">
                            125
                            </div>
                            <div class="widget__footer">
                                <div class="widget__link">
                                    View Details &rarr;
                                </div>
                            </div>
                        </div>
                    </div><!-- end .col-lg-3 -->

                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget widget--red-bg">
                            <div class="widget__title">
                            Total Employees
                            </div>
                            <div class="widget__content">
                            125
                            </div>
                            <div class="widget__footer">
                                <div class="widget__link">
                                    View Details &rarr;
                                </div>
                            </div>
                        </div>
                    </div><!-- end .col-lg-3 -->

                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget">
                            <div class="widget__title">
                            Total Employees
                            </div>
                            <div class="widget__content">
                            125
                            </div>
                            <div class="widget__footer">
                                <div class="widget__link">
                                    View Details &rarr;
                                </div>
                            </div>
                        </div>
                    </div><!-- end .col-lg-3 -->

                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget">
                            <div class="widget__title">
                            Total Employees
                            </div>
                            <div class="widget__content">
                                125
                            </div>
                            <div class="widget__footer">
                                <div class="widget__link">
                                    View Details &rarr;
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end .row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel__header">
                                Some data here
                            </div>
                            <div class="panel__body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel consequatur qui rerum natus quia unde,
                                eum, quos magni est tenetur voluptatem repudiandae! Minus culpa optio delectus debitis libero, repudiandae consequuntur!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel__header">
                                Some data here
                            </div>
                            <div class="panel__body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel consequatur qui rerum natus quia unde,
                                eum, quos magni est tenetur voluptatem repudiandae! Minus culpa optio delectus debitis libero, repudiandae consequuntur!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>