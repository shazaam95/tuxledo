function get_varian()

{

    var id = $('#id').val();
    $.ajax({
          url: BASE_URL+"/admin/product/get_varian/" + id,
          dataType: 'json',
          success: function(data) {
            var flag_aktif = $('#flag_aktif').val();

            if(flag_aktif==1)
            {
                $("#radio1").prop("checked", true);
            }

            else
            {
                $("#radio2").prop("checked", true);
            }


            $('.ukuran1').val(data[0].ukuran);
            $('.warna1').val(data[0].warna);
            $('.stok1').val(data[0].stok);
            $('.nama_warna1').val(data[0].nama_warna);
            for(var i = 1;i < data.length;i++)
            {

                var row = '<div id="' + i + '" class="row form-group addon">' +
                        '<div class="col col-md-3">' +
                        '</div>' +
                        '<div class="col col-sm-1" style="flex: 0">' +
                            '<label for="text-input" class=" form-control-label">Size:</label>'+
                        '</div>'+
                        '<div class="col col-1">'+
                            '<input type="text" placeholder="M, L, XL..." class="form-control" name="ukuran[]" value="' + data[i].ukuran + '" required="">'+
                        '</div>'+
                        '<div class="col col-sm-1" style="flex: 0">'+
                            '<label for="text-input" class=" form-control-label">Color:</label>'+
                        '</div>'+
                        '<div class="col col-1">'+
                            '<input type="color" placeholder="" class="form-control" name="warna[]" value="' + data[i].warna + '" required="" style="height:40px">'+
                        '</div>'+
                        '<div class="col col-sm-1" style="flex: 0">' +
                            '<label for="text-input" class=" form-control-label">Name:</label>' +
                        '</div>' +
                        '<div class="col col-md-2">' +
                            '<input type="text" placeholder="" class="form-control" name="nama_warna[]" value="' + data[i].nama_warna + '"required="" style="height:40px">' +
                        '</div>' +
                        '<div class="col col-sm-1" style="flex: 0">'+
                            '<label for="text-input" class=" form-control-label">Stock:</label>'+
                        '</div>'+
                        '<div class="col col-1">'+
                            '<input type="text" placeholder="" class="form-control uang" name="stok[]" value="' + data[i].stok + '" required="">'+
                        '</div>'+
                        '<span><button type="button" onclick="delete_varian(' + i +')" class="btn btn-secondary btn-sm" title="delete varian">' +
                                                                '<i class="fa fa-times-circle"></i></button></span>' +
                    '</div>';

                    $('#varian').append(row);
            }
            
              
            
            
          },

          error: function() {
                      
                        alert("mohon maaf terjadi kesalahan sistem");
                      }


                      
        });


    $.ajax({
          url: BASE_URL+"/admin/product/get_image/" + id,
          dataType: 'json',
          success: function(data) {
            
        var counter = 0;
        for(var i = 0;i < data.length;i++)
            {
                var url = BASE_URL+"images/product/" + data[i].nama_gambar;
                
                $("#img-" + (i+1)).fileinput({
                    showDrag: false,
                    defaultPreviewContent: '<img src= "' + BASE_URL + '/a_images/ShowImage.png" alt="Your Product"><h6 class="text-muted">Click to select</h6>',
                    overwriteInitial: true,
                    showPreview: true,
                    showClose: true,
                    removeLabel: '',
                    removeIcon: '<i class="fa fa-times"></i>',
                    removeTitle: 'Cancel or reset changes',
                    browseOnZoneClick: true,
                    showBrowse: false,
                    showCaption: false,
                    validateInitialCount: true,
                    showUpload: false,
                    showRemove: false,
                    allowedFileExtensions: ["jpeg","jpg", "png", "gif"],
                    initialPreview: url,
                    initialPreviewAsData: true,
                    initialPreviewConfig: [
                    {caption: data[i].nama_origin, size: data[i].ukuran}
                    ],
            });

                
                counter++;
        }
        $('.kv-file-remove').remove();
        for(var i = counter;i < 5;i++)
            {
                $("#img-" + (i+1)).fileinput({
                    overwriteInitial: true,
                    showClose: true,
                    removeIcon: '<i class="fa fa-times"></i>',
                    defaultPreviewContent: '<img src= "' + BASE_URL + '/a_images/ShowImage.png" alt="Your Product"><h6 class="text-muted">Click to select</h6>',
                    removeLabel: '',
                    removeIcon: '<i class="fa fa-times"></i>',
                    removeTitle: 'Cancel or reset changes',
                    browseOnZoneClick: true,
                    showBrowse: false,
                    showCaption: false,
                    showRemove: false,
                    showUpload: false,
                    validateInitialCount: true,
                    allowedFileExtensions: ["jpeg","jpg", "png", "gif"],
                    defaultPreviewContent: '<img src= "' + BASE_URL + '/a_images/ShowImage.png" alt="Your Product"><h6 class="text-muted">Click to select</h6>'

            });
            }

    },

          error: function() {
                      
                        alert("mohon maaf terjadi kesalahan sistem");
                      }


                      
        });
}

function fileinput()
{
    $(".img").fileinput({
        
            overwriteInitial: true,
            showClose: true,
            removeIcon: '<i class="fa fa-times"></i>',
            defaultPreviewContent: '<img src= "' + BASE_URL + '/a_images/ShowImage.png" alt="Your Product"><h6 class="text-muted">Click to select</h6>',
            removeLabel: '',
            removeIcon: '<i class="fa fa-times"></i>',
            removeTitle: 'Cancel or reset changes',
            browseOnZoneClick: true,
            showBrowse: false,
            showCaption: false,
            showRemove: false,
            showUpload: false,
            validateInitialCount: true,
            showUpload: false,
            allowedFileExtensions: ["jpeg","jpg", "png", "gif"]
    });
}

function active_confirm(urls, flag_aktif, nama)
      {
        $('#body_active').empty();
        var row;
            
            if(flag_aktif==1) {
                row = $('<p>').html('Are you sure want to deactivate ' + nama + '?');
            }

            else
            {
                row = $('<p>').html('Are you sure want to activate ' + nama + '?');
            }

        $('#body_active').append(row);
        $('#activation_Button').attr('href', urls);
            

        
        $('#activation_Modal').modal();
      }

function delete_confirm(urls, nama)
      {
        $('#body_delete').empty();
        var row;
            
            
        row = $('<p>').html('Are you sure want delete ' + nama + '?' + "<br><br>" + 'It cannot be undone');
        $('#body_delete').append(row);
        $('#delete_Button').attr('href', urls);
        $('#delete_Modal').modal();
      }


function delete_varian(counter) {
    

    $( "#" + counter ).fadeOut( "fast", function() {
        $(this).remove();
      });
}


$(document).ready(function() {
    $(".error").hide();
    $("p#errorp").empty();
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="fa fa-tag"></i>' +
        '</button>'; 
    
    var counter = 500;
    $('#add_varian').on('click', function(e) {
        if ($('.addon').length > 5){}
        else {  
                
                var row = '<div id="' + counter + '" class="row form-group addon">' +
                        '<div class="col col-md-3">' +
                        '</div>' +
                        '<div class="col col-sm-1" style="flex: 0">' +
                            '<label for="text-input" class=" form-control-label">Size:</label>'+
                        '</div>'+
                        '<div class="col col-1">'+
                            '<input type="text" placeholder="" class="form-control" name="ukuran[]" required="">'+
                        '</div>'+
                        '<div class="col col-sm-1" style="flex: 0">'+
                            '<label for="text-input" class=" form-control-label">Color:</label>'+
                        '</div>'+
                        '<div class="col col-1">'+
                            '<input type="color" placeholder="" class="form-control" name="warna[]" required="" style="height:40px">'+
                        '</div>'+
                        '<div class="col col-sm-1" style="flex: 0">' +
                            '<label for="text-input" class=" form-control-label">Name:</label>' +
                        '</div>' +
                        '<div class="col col-md-2">' +
                            '<input type="text" placeholder="" class="form-control" name="nama_warna[]" required="" style="height:40px">' +
                        '</div>' +
                        '<div class="col col-sm-1" style="flex: 0">'+
                            '<label for="text-input" class=" form-control-label">Stock:</label>'+
                        '</div>'+
                        '<div class="col col-1">'+
                            '<input type="text" placeholder="" class="form-control uang" name="stok[]" required="">'+
                        '</div>'+
                        '<span><button type="button" onclick="delete_varian(' + counter +')" class="btn btn-secondary btn-sm" title="delete varian">' +
                                                                '<i class="fa fa-times-circle"></i></button></span>' +
                    '</div>';

                    $('#varian').append(row);
                    $( "#" + counter).hide();
                    $( "#" + counter).fadeIn( "fast", function() {
                    $('.uang').mask('#.##0', {reverse: true});
                    
                  });
                
                counter = counter + 1;
            }
        });

    $("form#product_form").submit(function(e) {
            e.preventDefault();
            $(".error").hide();
            $("p#errorp").empty();
          // validate and process form here
          
          var nama_produk = $("input#nama_produk").val();
          var deskripsi = $("textarea#deskripsi").val();
          var harga = parseInt($("input#harga").val().replace(/[^0-9]/g, ""));

          
          if (nama_produk.length==0 ) {
            $("p#errorp").text("Product Name cannot be empty");$(".error").show();
            $("input#nama_produk").focus();
            return false;
          }

          if (deskripsi.length==0) {
            $("p#errorp").text("Description cannot be empty");$(".error").show();
            $("input#deskripsi").focus();
            return false;
          }
          if (harga == 0) {
            $("p#errorp").text("Product Price cannot be emty or zero");$(".error").show();
            $("input#bukti_bayar").focus();
            return false;
          }

         

          var formData = new FormData(this);

        $.ajax({
        type: "POST",
        url: BASE_URL+"admin/product/add_product",
        data:formData, //this is formData
        
        success: function(data) { 
        
        window.location.assign(BASE_URL+"admin/product");
        // console.log(data);
        
        },
        processData:false,
        contentType:false,
        cache:false,

        error: function() {
                    
                      alert("mohon maaf terjadi kesalahan sistem");}
                    
      });
      return false;
        });

    $("form#product_form_edit").submit(function(e) {
            e.preventDefault();
            $(".error").hide();
            $("p#errorp").empty();
          // validate and process form here
          
          var nama_produk = $("input#nama_produk").val();
          var deskripsi = $("textarea#deskripsi").val();
          var harga = parseInt($("input#harga").val().replace(/[^0-9]/g, ""));

          
          if (nama_produk.length==0 ) {
            $("p#errorp").text("Product Name cannot be empty");$(".error").show();
            $("input#nama_produk").focus();
            return false;
          }

          if (deskripsi.length==0) {
            $("p#errorp").text("Description cannot be empty");$(".error").show();
            $("input#deskripsi").focus();
            return false;
          }
          if (harga == 0) {
            $("p#errorp").text("Product Price cannot be emty or zero");$(".error").show();
            $("input#bukti_bayar").focus();
            return false;
          }

         

          var formData = new FormData(this);

        $.ajax({
        type: "POST",
        url: BASE_URL+"admin/product/edit_product",
        data:formData, //this is formData
        
        success: function(data) { 
        console.log(data);
        window.location.assign(BASE_URL+"admin/product");
        // console.log(data);
        
        },
        processData:false,
        contentType:false,
        cache:false,

        error: function() {
                    
                      alert("mohon maaf terjadi kesalahan sistem");}
                    
      });
      return false;
        });


	});


