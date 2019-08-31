function js_add_wish_cart()
{
	 $('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
}



function js_product()
{

	    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });
        
    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine : 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

   
   
}


function js_slick_3()
{
/*==================================================================
        [ Slick3 ]*/
        $('.wrap-slick3').each(function(){
            $(this).find('.slick3').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                infinite: true,
                autoplay: false,
                autoplaySpeed: 6000,

                arrows: true,
                appendArrows: $(this).find('.wrap-slick3-arrows'),
                prevArrow:'<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                nextArrow:'<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',

                dots: true,
                appendDots: $(this).find('.wrap-slick3-dots'),
                dotsClass:'slick3-dots',
                customPaging: function(slick, index) {
                    var portrait = $(slick.$slides[index]).data('thumb');
                    return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
                },  
            });
        });
}
function detail_product(id, nama, harga, deskripsi)
      {	
      	
      	$('.wrap-slick3-dots').empty();
      	$('.wrap-slick3-arrows').empty();
      	$('.slick3').empty();
      	$('#ukuran').empty();
      	$('#warna').empty();
      	$('.selectwarna').hide();
      	$('.stok').hide();
        $.ajax({
		  url: BASE_URL+"product/get_product_image/" + id ,
		  dataType: 'json',
		  success: function(data) {

		  	
		  	for (i = 0; i < data.length; i++) {
		  		var divdp = $('<div>').attr({
					    "class": "item-slick3",
					    "data-thumb": "images/product/" + data[i].nama_gambar
					});
		  		var divdp2 = $('<div>').attr('class','wrap-pic-w pos-relative');
		  		var imgdp1 = $('<img>').attr({
					    "src": "images/product/" + data[i].nama_gambar,
					    "alt": "IMG-PRODUCT"
					});
		  		var adp1 = $("<a>").attr({
					    "href": "images/product/" + data[i].nama_gambar,
					    "class": "flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
					})
		  		var idp = $('<i>').attr('class','fa fa-expand');
		  		adp1.append(idp);
		  		divdp2.append(imgdp1,adp1);
		  		divdp.append(divdp2);
		  		$('#gambar').append(divdp);
		  	}
		  		
		  		js_slick_3();
		  	},
	    	error: function() {
                
                  alert("mohon maaf terjadi kesalahan sistem");}
                
  			});

        $.ajax({
		  url: BASE_URL+"product/get_product_size/" + id,
		  dataType: 'json',
		  success: function(data) {

		  		
		  		var choose2 = $('<option>').attr({
					    "value": "",
					    "disabled" : "",
					    "selected" : ""
					}).text('Choose an option');

		  		
		  		$('.ukuran').append(choose2);

		  		

		  	for (i = 0; i < data.length; i++) {

		  		var option = $('<option>').text(data[i].ukuran);
		  		$('.ukuran').append(option);

		  		

		  	}
		 //  	$(".option_warna").each(function() {

			// 	$(this).css("background-color", $(this).val());
			// });


		  	},
	    	error: function() {
                
                  alert("mohon maaf terjadi kesalahan sistem");}
                
  			});

        $('.ukuran').on('change', function() {
        	
        	$('.selectwarna').hide();
        	$.ajax({
		  	url: BASE_URL+"product/get_product_color/" + id  + '/' + this.value,
		  	dataType: 'json',
		  	success: function(data) {
		  	
			  	var choose = $('<option>').attr({
						    "value": "",
						    "disabled" : "",
						    "selected" : ""
						}).text('Choose an option');
			  	$('.warna').empty();
	        	$('.warna').append(choose);

	        	for (i = 0; i < data.length; i++) {

		        	var option2 = $('<option>').text(data[i].nama_warna);
				  	// option2.attr('class','option_warna');
				 	$('.warna').append(option2);
			  	}
			  	
	        	$('.selectwarna').show(250);
		  },
		  error: function() {
                
                  alert("mohon maaf terjadi kesalahan sistem");}
                
  		});
        	
        });

        $('.warna').on('change', function() {
        	$('.stok').hide();
  
        	$.ajax({
		  	url: BASE_URL+"product/get_product_stock/" + id  + '/' + $('.ukuran').val() + '/' + this.value,
		  	dataType: 'json',
		  	success: function(data) {

			  	$('.num_product').attr('max', data[0].stok);
			  	console.log(data[0].stok);
	        	$('.stok').show(250);
		  },
		  error: function() {
                
                  alert("mohon maaf terjadi kesalahan sistem");}
                
  		});
        	
        });

        $("#nama").text(nama);
        $("#harga").text("Rp " + harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
        $("#deskripsi").text(deskripsi);
        
        js_add_wish_cart()
        $('.js-modal1').addClass('show-modal1');
      }




$(document).ready(function() {
$('#load_more').hide();
$('#gambar').empty();
$('#ukuran').empty();
$('#prod_place').empty();
$.ajax({
		  url: BASE_URL+"product/get_product",
		  dataType: 'json',
		  success: function(data) {
		  	
		  	var final = $('<div>').attr('class','row isotope-grid');
		  	for (i = 0; i < data.length; i++) {
			  		
			  		var div1 = $('<div>').attr('class','col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item shoes');
			  		var div2 = $('<div>').attr('class','block2');
			  		var div3 = $('<div>').attr('class','block2-pic hov-img0');
			  		var img1 = $('<img>').attr({
					    "src": "images/product/" + data[i].nama_gambar,
					    "alt": "IMG-PRODUCT"
					});
			  		
			  		var a1 = $("<a>").attr({
					    "href": "#",
					    "class": "block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1",
					    "onclick": "detail_product('" + data[i].id + "','" + data[i].nama + "','" +  data[i].harga + "','" + data[i].deskripsi + "')"
					}).text("Quick View");

					div3.append(img1,a1);

					var div4 = $('<div>').attr('class','block2-txt flex-w flex-t p-t-14');
					var div5 = $('<div>').attr('class','block2-txt-child1 flex-col-l');
					var a2 = $("<a>").attr({
					    "href": "#",
					    "class": "stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6"
					}).html(data[i].nama);
					var span = $('<span>').attr('class','stext-105 cl3').text("Rp " + data[i].harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
					div5.append(a2,span);

					var div6 = $('<div>').attr('class','block2-txt-child2 flex-r p-t-3');
					var a3 = $("<a>").attr({
					    "href": "#",
					    "class": "btn-addwish-b2 dis-block pos-relative js-addwish-b2"
					});
					var img2 = $("<img>").attr({
					    "src": "images/icons/icon-heart-01.png",
					    "class": "icon-heart1 dis-block trans-04",
					    "alt":"ICON"
					});
					var img3 = $("<img>").attr({
					    "src": "images/icons/icon-heart-02.png",
					    "class": "icon-heart2 dis-block trans-04 ab-t-l",
					    "alt":"ICON" 
					});

					a3.append(img2,img3);
					div6.append(a3);
					div4.append(div5,div6);

					div2.append(div3,div4);
					div1.append(div2);

					final.append(div1);
					
				}


				$('#prod_place').append(final);

				
				js_product();
				js_add_wish_cart();

				if(data.length > 16)
				{
					$('#load_more').show();

				}
				
	      	
	    	},
	    	error: function() {
                
                  alert("mohon maaf terjadi kesalahan sistem");}
                
  			});




	});


