<?php
function shortcode_year() {
    return '&copy; ' . date('Y');
}
add_shortcode('year', 'shortcode_year');

?>