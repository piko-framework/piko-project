"use strict"

import $ from 'jquery'
import 'bootstrap'
import '../scss/site.scss'

window.jQuery = $
window.$ = $

$(document).ready(function() {
    // Add the active class in the main menu
    $('#mainmenu a[href="' + location.pathname + '"]').parent().addClass('active')
});
