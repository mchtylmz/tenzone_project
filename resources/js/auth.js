require('./bootstrap');

$(function() {
    $(document).on('keyup keypress keydown', '.form-control', function(e){
        $(this).removeClass('has-error');
    });
    $('.datepicker').datepicker({
        autoclose: true,
        endDate: new Date(),
        todayHighlight: true,
        disableTouchKeyboard: true,
        format: 'yyyy-mm-dd'
    });
    $.validator.addMethod(
        'emailCustom',
        function(value, element) {
            let regexEmail = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regexEmail.test(value);
        }
    );

    $('form#login').validate({
        errorClass: "has-error",
        validClass: "has-success",
        rules: {
            email: {required: true, emailCustom: true},
            password: {required : true, minlength: 6}
        },
        messages: typeof ruleMessages != 'undefined' ? ruleMessages : {},
        submitHandler: function (form) {
            ajaxForm(form);
        }
    });

    var allPrevBtn = $('.btn-prev'),
        allNextBtn = $('.btn-next');

    allPrevBtn.click(function(){
        var curStep = $(this).closest(".step-content"),
            prevStep = $(this).data('prev'),
            curStepBtn = curStep.attr("id");

        $('#' + curStepBtn).hide();
        $('#' + prevStep).fadeIn();
    });
    allNextBtn.click(function(){
        var curStep = $(this).closest(".step-content"),
            nextStep = $(this).data('next'),
            curStepBtn = curStep.attr("id"),
            curInputs = curStep.find("input[type='text'],input[type='password'],input[type='email'],input[type='tel']"),
            isValid = true;

        $(".form-control").removeClass("has-error");
        for(let i = 0; i < curInputs.length; i++){
            console.log(curInputs[i].validity.valid);
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).addClass("has-error");
            }
        }
        $('form#register').valid();

        if (isValid && nextStep == 'step2' && $('form#register').valid()) {
            $('#' + curStepBtn).hide();
            $('#' + nextStep).fadeIn();
        }
    });
    $('form#register').validate({
        errorClass: "has-error",
        validClass: "has-success",
        rules: {
            name: 'required',
            surname: 'required',
            email: {required: true, emailCustom: true},
            phone: {required: true, number: true, minlength: 6},
            password: {required : true, minlength: 6},
            password_confirmation: {required : true, minlength: 6, equalTo : "#password"},
            child_name: 'required',
            child_surname: 'required',
            child_email: {required: true, emailCustom: true},
            child_password: {required : true, minlength: 6},
            child_dob:  'required',
            child_gender: 'required'
        },
        messages: typeof ruleMessages != 'undefined' ? ruleMessages : {},
        submitHandler: function (form) {
            ajaxForm(form);
        }
    });
    const ajaxForm = function (form, okCallback = null) {
        $.ajax({
            url: form.action,
            type: "POST",
            data: $(form).serialize(),
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(form).find('button[type=submit]').attr('disabled', true);
                $(form).find('button[type=submit] > i').removeClass('d-none');
            },
            success: function(response, textStatus, xhr){
                if (okCallback) {
                    okCallback();
                } else if (response.redirect) {
                    window.location.href = response.redirect;
                } else if ([200, 201, 204].includes(xhr.status)) {
                    location.reload();
                } else {
                    SwalAlert({
                        text: lang.unknown_error,
                        icon: 'error',
                    });
                }
            },
            error: function (response) {
                SwalAlert({
                    text: response.responseJSON.message,
                    icon: 'error'
                });
            }
        }).always(function () {
            setTimeout(function () {
                $(form).find('button[type=submit]').attr('disabled', false).removeAttr('disabled');
                $(form).find('button[type=submit] > i').addClass('d-none');
            }, 500);
        });
    };
});
