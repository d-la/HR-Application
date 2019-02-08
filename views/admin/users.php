<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/EmploymentType.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AccountType.php';
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
            <h1 class="page-title">Users <small>Welcome, Daniel</small></h1>

            <div class="container-fluid">
                <div class="row">
                    <?php
                    // Let users know whether adding a user was sucessfull
                    $session = new HRApplication\Session;
                    $sessionAlertValue = $session->getSessionValue('alert');

                    if (isset($sessionAlertValue)){
                        switch ($sessionAlertValue){
                            case 'success':
                                $bannerMessage = 'User added successfully!';
                                break;
                            case 'error':
                                $bannerMessage = 'Unable to add user!';
                                break;
                        }
                        $banner = new HRApplication\AlertBanner();
                        echo $banner->getAlertBannerHtml($sessionAlertValue, $bannerMessage);
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel__header">
                                Full list of users within ::Organization Name::
                                <span class="panel__actions">
                                    <i class="fa fa-minus" data-click="handle-panel-body"></i>
                                </span>
                            </div>
                            
                            <div class="panel__body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Employment Type</th>
                                            <th>Compensation</th>
                                            <th>Department</th>
                                            <th>Role</th>
                                            <th>Date Hired</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>
                                                    <i class="fa fa-cogs" data-click="edit-user"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="panel">
                            <div class="panel__header">
                                Add new user
                                <span class="panel__actions">
                                    <i class="fa fa-minus" data-click="handle-panel-body"></i>
                                </span>
                            </div>
                            <div class="panel__body">
                                <form action="/controllers/insert-organization.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="first_name">First Name *</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="first_name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name *</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="last_name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="text" class="form-control" id="email" name="email" aria-describedby="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input type="password" class="form-control" id="password" name="password" aria-describedby="password" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number *</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" aria-describedby="phone_number" placeholder="000-000-0000" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="street_1">Street 1 *</label>
                                        <input type="text" class="form-control" id="street_1" name="street_1" aria-describedby="street_1" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="street_2">Street 2</label>
                                        <input type="text" class="form-control" id="street_2" name="street_2" aria-describedby="street_2">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="city">City *</label>
                                            <input type="text" class="form-control" id="city">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="state">State</label>
                                            <select id="state" class="form-control">
                                                <option selected>Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control" id="zip">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="department">Department</label>
                                            <select id="department" class="form-control">
                                                <option selected>Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="role">Role</label>
                                            <select id="role" class="form-control" disabled="disabled">
                                                <option selected>Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="employment_type">Employment Type</label>
                                            <select id="employment_type" class="form-control">
                                                <option selected>Choose...</option>
                                                <?php 
                                                $employmentType = new HRApplication\EmploymentType();

                                                $allEmploymentTypes = $employmentType->selectAllEmploymentTypes();
                                                if ($allEmploymentTypes->num_rows > 0){
                                                    while ($row = $allEmploymentTypes->fetch_assoc()){
                                                        ?>
                                                        <option value="<?= $row['employment_type_id'] ?>"><?= $row['employment_title'] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="account_type">Account Type</label>
                                            <select id="account_type" class="form-control">
                                                <option selected>Choose...</option>
                                                <?php 
                                                $accountType = new HRApplication\AccountType();

                                                $allaccountTypes = $accountType->selectAllaccountTypes();
                                                if ($allaccountTypes->num_rows > 0){
                                                    while ($row = $allaccountTypes->fetch_assoc()){
                                                        ?>
                                                        <option value="<?= $row['account_type_id'] ?>"><?= $row['account_title'] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="compensation">Compensation</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" id="compensation" name="compensation" aria-describedby="compensation" required="required">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn--theme">Add User</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end .col-lg-8 -->
                    <div class="col-xs-12 col-lg-4">
                        <div class="custom-card">
                            <div class="custom-card__left-content">
                                Total Users
                            </div>
                            <div class="custom-card__right-content">
                                5
                            </div>
                        </div>
                    </div><!-- .col-lg-8 -->
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