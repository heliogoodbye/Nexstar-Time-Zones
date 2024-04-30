<?php
/*
Plugin Name: Nexstar Time Zones
Plugin URI: #
Description: Display clocks for different timezones.
Version: 1.0
Author: Chris Stelly
Author URI: https://github.com/heliogoodbye
License: GPL3
*/

// Add shortcode for displaying clocks
add_shortcode('nexstar_time_zones', 'display_nexstar_time_zones');

// Enqueue the CSS stylesheet
add_action('wp_enqueue_scripts', 'nexstar_time_zones_enqueue_styles');

// Function to enqueue the CSS stylesheet
function nexstar_time_zones_enqueue_styles() {
    wp_enqueue_style('nexstar-timezones-style', plugins_url('nexstar-time-zones.css', __FILE__));
}

// Function to display clocks
function display_nexstar_time_zones($atts) {
    $atts = shortcode_atts(array(), $atts);

    ob_start(); ?>

    <div class="nexstar-timezones">
        <div class="clock">
            <h3 align="center">Hawaii</h3>
            <span id="hawaii-clock" class="timezone-clock"></span>
        </div>
        <div class="clock">
            <h3 align="center">Pacific</h3>
            <span id="pacific-clock" class="timezone-clock"></span>
        </div>
        <div class="clock">
            <h3 align="center">Mountain</h3>
            <span id="mountain-clock" class="timezone-clock"></span>
        </div>
        <div class="clock">
            <h3 align="center">Central</h3>
            <span id="central-clock" class="timezone-clock"></span>
        </div>
        <div class="clock">
            <h3 align="center">Eastern</h3>
            <span id="eastern-clock" class="timezone-clock"></span>
        </div>
    </div>

    <script>
    // Update clocks every second
    setInterval(function() {
        var now = new Date();

        // Hawaii Time
        document.getElementById("hawaii-clock").textContent = now.toLocaleTimeString("en-US", {timeZone: "Pacific/Honolulu"});

        // Pacific Time
        document.getElementById("pacific-clock").textContent = now.toLocaleTimeString("en-US", {timeZone: "America/Los_Angeles"});

        // Mountain Time
        document.getElementById("mountain-clock").textContent = now.toLocaleTimeString("en-US", {timeZone: "America/Denver"});

        // Central Time
        document.getElementById("central-clock").textContent = now.toLocaleTimeString("en-US", {timeZone: "America/Chicago"});

        // Eastern Time
        document.getElementById("eastern-clock").textContent = now.toLocaleTimeString("en-US", {timeZone: "America/New_York"});
    }, 1000);
    </script>

    <?php
    return ob_get_clean();
}
?>
