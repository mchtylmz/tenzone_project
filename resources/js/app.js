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
});
