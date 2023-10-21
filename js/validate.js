$.fn.goValidate = function() {
    var $form = this,
        $inputs = $form.find('input:text, input:password'),
        $selects = $form.find('select'),
        $textAreas = $form.find('textarea');
  
    var validators = {
        name: {
            regex: /^[A-Za-z]{3,}$/
        },
        username: {
            regex: /^[A-Za-z]{6,}$/
        },
        firstName: {
            regex: /^[A-Za-z]{3,}$/
        },
        lastName: {
            regex: /^[A-Za-z]{3,}$/
        },
        town: {
            regex: /^[A-Za-z]{3,}$/
        },
        postcode: {
            regex: /^.{3,}$/
        },
        password1: {
            regex: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/
        },
        password1_repeat: {
            regex: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/
        },
        email: {
            regex: /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/
        },
        phone: {
            regex: /^[2-9]\d{2}-\d{3}-\d{4}$/,
        },
        body: {
            regex: /^.{3,}$/
        },
        country: {
            regex: /^(?=\s*\S).*$/,
        }
    };
    var validate = function(klass, value) {
        var isValid = true,
            error = '';
            
        if (!value && /required/.test(klass)) {
            error = 'This field is required';
            isValid = false;
        } else {
            klass = klass.split(/\s/);
            $.each(klass, function(i, k){
                if (validators[k]) {
                    if (value && !validators[k].regex.test(value)) {
                        isValid = false;
                        error = validators[k].error;
                    }
                }
            });
        }
        return {
            isValid: isValid,
            error: error
        }
    };
    var showError = function($e) {
        var klass = $e.attr('class'),
            value = $e.val(),
            test = validate(klass, value);
      
        $e.removeClass('invalid');
        $('#form-error').addClass('hide');
        
        if (!test.isValid) {
            $e.addClass('invalid');
            
            if(typeof $e.data("shown") == "undefined" || $e.data("shown") == false){
               $e.popover('show');
            }
            
        }
      else {
        $e.popover('hide');
      }
    };
   
    $inputs.keyup(function() {
        showError($(this));
    });
    $selects.change(function() {
        showError($(this));
    });
    $textAreas.keyup(function() {
        showError($(this));
    });
  
    $inputs.on('shown.bs.popover', function () {
  		$(this).data("shown",true);
	});
  
    $inputs.on('hidden.bs.popover', function () {
  		$(this).data("shown",false);
	});
  
    $form.submit(function(e) {
      
        $inputs.each(function() { /* test each input */
        	if ($(this).is('.required') || $(this).hasClass('invalid')) {
            	showError($(this));
        	}
    	});
    	$selects.each(function() { /* test each input */
        	if ($(this).is('.required') || $(this).hasClass('invalid')) {
            	showError($(this));
        	}
    	});
    	$textAreas.each(function() { /* test each input */
        	if ($(this).is('.required') || $(this).hasClass('invalid')) {
            	showError($(this));
        	}
    	});
        if ($form.find('input.invalid').length) { /* form is not valid */
        	e.preventDefault();
            $('#form-error').toggleClass('hide');
        }
    });
    return this;
};



	$('form').goValidate();
    / leanModal v1.1 by Ray Stone - http://finelysliced.com.au
    
// Dual licensed under the MIT and GPL

(function($){$.fn.extend({leanModal:function(options){var defaults={top:100,overlay:0.5,closeButton:null};var overlay=$("<div id='lean_overlay'></div>");$("body").append(overlay);options=$.extend(defaults,options);return this.each(function(){var o=options;$(this).click(function(e){var modal_id=$(this).attr("href");$("#lean_overlay").click(function(){close_modal(modal_id)});$(o.closeButton).click(function(){close_modal(modal_id)});var modal_height=$(modal_id).outerHeight();var modal_width=$(modal_id).outerWidth();
$("#lean_overlay").css({"display":"block",opacity:0});$("#lean_overlay").fadeTo(200,o.overlay);$(modal_id).css({"display":"block","position":"fixed","opacity":0,"z-index":11000,"left":50+"%","margin-left":-(modal_width/2)+"px","top":o.top+"px"});$(modal_id).fadeTo(200,1);e.preventDefault()})});function close_modal(modal_id){$("#lean_overlay").fadeOut(200);$(modal_id).css({"display":"none"})}}})})(jQuery);
