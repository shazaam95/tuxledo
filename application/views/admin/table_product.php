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
                                <?php if ($this->session->flashdata('success')): ?>
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <?php echo $this->session->flashdata('success'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php elseif ($this->session->flashdata('failed')): ?>
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <?php echo $this->session->flashdata('failed'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>Product Management</h3>
                                        
                                    <div class="filters m-b-10">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" onclick="location.href='<?php echo site_url('admin/product/view_add_product') ?>'">
                                            <i class="zmdi zmdi-plus"></i>add Product</button>
                                        <!-- <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
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
                                        </div> -->
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
                                                    <th style="font-size: 16px">Name</th>
                                                    <th style="font-size: 16px">Description</th>
                                                    <th style="font-size: 16px">Price</th>
                                                    <th style="font-size: 16px">Status</th>
                                                    <th style="font-size: 16px">Stock</th>
                                                    <th></th>
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
                                                        <ul style="list-style-type:none;">
                                                            <li>
                                                                <center>
                                                                <div class="image" center>
                                                                    <img width="100" height="100" style="object-fit: scale-down;" class="img-thumbnail" src="<?php echo base_url('images/product/'). $list->nama_gambar ?>" alt="<?php echo $list->id_gambar ?>">
                                                                </div>
                                                                </center>
                                                            </li>
                                                            <li><br></li>
                                                            <li>
                                                                <center>
                                                                <div class="table-data__info">
                                                                    <h6><?php echo $list->nama ?></h6>
                                                                </div>
                                                                </center>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td width="30%"><?php echo substr($list->deskripsi,0)?></td>
                                                    <td >
                                                       <?php echo "Rp " . number_format($list->harga,0,",",".") ?></td>
                                                    <td>
                                                       <?php if ($list->flag_aktif==1): ?>
                                                            <span class="role member">Active</span>
                                                        <?php else: ?>
                                                            <span class="role admin">Unactive</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <ul style="list-style-type:none;">
                                                            <li>Status:</li>
                                                            <?php if ($list->stok>0): ?>
                                                            <li>Stock Available</li>
                                                            <?php else: ?>
                                                            <li>Stock Unavailable</li> 
                                                            <?php endif; ?>
                                                        
                                                            
                                                        <?php echo "Stock: " . number_format($list->stok,0,",",".") ?></td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <?php if ($list->flag_aktif==1): ?>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Set Not Active" onclick="active_confirm('<?php echo site_url('admin/product/set_not_active/'.$list->id) ?>','<?php echo $list->flag_aktif ?>', '<?php echo $list->nama ?>')">
                                                            <i class="zmdi zmdi-close"></i>
                                                        </button>
                                                            <?php else: ?>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Set Active" onclick="active_confirm('<?php echo site_url('admin/product/set_active/'.$list->id) ?>','<?php echo $list->flag_aktif ?>', '<?php echo $list->nama ?>')">
                                                            <i class="zmdi zmdi-check"></i>
                                                        </button>
                                                        <?php endif; ?>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="location.href='<?php echo site_url('admin/product/view_edit_product/'. $list->id) ?>'">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete_confirm('<?php echo site_url('admin/product/delete_product/'.$list->id) ?>','<?php echo $list->nama ?>')">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                            <i class="zmdi zmdi-fullscreen"></i>
                                                        </button> -->
                                                    </div>
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
    <?php $this->load->view("admin/a_partials/a_modal.php") ?>
    <script src="<?php echo base_url('a_js/product.js')?>"></script>
</body>

</html>
<!-- end document-->
