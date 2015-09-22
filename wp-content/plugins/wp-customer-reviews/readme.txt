=== WP Customer Reviews ===
Contributors: bompus
Donate link: http://www.gowebsolutions.com/wp-customer-reviews/
Tags: business, google, hcard, schema.org, hproduct, hreview, microformat, microformats, mu, places, plugin, product, rating, ratings, rdfa, review, review box, review widget, reviews, seo, service, snippet, snippets, testimonial, testimonials, widget, wordpressmu, wpmu
Requires at least: 3.0.0
Tested up to: 4.3
Stable tag: 3.0.0
License: MIT
License URI: http://opensource.org/licenses/MIT

Allows your visitors to leave business / product reviews. Testimonials are in Microdata / Microformat and may display star ratings in search results.

== Description ==

There are many sites that are crawling for user-generated reviews now, including Google Places and Google Local Search. WP Customer Reviews allows you to setup a specific page on your blog to receive customer testimonials for your business/service OR to write reviews about a product.

**Big News! Version 3 has been released.** [Click here for details](http://www.gowebsolutions.com/wp-customer-reviews/?from=wpcr3_directory_notice_1 "Click here for details")

* WP Multisite and Multiuser (WPMU / WPMS / Wordpress MU) compatible.
* All submissions are moderated, which means that YOU choose which reviews get shown.
* Reviews are displayed to visitors in a friendly format, but search engines see the Schema.org microformat.
* Multiple anti-spam measures to prevent automated spambots from submitting reviews.
* Completely customizable, including which fields to ask for, require, and show.
* Shortcodes available for inserting reviews and review form on any page or widget.
* Works with caching plugins and custom themes.
* Includes an external stylesheet so you can modify it to better fit your theme.
* Reviews can be edited by admin for content and date.
* Admin responses can be made and shown under each review.
* Support for adding your own custom fields.
* The plugin can be used on more than one page, and can be used on posts.
* Supports both `Business` and `Product` review types.
* Shows aggregate reviews microformat.
* Fast and lightweight, even including the star rating image. This plugin will not slow down your blog.
* Validates as valid XHTML 1.1 (W3C) and valid Microformats (Rich Snippets Testing Tool).
* And much more...

Almost every new feature that has been added was due to the generous support and suggestions of our users. If you have a suggestion or question, do not hesitate to ask in our forum.

More information at: [**WP Customer Reviews**](http://www.gowebsolutions.com/wp-customer-reviews/)

== Installation ==

1. Upload contents of compressed file (wp-customer-reviews) to the `/wp-content/plugins/` directory. 
2. Activate the plugin through the `Plugins` menu in WordPress admin.
3. Create a WordPress page to be used specifically for gathering reviews or testimonials.
4. Go into settings for WP Customer Reviews and configure the plugin.

== Screenshots ==

1. Front-end display
2. Submit a review (1)
3. Submit a review (2)
4. Admin moderation (1)
5. Admin moderation (2)
6. Plugin settings
7. Submit form settings
8. Display settings
9. Enabling a page for Business reviews
10. Enabling a page for Product reviews

== Frequently Asked Questions ==
* Bug Report / Feature Requests: [**Issue Tracker**](https://competelab.fogbugz.com/default.asp?pg=pgPublicEdit)
* Community Support Forum: [**Community Support Forum**](http://wordpress.org/tags/wp-customer-reviews?forum_id=10)

== Changelog ==

= 3.0.0 =
* [Update] Complete code cleanup and rewrite
* [Update] Complete overhaul of settings and management interface

= 2.4.8 =
* [Update] Updates to comply with WP plugin directory guidelines

= 2.4.7 =
* [Fix] Menu item in Admin Dashboard hides other plugin menu items

= 2.4.6 =
* [Fix] Fixed an issue where a non-breaking space character was not properly output in the footer aggregate review

= 2.4.5 =
* [Fix] In some cases, the database table was not being created on activation

= 2.4.3 =
* [Fix] We will leave clearing any caching plugins up to the user
* [Fix] Prevented some PHP notices in admin area

= 2.4.2 =
* [Fix] Reverting change - We will use the wp_update_post function to trigger caching plugins/WP to refresh their cache
* [Fix] Plugin was not honoring asking without requiring custom fields
* [Fix] Plugin was not saving data that was entered into custom fields
* [Update] We will no longer show "There are no reviews yet" verbiage, since shortcodes can do odd things. We may add this back in with a future update
* [Update] Added multiple methods of adding plugin CSS/JS into theme header

= 2.4.1 =
* [Fix] Admin - Minor fix for a user-reported error in admin
* [Update] An update to prevent firing of wp_update_post hooks. Please report any issues with cached pages not updating

= 2.4.0 =
* [Fix] Admin - Some checkbox plugin settings could not be saved

= 2.3.9 =
* [Fix] Admin - Added better support for WPMU and to ensure ongoing WP compatibility
* [Fix] Shortcodes were not outputting inside of the correct container
* [Update] An option has been added to hide the submit review form
* [Update] Shortcode implementation has been updated with additional options
* [Update] Cleaned up some more code that was triggering E_NOTICE warnings
* [Update] hCard output can now be displayed for better visibility to search engines

== Upgrade Notice ==

= 3.0.0 =
A complete overhaul of the codebase and management interface
