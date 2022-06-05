require('./bootstrap');

$(document).ready(function(){
    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        disableTouchKeyboard: true,
        format: 'yyyy-mm-dd'
    });
    $(".tm-alert .close").click(function(){
        $(".tm-alert").toggleClass("d-none");
    });
    $(".tm-sidebar-open").click(function(){
        $(".tm-sidebar").toggleClass("d-flex");
        $(".tm-sidebar").removeClass("d-none");
    });
    $(".tm-sidebar-close").click(function(){
        $(".tm-sidebar").toggleClass("d-none");
        $(".tm-sidebar").removeClass("d-flex");
    });
    $(document).on('change', ".tm-file-input", function() {
        if ($(this).val()) {
            var filename = $(this).val().split("\\");
            filename = filename[filename.length - 1];
            $(this).attr('data-content', filename);
        }
    });
    $(document).on('submit', "form.loading", function() {
        $(this).find('button[type=submit]').attr('disabled', true).append('<i class="fa fa-spinner fa-pulse"></i>');
    });
});
