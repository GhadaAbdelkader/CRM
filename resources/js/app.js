import './bootstrap';
import 'flowbite';
import $ from 'jquery';
import 'jquery.nicescroll';
// import 'alpinejs';
//
// window.Alpine = Alpine;
//
// Alpine.start();


$(document).ready(function () {
    $("html, .scrollable").niceScroll({
        cursorcolor: "rgb(205, 205, 205)", // Scrollbar color
        cursorwidth: "8px",    // Scrollbar width
        background: "#F3F4F6",    // Background of the scrollbar
        cursorborder: "1px solid rgba(4, 116, 129, 0.08)", // Scrollbar border
        autohidemode: false,   // Always show the scrollbar
    });
});
