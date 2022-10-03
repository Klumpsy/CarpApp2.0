const $ = require('jquery');
require('bootstrap');

$(document).ready(() => {
    $('[data-toggle="popover"]').popover();
})