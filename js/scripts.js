// jQuery(window).load(function(){
// 	alert('dfdf');
// });
//

var steps_args = [];
var values = [];

function check_select_multiple_values(){
	jQuery(".chosen-select").each(function(){
		jQuery('.chosen-select :selected').each(function(i, selected){
		  values[i] = jQuery(selected).text();
		});

		if (values) {
			var title = jQuery(this).parents(".element_row").find(".text_div").html();
			var step 		 =  jQuery(this).parents(".element_row").data("step");
			var multi_title  = 	jQuery(this).parents(".element_row").find('.text_div').html();
			steps_args.push( { title: title , step: step, value: values } );
		}
	})
}

function check_select_values(){
	jQuery(".step_select_element").each(function(k,v){
		if( jQuery(this).val() ) {
			var select_val  = jQuery(this).val();
			var step 		= jQuery(this).parents(".element_row").data("step");
			var title 	= jQuery(this).parents(".element_row").find('.text_div').html();
			var option_val = jQuery(this).find(':selected').attr('data-id');

			steps_args.push( { title: title , step: step, value: select_val } );
		}
	});
}

function check_slider_values(){
	jQuery('.slider').each(function(k,v){
		var slider_val  = jQuery(this).find('.sliderOutput').val();
		var step 		= jQuery(this).parents(".element_row").data("step");
		var title 	= jQuery(this).parents(".element_row").find('.text_div').html();
		var radio_val = jQuery(this).find(':selected').attr('data-id');

		steps_args.push( { title: title ,step: step, value: slider_val  } );
		jQuery(this).find('span.slider-fill').css( 'background-color' , '#f68d38');
	})
}

function check_radio_values(){
	jQuery('input.radio_yes_no:checked').each(function() {
		var radio_val 		= jQuery(this).val();
		var radio_data_id 	= jQuery(this).attr('data-id');
		var radio_data_val 	= jQuery(this).attr('data-value');
		var step 		= jQuery(this).parents(".element_row").data("step");
		var title 	= jQuery(this).parents(".element_row").find('.text_div').html();

		steps_args.push( {title: title ,  step: step, value: radio_data_val } );
	});
}

function fullname_email_values(){
    var firstname    = jQuery('input:text[name=center_firstname]').val();
    var lastname     = jQuery('input:text[name=center_lastname]').val();
    var email        = jQuery('input[name=center_email]').val();
    if (email && firstname) {
		jQuery('.last_element_row').find(".steps").addClass("step_done");
    }
}

function validate_steps_form(){
	check_select_values();
	check_select_multiple_values();
	check_slider_values();
	check_radio_values();
	fullname_email_values();

}
function mark_as_complete(element){
	jQuery(element).parents(".element_row").find(".steps").addClass("step_done");
}

jQuery(document).ready(function(){

	jQuery("a.prevent").click(function(e){
		e.preventDefault();
	});

	//
	jQuery(".radio_div input,.select_div select").change(function(){
		mark_as_complete(this);
	});

	jQuery('.slider').bind('keyup mouseup', function () {
		mark_as_complete(this);
	});

	var window_width = jQuery( window ).width();

	if (window_width > 664) {
		var maxHeight = -1;

	    jQuery('section.stories_sec .stories_row .story_box .inner_div').each(function() {
	      maxHeight = maxHeight > jQuery(this).height() ? maxHeight : jQuery(this).height();
	    });

	    jQuery('section.stories_sec .stories_row .story_box .inner_div').each(function() {
	      jQuery(this).height(maxHeight);
	    });

	}

	jQuery.scrollSpeed(180, 700);

	rtl = false;

	if(jQuery("body").hasClass("rtl")){
		rtl = true;
	}

	jQuery(".chosen-select").chosen();

	if(jQuery('.slider_div').length){
		jQuery('.slider_div').slick({
			infinite: true,
			speed: 800,
			fade: true,
			autoplay: false,
			rtl: rtl,
  			autoplaySpeed: 2000,
			slidesToShow: 1,
 			slidesToScroll: 1,
 			focusOnSelect: false,
			prevArrow: '<div class="carousel-prev carousel-arr"></div>',
			nextArrow: '<div class="carousel-next carousel-arr"></div>',
			responsive: [
				{
					breakpoint: 767,
					settings: {
						arrows:false,
						slidesToShow: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						dots:false,
						slidesToShow: 1
					}
				}
			]
		});
	}


	if(jQuery('.home_bg').length){
		jQuery('.home_bg').slick({
			infinite: true,
			speed: 1000,
			fade: true,
			dots: true,
			autoplay: true,
			rtl: rtl,
  			autoplaySpeed: 1800,
			slidesToShow: 1,
 			slidesToScroll: 1,
 			focusOnSelect: false,
			responsive: [
				{
					breakpoint: 767,
					settings: {
						arrows:false,
						slidesToShow: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						dots:false,
						slidesToShow: 1
					}
				}
			]
		});
	}


	var termuse = jQuery('li.termuse > a').attr('href');
	var url_termofuse = termuse + '#termuse';
	jQuery('li.termuse > a').attr('href', url_termofuse);

	jQuery(".checkbox_designed label").click(function(){
		if(jQuery(this).find("input").is(":checked")){
			jQuery(this).parents(".checkbox_designed").addClass("active");
		}else{
			jQuery(this).parents(".checkbox_designed").removeClass("active");
		}
	});

	jQuery("#select_sort").change(function() {
		var value = jQuery('option:selected', this).val();
		var url = jQuery('option:selected', this).attr('data-url');
		if(value== 0){
			location.href = url;
		}
		//console.log(url);
	location.href = url;
	});


	jQuery('.physician_row ul li.tabs-title>a').click(function(e) {
		e.preventDefault();
	});

	jQuery('#tab_world').click(function() {
		jQuery('section.centers_sec .steps_wrap .main_content .form_div_step2 .sort_div').show();
		jQuery('section.centers_sec .steps_wrap .main_content .form_div_step2 .sort_div').css('display', ' table');
	});

	jQuery('#tab_local').click(function() {
		jQuery('section.centers_sec .steps_wrap .main_content .form_div_step2 .sort_div').hide();
	});

	jQuery('.btn_icon').click(function() {
		jQuery('.search_div_open').slideToggle( "fast", function() {
			jQuery('.btn_icon img.search_icon_act').show();
			jQuery('.btn_icon img.search_icon').hide();
			jQuery('input.input_search').focus();
		});
		return false;
	});

	jQuery('.accordion-section-title').click(function(e) {
		e.preventDefault();
		var currentAttrValue = jQuery(this).attr('href');
		if(jQuery(e.target).is('.active')) {
			close_accordion_section();
		} else {
			close_accordion_section();
			jQuery(this).addClass('active');
			jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
		}
	});

	if (jQuery('.physician_row > ul.tabs > li').hasClass('is-active')) {
		jQuery(this).find('.tab_list_img_active').css('margin', '0 auto');
		// jQuery(this).siblings().find('img.tab_list_img_active').hide();
		// jQuery(this).siblings().find('img.tab_list_img').show();
	}

	jQuery('.physician_row ul.tabs li a').click(function(e) {
		jQuery(this).parent().siblings().find('img.tab_list_img_active').hide();
		jQuery(this).parent().siblings().find('img.tab_list_img').show();
		jQuery('.physician_row ul.tabs li a .img.tab_list_img').show();
		jQuery('.physician_row ul.tabs li a .img.tab_list_img').show();
		jQuery(this).find('img.tab_list_img_active').show();
		jQuery(this).find('img.tab_list_img').hide();
	});

	// jQuery('select#select_opt').change(function() {
		// 	jQuery('.step_2').addClass(' step_done ');
		// 	jQuery(this).css('border', '3px solid #f68d38');
		// });



		// jQuery('[data-slider]').bind('keyup mouseup', function () {
		// 	jQuery('#range_slide span.slider-fill').css( 'background-color' , '#f68d38');
		//     jQuery('.step_3').addClass(' step_done ');
		// });




		// jQuery('[data-slider]').bind('keyup mouseup', function () {
		// 	jQuery('#range_slide span.slider-fill').css( 'background-color' , '#f68d38');
		//     jQuery('.step_3').addClass(' step_done ');
		// });




	jQuery('input[name=center_email]').first().keyup(function () {
	    var email = this.value;
	    validateEmail(email);
	});

     jQuery('.mrgfus_pop').magnificPopup({
     items: {
          type:'inline',
          src: '#mrgfus_popup'
      }
    });


	fix_mrgfus_pos();

	jQuery(document).foundation();


	jQuery("button.close-button").click(function(){
		iframe_src = jQuery(this).parents(".reveal").find("iframe").attr("src");
		if(iframe_src){
			jQuery(this).parents(".reveal").find("iframe").attr("src",iframe_src);
		}
	})
});


function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('#') + 1).split('#');
    return hashes;
}

function fix_mrgfus_pos(){
    jQuery(".tab_text_div").each(function(){
		if (jQuery(this).find(".dis_col").hasClass('right_pos')) {
			//console.log('sdsd');
	        var targetElement = jQuery(this).find(".dis_col");
	        var moviedElement = jQuery(this).find(".contents_col").first();
	        jQuery(targetElement).insertAfter(moviedElement);
		}
    })
}

function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if (!emailReg.test(email) || jQuery('input[name=center_email]').val() == '') {
      	 jQuery('.step_4').removeClass('step_done');
    } else {
         jQuery('.step_4').addClass(' step_done ');
    }
}

function close_accordion_section() {
	jQuery('.accordion .accordion-section-title').removeClass('active');
	jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
}

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};

function nofityUser(message) {
    var n = noty({
        text  : message,
        layout: 'topRight',
        type  : 'success',
        timeout: 3000,
        animation: {
            open  : 'animated bounceIn',
            close : 'animated bounceOut',
            easing: 'swing',
            speed : 500
        }
    });
}
