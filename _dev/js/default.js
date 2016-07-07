jQuery(function(){

// 	widthWindow = jQuery(window).width();
// 	heightWindow = jQuery(window).height();	

// 	function promotions(){
// 		if(".promotions-list"){
// 			widthWindow = jQuery(window).width();
// 			if(widthWindow <= 768){
// 				jQuery(".promotions-list li").each(function(){
// 					if(jQuery(this).find("img").parent().is("a") == false){
// 						var promotionsLink = jQuery(this).find("img").attr("src");
// 						jQuery(this).find("img").wrap("<a href='"+promotionsLink+"' target='_blank'></a>");
// 					};
// 				});
// 			}else{
// 				if(jQuery(".promotions-list li").find("img").parent().is("a")){
// 					jQuery(".promotions-list li").each(function(){
// 						jQuery(this).find("img").unwrap();
// 					});
// 				}
// 			}
// 		}
// 	}

// 	promotions();	

// 	altura = jQuery(".div-responsive").height();
// 	jQuery(".div-responsive").css("height", 0);
	
// 	jQuery("#trigger-covermenu").on('click touchstart', function(e){
// 		jQuery(this).toggleClass("active");
// 		jQuery(".div-responsive").toggleClass("open");

// 		jQuery('html').toggleClass('menu-active');
// 	  	e.preventDefault();

// 	  	if(jQuery(".div-responsive").hasClass("open")){
// 	  		jQuery(".div-responsive.open").css("height", altura);
// 	  	}else{
// 	  		jQuery(".div-responsive").css("height", 0);
// 	  	}
// 	});

// 	jQuery(".fancybox").fancybox({
// 		helpers:{
// 			overlay:{
// 				locked: false
// 			}
// 		}
// 	});

// 	var now = new Date();

// 	if( jQuery("body").hasClass("page-id-304") || jQuery("body").hasClass("page-id-942") ){
// 		jQuery.datepicker.setDefaults({
// 			dateFormat: 'dd/mm/yy',
// 			dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
// 			dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
// 			dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
// 			monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
// 			monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
// 			numberOfMonths: 1,
// 			minDate: now,
// 			showOtherMonths: true,
// 			selectOtherMonths: false,
// 			numberOfMonths: 1
// 		});

// 		jQuery("#ap-1-ida").datepicker({
// 			onClose: function(selectedDate){
// 				var localDate = selectedDate.split("/");
// 		        var foreignDate = localDate[1]+"/"+localDate[0]+"/"+localDate[2];
// 		        var dtMin = new Date(foreignDate);
// 		        dtMin.setDate(dtMin.getDate() + 1);
// 		        jQuery('#ap-1-volta').datepicker("option", "minDate", dtMin);
// 		        dtMinBr = ("0" + dtMin.getDate()).slice(-2) +"/"+ ("0" + (dtMin.getMonth()+1)).slice(-2) +"/"+ dtMin.getFullYear();
// 			}
// 		});

// 		jQuery("#ap-1-volta").datepicker({
// 			onClose: function(selectedDate){
// 	        	jQuery("#ap-1-ida").datepicker("option", "maxDate", selectedDate);
// 	      	}
// 		});

// 		jQuery("#ap-2-ida").datepicker({
// 			onClose: function(selectedDate){
// 				var localDate = selectedDate.split("/");
// 		        var foreignDate = localDate[1]+"/"+localDate[0]+"/"+localDate[2];
// 		        var dtMin = new Date(foreignDate);
// 		        dtMin.setDate(dtMin.getDate() + 1);
// 		        jQuery('#ap-2-volta').datepicker("option", "minDate", dtMin);
// 		        dtMinBr = ("0" + dtMin.getDate()).slice(-2) +"/"+ ("0" + (dtMin.getMonth()+1)).slice(-2) +"/"+ dtMin.getFullYear();
// 			}
// 		});

// 		jQuery("#ap-2-volta").datepicker({
// 			onClose: function(selectedDate){
// 	        	jQuery("#ap-2-ida").datepicker("option", "maxDate", selectedDate);
// 	      	}
// 		});

// 		jQuery("#ap-3-ida").datepicker({
// 			onClose: function(selectedDate){
// 				var localDate = selectedDate.split("/");
// 		        var foreignDate = localDate[1]+"/"+localDate[0]+"/"+localDate[2];
// 		        var dtMin = new Date(foreignDate);
// 		        dtMin.setDate(dtMin.getDate() + 1);
// 		        jQuery('#ap-3-volta').datepicker("option", "minDate", dtMin);
// 		        dtMinBr = ("0" + dtMin.getDate()).slice(-2) +"/"+ ("0" + (dtMin.getMonth()+1)).slice(-2) +"/"+ dtMin.getFullYear();
// 			}
// 		});

// 		jQuery("#ap-3-volta").datepicker({
// 			onClose: function(selectedDate){
// 	        	jQuery("#ap-3-ida").datepicker("option", "maxDate", selectedDate);
// 	      	}
// 		});
// 	}

// 	var container = jQuery('.container-erro');

// 	jQuery("#comprar").validate({
//     	errorContainer: container,
//         errorLabelContainer: jQuery(container),
//         wrapper: 'p',
//         submitHandler: function(form){
//         	jQuery("#comprar input[type='submit']").prop('disabled', true);
//             var dados = jQuery(form).serialize();
//             var formulario = jQuery(form);
//             jQuery.ajax({
//                 type: "POST",
//                 url: "/wp-content/themes/rio-quente/envia-comprar.php",
//                 data: dados,
//                 success: function(data){
//                     alert(data);
//                 }
//             });
//             return false;
//         }
//     });

//     jQuery("#comprar-caldas").validate({
//     	errorContainer: container,
//         errorLabelContainer: jQuery(container),
//         wrapper: 'p',
//         submitHandler: function(form){
//         	jQuery("#comprar-caldas input[type='submit']").prop('disabled', true);
//             var dados = jQuery(form).serialize();
//             var formulario = jQuery(form);
//             jQuery.ajax({
//                 type: "POST",
//                 url: "/wp-content/themes/rio-quente/envia-comprar-caldas.php",
//                 data: dados,
//                 success: function(data){
//                     alert(data);
//                 }
//             });
//             return false;
//         }
//     });

// 	jQuery("#telefone").mask("?(99) 9999-99999");

//     jQuery("#contato").validate({
//     	errorContainer: container,
//         errorLabelContainer: jQuery(container),
//         wrapper: 'p',
//         submitHandler: function(form){
//         	jQuery("#contato input[type='submit']").prop('disabled', true);
//             var dados = jQuery(form).serialize();
//             var formulario = jQuery(form);
//             jQuery.ajax({
//                 type: "POST",
//                 url: "/wp-content/themes/rio-quente/envia-contato.php",
//                 data: dados,
//                 success: function(data){
//                     alert(data);
//                 }
//             });
//             return false;
//         }
//     });

//     jQuery("#contato-grupos").validate({
//     	errorContainer: container,
//         errorLabelContainer: jQuery(container),
//         wrapper: 'p',
//         submitHandler: function(form){
//         	jQuery("#contato-grupos input[type='submit']").prop('disabled', true);
//             var dados = jQuery(form).serialize();
//             var formulario = jQuery(form);
//             jQuery.ajax({
//                 type: "POST",
//                 url: "/wp-content/themes/rio-quente/envia-contato-grupos.php",
//                 data: dados,
//                 success: function(data){
//                     alert(data);
//                 }
//             });
//             return false;
//         }
//     });

// 	jQuery(".ap-criancas").each(function(){
// 		jQuery(this).val("0");
// 	});

// 	jQuery("[name=ap-1-criancas-idade1], [name=ap-1-criancas-idade2], [name=ap-2-criancas-idade1], [name=ap-2-criancas-idade2], [name=ap-3-criancas-idade1], [name=ap-3-criancas-idade2]").val("");

// 	jQuery(".ap-criancas").change(function(){
// 		var qtdCriancas = jQuery(this).val();
		
// 		if(qtdCriancas == 1){
// 			jQuery(this).parent().parent().parent().find(".criancas, .crianca1").show();
// 			jQuery(this).parent().parent().parent().find(".crianca2").hide();
// 		}else if(qtdCriancas == 2){
// 			jQuery(this).parent().parent().parent().find(".criancas, .crianca1, .crianca2").show();
// 		}else{
// 			jQuery(this).parent().parent().parent().find(".criancas, .crianca1, .crianca2").hide();
// 		}
// 	});

// 	jQuery("#qtd-ap, #qtd-ap-caldas").val("1");

// 	jQuery("#qtd-ap, #qtd-ap-caldas").change(function(){
// 		var qtdAp = jQuery(this).val();
		
// 		if(qtdAp == 1){
// 			jQuery(".ap").hide();
// 			jQuery(".ap1").show();
// 		}else if(qtdAp == 2){
// 			jQuery(".ap3").hide();
// 			jQuery(".ap1, .ap2").show();
// 		}else{
// 			jQuery(".ap1, .ap2, .ap3").show();
// 		}
// 	});

// 	function changeTabs(number){
// 		if(jQuery(".nav-tabs").length > 0){
// 			jQuery('.nav-tabs a').eq(number).tab("show");
// 			changeHash = jQuery('.nav-tabs a').eq(number).attr("href");
// 			history.pushState(null, null, changeHash);
// 			tab = jQuery(".nav-tabs li").eq(number).find("a").attr('href');
// 			fuckGaleria();
// 		}
// 	}

// 	if(jQuery('#banner-paginacao').length > 0){
// 		var bannerInternas = new Swiper('#banner-paginacao',{
// 	        calculateHeight: true,
// 	        roundLengths: true,
// 	        autoResize: true,
// 	        speed: 400,
// 	        autoplay: 5000,
// 	        autoplayDisableOnInteraction: false,
// 	        pagination: '.swiper-pagination',
// 	        nextButton: '#banner-paginacao .swiper-button-next',
//             prevButton: '#banner-paginacao .swiper-button-prev',
//         	paginationClickable: true
// 	    });
// 	}

// 	if(jQuery('#banner-com-thumbs').length > 0){
// 	    var bannerInternas = new Swiper('#banner-com-thumbs',{
// 	        calculateHeight: true,
// 	        roundLengths: true,
// 	        autoResize: true,
// 	        speed: 400,
// 	        pagination: '.swiper-pagination-banner',
//         	paginationClickable: true
// 	    });	    

// 		slideThumbs = bannerInternas.activeIndex;
// 		jQuery(".banner-thumbs .col-sm-2").eq(slideThumbs).find(".banner-thumbs-img").addClass("actived");

// 	    bannerInternas.on('slideChangeStart', function () {
// 	        slideThumbs = bannerInternas.activeIndex;
// 	        jQuery(".banner-thumbs .col-sm-2").find(".banner-thumbs-img").removeClass("actived");
// 	        jQuery(".banner-thumbs .col-sm-2").eq(slideThumbs).find(".banner-thumbs-img").addClass("actived");
// 	        changeTabs(slideThumbs);
// 	    });

// 	    jQuery(".banner-thumbs-img").click(function(e){
// 	    	e.preventDefault();
// 		    indexBanner = jQuery(this).parent().index();
// 		    jQuery(".banner-thumbs-img").removeClass("actived");
// 		    jQuery(this).toggleClass("actived");
// 		    bannerInternas.slideTo(indexBanner);
// 		    changeTabs(slideThumbs);
// 		});

// 	};

// 	function activedGaleriaThumb(index, parent){
// 		jQuery(".galeria-thumb", parent).find(".banner-img").removeClass("actived");
// 	    jQuery(".galeria-thumb .swiper-slide", parent).eq(index).find(".banner-img").addClass("actived");
// 	}

// 	if(jQuery('#slides-hotels-home').length > 0){
// 		if(widthWindow <= 767){
// 			var swiperHotelsHome = new Swiper('#slides-hotels-home',{
// 				slidesPerView: 2,
//         		slidesPerColumn: 1,
// 		        slidesPerColumnFill: 'row',
// 		        spaceBetween: 10,
// 		        pagination: '.swiper-pagination',
//         		paginationClickable: true
// 		    });
// 		}else{
// 			var swiperHotelsHome = new Swiper('#slides-hotels-home',{
// 				slidesPerView: 3,
//         		slidesPerColumn: 2,
// 		        slidesPerColumnFill: 'row',
// 		        spaceBetween: 10
// 		    });
// 		}
// 	}

// 	if(jQuery("#banner-home").length > 0){
//         var bannerHome = new Swiper('#banner-home .swiper-container',{
//             slidesPerView: 1,
//             prevButton: '#banner-home .swiper-button-prev',
//             nextButton: '#banner-home .swiper-button-next',
//             pagination: '#banner-home .swiper-pagination',
//             paginationClickable: true
//         });

//         if(widthWindow < 769){
// 			if( jQuery("#banner-home .swiper-slide").children().hasClass("embed-container") == true ){
// 				bannerHome.removeSlide(0);
// 			}
// 		}
//     };

// 	jQuery(window).resize(function(){
// 		heightWindow = jQuery(window).height();
// 		promotions();
// 	});

// 	function fuckGaleria(){
// 			if(jQuery('.galeria').length > 0){

// 				jQuery('.galeria').each(function(){
// 					try{
// 						this.swiper.destroy(true, true);
// 					}catch(err){
// 				    	//console.log(err.message)
// 				    };
// 				});
// 				jQuery('.galeria-thumb').each(function(){
// 					try{
// 						this.swiper.destroy(true, true);
// 				    } 
// 				    catch(err){
// 				    	//console.log(err.message)
// 				    };
// 				});

// 				new Swiper(jQuery('.galeria', tab)[0], {
// 			        calculateHeight: true,
// 			        roundLengths: true,
// 			        autoResize: true,
// 			        speed: 400,
// 			        nextButton: '.banner-next',
// 			        prevButton: '.banner-prev'
// 			    });
		    
// 			    jQuery('.galeria', tab)[0].swiper.on('slideChangeStart', function () {
// 			    	var indexBannerGaleria = jQuery('.galeria', tab)[0].swiper.activeIndex;
// 			    	jQuery('.galeria-thumb', tab)[0].swiper.slideTo(indexBannerGaleria);
// 			    	jQuery('.galeria-thumb', tab).find(".banner-img").removeClass("actived");
// 			    	activedGaleriaThumb(indexBannerGaleria, tab);
// 			    });

// 				if(widthWindow <= 767){
// 					new Swiper(jQuery('.galeria-thumb', tab)[0], {
// 						direction: "horizontal",
// 						slidesPerView: 5,
// 				        calculateHeight: true,
// 				        roundLengths: true,
// 				        autoResize: true,
// 				        speed: 400,
// 				        pagination: '.swiper-pagination',
// 				        nextButton: '.galeria-thumb-next',
// 			        	prevButton: '.galeria-thumb-prev',
// 				    });
// 				}else{
// 					new Swiper(jQuery('.galeria-thumb', tab)[0], {
// 						direction: "vertical",
// 						slidesPerView: 4,
// 						spaceBetween: 25,
// 				        calculateHeight: true,
// 				        roundLengths: true,
// 				        autoResize: true,
// 				        speed: 400,
// 				        nextButton: '.galeria-thumb-next',
// 			        	prevButton: '.galeria-thumb-prev',
// 				    });
// 				}

// 			   	var indexBanner = jQuery('.galeria-thumb', tab)[0].swiper.activeIndex;
// 				jQuery(".galeria-thumb .swiper-slide", tab).eq(indexBanner).find(".banner-img").addClass("actived");

// 				jQuery('.galeria-thumb', tab).on("click", function(){
// 			    	indexBanner = jQuery('.galeria-thumb', tab)[0].swiper.clickedIndex;
// 			    	jQuery('.galeria', tab)[0].swiper.slideTo(indexBanner);
// 			    	activedGaleriaThumb(indexBanner, tab);
// 			    });

// 			}
// 		}

// 	jQuery('.nav-tabs').on('click', 'a', function(e){
// 		e.preventDefault();
// 		tab = jQuery(jQuery(this).attr('href'));
		
// 		window.location.hash = jQuery(this).attr('href');
// 		indexTab = jQuery(this).parent().index();		
// 		jQuery(this).tab('show');
// 		jQuery(".banner-thumbs .col-sm-2", tab).find(".banner-thumbs-img").removeClass("actived");
// 	    jQuery(".banner-thumbs .col-sm-2", tab).eq(indexTab).find(".banner-thumbs-img").addClass("actived");
// 	    bannerInternas.slideTo(indexTab);
// 	    fuckGaleria();
// 	})

// 	if(window.location.hash){
// 		indexHash = jQuery('.nav-tabs').find('a[href="'+window.location.hash+'"]').parent().index();
// 		jQuery(".banner-thumbs .col-sm-2").find(".banner-thumbs-img").removeClass("actived");
// 		jQuery(".banner-thumbs .col-sm-2").eq(indexHash).find(".banner-thumbs-img").addClass("actived");
// 		bannerInternas.slideTo(indexHash);
// 		if(indexHash == 0){
// 			jQuery('.nav-tabs li').eq(0).find("a").tab("show");
// 			tab = jQuery(".nav-tabs li").eq(0).find("a").attr('href');
// 			fuckGaleria();
// 		}
// 	}else{
// 		jQuery('.nav-tabs li').eq(0).find("a").tab("show");
// 		tab = jQuery(".nav-tabs li").eq(0).find("a").attr('href');
// 		fuckGaleria();
// 	}
});

var tag = document.createElement('script');
tag.src = "//www.youtube.com/iframe_api";

var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('ytplayer', {
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady() {
    player.playVideo();
    // Mute!
    player.mute();
}