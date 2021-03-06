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
        <div class="loading-screen">
            <div class="loading-screen__content">
                <article class="loader"></article>
            </div>
        </div>
        
        <?php require_once 'require/navigation.php'; ?>

        <?php require_once 'require/sidebar.php'; ?>
        <main class="main">
            <h1 class="page-title">Admin Dashboard <small>Welcome, Daniel</small></h1>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget widget--blue-bg">
                            <div class="widget__icon">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </div>
                            <div class="widget__title">
                            Total Departments
                            </div>
                            <div class="widget__content">
                            125
                            </div>
                            <div class="widget__footer">
                                <a href="/admin/departments" class="widget__link widget__link--color-white">
                                    View Details &rarr;
                                </a>
                            </div>
                        </div>
                    </div><!-- end .col-lg-3 -->

                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget widget--red-bg">
                            <div class="widget__icon">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </div>
                            <div class="widget__title">
                            Total Employees
                            </div>
                            <div class="widget__content">
                            125
                            </div>
                            <div class="widget__footer">
                                <a href="/admin/users" class="widget__link widget__link--color-white">
                                    View Details &rarr;
                                </a>
                            </div>
                        </div>
                    </div><!-- end .col-lg-3 -->

                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget widget--green-bg">
                            <div class="widget__icon">
                                <i class="fa fa-calendar-times-o" aria-hidden="true"></i>
                            </div>
                            <div class="widget__title">
                            Total Time Off Requests
                            </div>
                            <div class="widget__content">
                            125
                            </div>
                            <div class="widget__footer">
                                <a href="/admin/schdules" class="widget__link widget__link--color-white">
                                    View Details &rarr;
                                </a>
                            </div>
                        </div>
                    </div><!-- end .col-lg-3 -->

                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget widget--black-bg">
                            <div class="widget__icon">
                                <i class="fa fa-hourglass-start" aria-hidden="true"></i>
                            </div>
                            <div class="widget__title">
                            Total Upcoming Schedules
                            </div>
                            <div class="widget__content">
                                125
                            </div>
                            <div class="widget__footer">
                                <a href="/admin/schedules" class="widget__link widget__link--color-white">
                                    View Details &rarr;
                                </a>
                            </div>
                        </div>
                    </div><!-- end .col-lg-3 -->
                </div><!-- end .row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel__header">
                                Some data here
                                <span class="panel__actions">
                                    <i class="fa fa-minus" data-click="handle-panel-body"></i>
                                </span>
                            </div>
                            <div class="panel__body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel consequatur qui rerum natus quia unde,
                                eum, quos magni est tenetur voluptatem repudiandae! Minus culpa optio delectus debitis libero, repudiandae consequuntur!
                            </div>
                        </div>
                    </div><!-- end .col-md-6 -->

                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel__header">
                                Some data here
                                <span class="panel__actions">
                                    <i class="fa fa-minus" data-click="handle-panel-body"></i>
                                </span>
                            </div>
                            <div class="panel__body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel consequatur qui rerum natus quia unde,
                                eum, quos magni est tenetur voluptatem repudiandae! Minus culpa optio delectus debitis libero, repudiandae consequuntur!
                            </div>
                        </div>
                    </div><!-- end .col-md-6 -->
                </div><!-- end .row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="custom-card flex flex--flow-row flex--wrap">
                            <div class="custom-card__left-content">
                                <h1>Hello</h1>
                            </div>
                            <div class="custom-card__right-content">
                                Total: 2
                            </div>
                        </div>
                    </div><!-- end .col-md-6 -->

                    <div class="col-md-6">
                        <div class="custom-card flex flex--flow-row flex--wrap">
                            <div class="custom-card__left-content">
                                <h1>Hello</h1>
                            </div>
                            <div class="custom-card__right-content">
                                Total: 2
                            </div>
                        </div>
                    </div><!-- end .col-md-6 -->
                </div><!-- end .row -->
            </div>
        </main>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
        <script>
            $(document).ready( () => {
                // Once the document is ready, hide the loader
                $('.loading-screen').hide();

                const sideBar = $('aside.sidebar');
                const main = $('main.main');

                // Handle loading expanding and minifying the sidebar. to be added to an application class later
                const toggleSidebarButton = $('button[data-click="toggle-sidebar"]');
                $(toggleSidebarButton).on('click', (e) => {
                    e.preventDefault();

                    if ($(sideBar).css('left') == '-250px'){
                        // Open the side bar
                        $(sideBar).addClass('sidebar--open-mobile');
                    } else {
                        // close the side bar
                        $(sideBar).removeClass('sidebar--open-mobile');
                    }
                });

                // Handle minifying and expanding the panel body. to be added to an application class later
                const handlePanelBodyButton = $('i[data-click="handle-panel-body"]');
                $(handlePanelBodyButton).on('click touchstart tap', function(){

                    let hasClassMinus = $(this).hasClass('fa-minus');
                    if (hasClassMinus){
                        $(this).removeClass('fa-minus').addClass('fa-plus');
                    } else {
                        $(this).removeClass('fa-plus').addClass('fa-minus');
                    }

                    const targetPanelBody = $(this).parents('.panel__header').siblings('.panel__body');

                    $(targetPanelBody).slideToggle();
                });
            });
        </script>
    </body>
</html>