<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/a_partials/a_head.php") ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php $this->load->view("admin/a_partials/a_header_mobile.php") ?>

       <?php $this->load->view("admin/a_partials/a_sidebar.php") ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
           <?php $this->load->view("admin/a_partials/a_header.php") ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>User Management</h3>
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-responsive-data2" style="padding: 30px 30px 30px 30px">
                                        <table class="table table-data2 data_table">
                                            <thead>
                                                <tr>
                                                    <!-- <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td> -->
                                                    <th style="font-size: 16px">name</th>
                                                    <th style="font-size: 16px">username</th>
                                                    <th style="font-size: 16px">role</th>
                                                    <!-- <th style="font-size: 16px">type</th> -->
                                                    <!-- <td></td> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($lists as $list): ?>
                                                <tr>
                                                    <!-- <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td> -->
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6><?php echo $list->nama ?></h6>
                                                            <span>
                                                                <a href="#"><?php echo $list->email ?></a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $list->username ?></td>
                                                    <td>
                                                       <?php if ($list->flag_admin==1): ?>
                                                            <span class="role admin">admin</span>
                                                        <?php else: ?>
                                                            <span class="role user">user</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <!-- <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option selected="selected">Full Control</option>
                                                                <option value="">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td> -->
                                                    <!-- <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td> -->
                                                    <?php $counter++; ?>
                                                </tr>
                                             <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                <!-- END USER DATA-->
                            </div>
                            
                        </div>
                        <?php $this->load->view("admin/a_partials/a_copyright.php") ?>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php $this->load->view("admin/a_partials/a_js.php") ?>

</body>

</html>
<!-- end document-->
