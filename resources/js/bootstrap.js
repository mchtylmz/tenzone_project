 window._ = require('lodash');

try {
    require('bootstrap');
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('@popperjs/core');
    window.validate = require('jquery-validation');
    window.Swal = require('sweetalert2');
    window.datepicker = require('bootstrap-datepicker');

    window.SwalAlert = function(options) {
        let extOptions = $.extend({
            buttonsStyling: false,
            showConfirmButton: false,
            allowOutsideClick:false,
            allowEscapeKey:false,
            showCloseButton: true,
            type: 'info',
            timer: 5000,
            confirmButtonText: 'OK',
            confirmButtonClass: 'btn btn-dark',
            heightAuto: false,
            function: function ($callback) {
                if (typeof($callback) == 'function')
                    return $callback();
            }
        }, options);
        Swal.fire(extOptions).then((result) => {
            if (result.value) {
                extOptions.function(options.success);
            }
            if(options.redirect) {
                if (options.redirect == 'refresh') {
                    location.reload();
                } else {
                    window.location.href = options.redirect;
                }
            } // redirect
        });
    }
} catch (e) {}

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


