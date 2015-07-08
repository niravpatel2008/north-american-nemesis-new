function userSignup(formId)
{
	var ret = $('#'+formId).validationEngine('validate');
	if(ret)
	{
		$('#'+formId).submit();
	}
}
function ajaxindicatorstop()
{
    $('#resultLoading .bg').height('100%');
     $('#resultLoading').fadeOut(300);
    $('body').css('cursor', 'default');
}
function ajaxindicatorstart(text)
{
	if($('body').find('#resultLoading').attr('id') != 'resultLoading'){
		$('body').append('<div id="resultLoading" style="display:none"><div><img src="'+baseurl+'public/images/ajax-loader.gif"><div>'+text+'</div></div><div class="bg"></div></div>');
	}
	$('#resultLoading>div:first').css({
		'width': '250px',
		'height':'75px',
		'text-align': 'center',
		'position': 'fixed',
		'top':'0',
		'left':'0',
		'right':'0',
		'bottom':'0',
		'margin':'auto',
		'font-size':'16px',
		'z-index':'10',
		'color':'#ffffff'

	});


	$('#resultLoading .bg').height('100%');
    $('#resultLoading').fadeIn(3000);
    $('body').css('cursor', 'wait');
}
$(document).ready(function() {
	$('#frmSignup').on('submit', function(e){
		e.preventDefault();
		var ret = $('#frmSignup').validationEngine('validate');
		if(ret)
		{
			var url = baseurl+'signup/index';
			var data = $("#frmSignup").serialize();
			ajaxindicatorstart('we are setting up your account.. please wait..');
			
			$.post(url,data,function(e){
					ajaxindicatorstop();
					if(e == '-1'){
						alert("Unique Value Required for Email / Website / Subdomain");
					}
					else{
						location.href=e;
					}
			});
		}
	});
	//$("#frmSignup").validationEngine();
	/*$('.register form').submit(function(){
        $(this).find("label[for='firstname']").html('First Name');
        $(this).find("label[for='lastname']").html('Last Name');
        $(this).find("label[for='phone']").html('Phone No.');
        $(this).find("label[for='email']").html('Email');
        $(this).find("label[for='password']").html('Password');
		$(this).find("label[for='password2']").html('Confirm Password');
        ////
        var firstname = $(this).find('input#fname').val();
        var lastname = $(this).find('input#lname').val();
        var phone = $(this).find('input#phone').val();
        var email = $(this).find('input#email').val();
        var password = $(this).find('input#password').val();
		var password2 = $(this).find('input#password2').val();
        if(firstname == '') {
            $(this).find("label[for='firstname']").append("<span style='display:none' class='red'> - Please enter your first name.</span>");
            $(this).find("label[for='firstname'] span").fadeIn('medium');
            return false;
        }
        if(lastname == '') {
            $(this).find("label[for='lastname']").append("<span style='display:none' class='red'> - Please enter your last name.</span>");
            $(this).find("label[for='lastname'] span").fadeIn('medium');
            return false;
        }
        if(phone == '') {
            $(this).find("label[for='phone']").append("<span style='display:none' class='red'> - Please enter a valid phone.</span>");
            $(this).find("label[for='phone'] span").fadeIn('medium');
            return false;
        }
        if(email == '') {
            $(this).find("label[for='email']").append("<span style='display:none' class='red'> - Please enter a valid email.</span>");
            $(this).find("label[for='email'] span").fadeIn('medium');
            return false;
        }
        if(password == '') {
            $(this).find("label[for='password']").append("<span style='display:none' class='red'> - Please enter a valid password.</span>");
            $(this).find("label[for='password'] span").fadeIn('medium');
            return false;
        }
		if(password2 == '') {
            $(this).find("label[for='password2']").append("<span style='display:none' class='red'> - Please enter a valid confirm password.</span>");
            $(this).find("label[for='password2'] span").fadeIn('medium');
            return false;
        }
    });*/


});


