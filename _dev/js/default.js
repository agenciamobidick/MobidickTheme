jQuery(function(){

 //    //Validação
	// var container = jQuery('.container-erro');

	// jQuery("#comprar").validate({
 //    	errorContainer: container,
 //        errorLabelContainer: jQuery(container),
 //        wrapper: 'p',
 //        submitHandler: function(form){
 //        	jQuery("#comprar input[type='submit']").prop('disabled', true);
 //            var dados = jQuery(form).serialize();
 //            var formulario = jQuery(form);
 //            jQuery.ajax({
 //                type: "POST",
 //                url: "/wp-content/themes/rio-quente/envia-comprar.php",
 //                data: dados,
 //                success: function(data){
 //                    alert(data);
 //                }
 //            });
 //            return false;
 //        }
 //    });

 //    //O nome da funçao ja diz
	// function fuckGaleria(){
	// 		if(jQuery('.galeria').length > 0){

	// 			jQuery('.galeria').each(function(){
	// 				try{
	// 					this.swiper.destroy(true, true);
	// 				}catch(err){
	// 			    	//console.log(err.message)
	// 			    };
	// 			});
	// 			jQuery('.galeria-thumb').each(function(){
	// 				try{
	// 					this.swiper.destroy(true, true);
	// 			    } 
	// 			    catch(err){
	// 			    	//console.log(err.message)
	// 			    };
	// 			});

	// 			new Swiper(jQuery('.galeria', tab)[0], {
	// 		        calculateHeight: true,
	// 		        roundLengths: true,
	// 		        autoResize: true,
	// 		        speed: 400,
	// 		        nextButton: '.banner-next',
	// 		        prevButton: '.banner-prev'
	// 		    });
		    
	// 		    jQuery('.galeria', tab)[0].swiper.on('slideChangeStart', function () {
	// 		    	var indexBannerGaleria = jQuery('.galeria', tab)[0].swiper.activeIndex;
	// 		    	jQuery('.galeria-thumb', tab)[0].swiper.slideTo(indexBannerGaleria);
	// 		    	jQuery('.galeria-thumb', tab).find(".banner-img").removeClass("actived");
	// 		    	activedGaleriaThumb(indexBannerGaleria, tab);
	// 		    });

	// 			if(widthWindow <= 767){
	// 				new Swiper(jQuery('.galeria-thumb', tab)[0], {
	// 					direction: "horizontal",
	// 					slidesPerView: 5,
	// 			        calculateHeight: true,
	// 			        roundLengths: true,
	// 			        autoResize: true,
	// 			        speed: 400,
	// 			        pagination: '.swiper-pagination',
	// 			        nextButton: '.galeria-thumb-next',
	// 		        	prevButton: '.galeria-thumb-prev',
	// 			    });
	// 			}else{
	// 				new Swiper(jQuery('.galeria-thumb', tab)[0], {
	// 					direction: "vertical",
	// 					slidesPerView: 4,
	// 					spaceBetween: 25,
	// 			        calculateHeight: true,
	// 			        roundLengths: true,
	// 			        autoResize: true,
	// 			        speed: 400,
	// 			        nextButton: '.galeria-thumb-next',
	// 		        	prevButton: '.galeria-thumb-prev',
	// 			    });
	// 			}

	// 		   	var indexBanner = jQuery('.galeria-thumb', tab)[0].swiper.activeIndex;
	// 			jQuery(".galeria-thumb .swiper-slide", tab).eq(indexBanner).find(".banner-img").addClass("actived");

	// 			jQuery('.galeria-thumb', tab).on("click", function(){
	// 		    	indexBanner = jQuery('.galeria-thumb', tab)[0].swiper.clickedIndex;
	// 		    	jQuery('.galeria', tab)[0].swiper.slideTo(indexBanner);
	// 		    	activedGaleriaThumb(indexBanner, tab);
	// 		    });

	// 		}
	// 	}

	// jQuery('.nav-tabs').on('click', 'a', function(e){
	// 	e.preventDefault();
	// 	tab = jQuery(jQuery(this).attr('href'));
		
	// 	window.location.hash = jQuery(this).attr('href');
	// 	indexTab = jQuery(this).parent().index();		
	// 	jQuery(this).tab('show');
	// 	jQuery(".banner-thumbs .col-sm-2", tab).find(".banner-thumbs-img").removeClass("actived");
	//     jQuery(".banner-thumbs .col-sm-2", tab).eq(indexTab).find(".banner-thumbs-img").addClass("actived");
	//     bannerInternas.slideTo(indexTab);
	//     fuckGaleria();
	// })

}
