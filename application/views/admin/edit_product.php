<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/a_partials/a_head.php") ?>

  <script type="text/javascript">
window.onload = function() {
  get_varian();
};
    

</script>
<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 213px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;

}

label {
    margin-top: 5px;
}
</style>
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
                                <div class="card">
                                    <div class="card-body card-block">
                                        <div class="card-title">
                                            <h2 class="text-center pt-2 display-5">Edit Product</h2>
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="hidden" id="flag_aktif" placeholder="" class="form-control" value="<?php echo $lists->flag_aktif; ?>" required="" readonly>
                                <form id="product_form_edit" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="id" id="id" placeholder="" class="form-control" value="<?php echo $lists->id; ?>" required="" readonly>
                                    <div class="card">
                                        <div class="card-body card-block">
                                            <div class="card-title">
                                                <h4 class="text-left title-2">Product Images</h4>
                                            </div>
                                            
                                            <hr>
                                            
                                            <div class="row form-group">
                                                <div class="col-3 text-center">
                                                    <div class="kv-avatar">
                                                    <div class="file-loading">
                                                            <input class="img" id="img-1" name="img[]" type="file">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <div class="kv-avatar">
                                                    <div class="file-loading">
                                                            <input class="img" id="img-2" name="img[]" type="file">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <div class="kv-avatar">
                                                    <div class="file-loading">
                                                            <input class="img" id="img-3" name="img[]" type="file">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <div class="kv-avatar">
                                                    <div class="file-loading">
                                                            <input class="img" id="img-4" name="img[]" type="file">
                                                    </div>
                                                    </div>
                                                </div>
                                                        
                                                
                                                <!-- <div class="col-3 text-center">
                                                        <div class="kv-avatar">
                                                            <div class="file-loading">
                                                                <input class="img" id="img-2" name="img[]" type="file">
                                                        </div>
                                                        </div>
                                                        <div class="kv-avatar-hint">
                                                        </div>
                                                </div>
                                                <div class="col-3 text-center">
                                                        <div class="kv-avatar">
                                                            <div class="file-loading">
                                                                <input class="img" id="img-3" name="img[]" type="file">
                                                        </div>
                                                        </div>
                                                        <div class="kv-avatar-hint">
                                                        </div>
                                                </div>
                                                <div class="col-3 text-center">
                                                        <div class="kv-avatar">
                                                            <div class="file-loading">
                                                                <input class="img" id="img-4" name="img[]" type="file">
                                                        </div>
                                                        </div>
                                                        <div class="kv-avatar-hint">
                                                        </div>
                                                </div> -->
                                                
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="card">
                                        <div class="card-body card-block">
                                            <div class="card-title">
                                                <h4 class="text-left title-2">Product Information</h4>
                                            </div>
                                            <hr>
                                            
                                            <div class="row form-group">
                                                <div class="sufee-alert alert with-close alert-danger fade show error">
                                                <p id="errorp"></p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                </button>
                                            </div>
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" >Product Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama_produk" name="nama_produk" placeholder="" class="form-control" value="<?php echo $lists->nama; ?>" required="">
                                                    <!-- <small class="form-text text-muted">This is a help text</small> -->
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Add your description here.."  value="<?php echo $lists->deskripsi; ?>" required=""><?php echo $lists->deskripsi;?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Product Price</label>
                                                </div>
                                                <div class="col col-sm-1" style="flex: 0.5">
                                                    <label for="text-input" class=" form-control-label">Rp</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="text" id="harga" name="harga" placeholder="" class="form-control uang" value="<?php echo $lists->harga; ?>" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label style="padding-right: 10px" for="text-input" class="form-control-label">Variant</label>
                                                    <span><button id="add_varian" type="button" class="btn btn-secondary btn-sm" title="add varian">
                                                        <i class="fa fa-plus-circle"></i></button></span>
                                                </div>

                                                <div class="col col-sm-1" style="flex: 0">
                                                    
                                                    <label for="text-input" class=" form-control-label">Size:</label>
                                                </div>
                                                <div class="col col-1">
                                                    <input type="text" placeholder="" class="form-control ukuran1" name="ukuran[]" required="">
                                                </div>
                                                <div class="col col-sm-1" style="flex: 0">
                                                    <label for="text-input" class=" form-control-label">Color:</label>  
                                                </div>
                                                <div class="col col-1">
                                                    <input type="color" placeholder="" class="form-control warna1" name="warna[]" required="" style="height:40px">
                                                </div>
                                                 <div class="col col-sm-1" style="flex: 0">
                                                    <label for="text-input" class=" form-control-label">Name:</label>  
                                                </div>
                                                <div class="col col-md-2">
                                                    <input type="text" placeholder="" class="form-control nama_warna1" name="nama_warna[]" required="" style="height:40px">
                                                </div>
                                                <div class="col col-sm-1" style="flex: 0">
                                                    <label for="text-input" class=" form-control-label">Stock:</label>
                                                </div>
                                                <div class="col col-1">
                                                    <input type="text" placeholder="" class="form-control uang stok1" name="stok[]" required="">
                                                </div>
                                            </div>
                                            <div id="varian"></div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="radio1" name="radios" value="1" class="form-check-input" required="">Active
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="radio2" name="radios" value="0" class="form-check-input">Not Active
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    <div class="card-footer">
                                        <button id="save" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-save fa-md"></i>&nbsp;
                                            <span id="payment-button-amount">Save</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        <?php $this->load->view("admin/a_partials/a_copyright.php") ?>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php $this->load->view("admin/a_partials/a_js.php") ?>
    <script src="<?php echo base_url('a_js/product.js')?>"></script>
</body>

</html>
<!-- end document-->
    