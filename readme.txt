=== Outbound-Link-Tracking ===
Contributors: mmcachran
Tags: outbound links, google analytics
Requires at least: 3.8
Tested up to: 4.0
Stable tag: trunk

Open outbound links in a new window and track using GA

== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

== Usage ==

After activation, all external anchor links on your site will open in a new window and will be tracked if Google Analytics is enabled.  If you do not want a link to be tracked and open in a new window, add .no-track or .internal to your anchor tag.

Example:

<a href="http://google.com" class="no-track">Google</a>
