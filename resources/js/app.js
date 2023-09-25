
import 'toastr/toastr.scss';
import toastr from 'toastr';

window.toastr = toastr;

// Configure Toastr options
toastr.options = {
    closeButton: true,
    positionClass: 'toast-top-right',
    // Additional options can be set here
};

// Load jQuery
window.$ = window.jQuery = require('jquery');

// Load Bootstrap JavaScript and its dependencies
require('./bootstrap');
// Load DataTables JavaScript
// require('datatables.net');

// Add your custom scripts below this line
