<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Department.php';

$requestUriArray = explode('/', $_SERVER['REQUEST_URI']);

$departmentId = $requestUriArray[3];
if ((is_numeric($departmentId)) && ($departmentId !== 0)){
    // Code to fetch department information 

    $department = new HRApplication\Department;
    $departmentInformation = $department->selectDepartmentInformation($departmentId);
} else {
    header('Location: /admin/departments');
    die();
}

?>
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
            <h1 class="page-title">Edit Department <small>Welcome, Daniel</small></h1>

            <div class="container-fluid">
                <div class="row">
                    <?php 
                    $session = new HRApplication\Session;
                    $sessionAlertValue = $session->getSessionValue('alert');

                    if (isset($sessionAlertValue)){
                        switch ($sessionAlertValue){
                            case 'success':
                                $bannerMessage = 'Organization added successfully!';
                                break;
                            case 'error':
                                $bannerMessage = 'Unable to add organization!';
                                break;
                        }
                        $banner = new HRApplication\AlertBanner();
                        echo $banner->getAlertBannerHtml($sessionAlertValue, $bannerMessage);
                    }

                    ?>
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel__header">
                                Edit ::Department Name:: department
                                <span class="panel__actions">
                                    <i class="fa fa-minus" data-click="handle-panel-body"></i>
                                </span>
                            </div>
                            <div class="panel__body">
                                <form action="/controllers/insert-organization.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="organizationId" value="">
                                    <div class="form-group">
                                        <label for="departmentName">Department Name *</label>
                                        <input type="text" class="form-control" id="departmentName" name="departmentName" aria-describedby="departmentName" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="departmentDesc">Department Description *</label>
                                        <textarea class="form-control" id="departmentDesc" name="departmentDesc" aria-describedby="departmentDesc" required="required"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn--theme">Add Department</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end .col-md-6 -->
                    <?php 
                    // Code to select all users with the department
                    
                    ?>
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel__header">
                                Users in department
                                <span class="panel__actions">
                                    <i class="fa fa-minus" data-click="handle-panel-body"></i>
                                </span>
                            </div>
                            <div class="panel__body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Date Hired</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            <td>Jane Doe</td>
                                            <td>Engineer</td>
                                            <td>1/12/2019</td>
                                            <td>
                                                <i class="fa fa-cogs"></i>
                                            </td>
                                        </tbody>
                                    </table>
                                </div>
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