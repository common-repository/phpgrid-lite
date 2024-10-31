=== phpGrid Lite WordPress Plugin ===

Contributors: phpgrid
Tags: datagrid, grid, table
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: 1.2

The plugin is based on phpGrid Lite, a free version of phpGrid, to create fully customizable dynamic, database-driven datagrid/table in WordPress. 

== Description ==

phpGrid Lite WordPress Plugin is based on phpGrid Lite, a free version of phpGrid.  phpGrid is a simple and fully customizable PHP control for generating data-bound, AJAX, PHP datagrid. 

Grid-based editing, create, read, update and delete (CRUD), are the most common operations for web developers. With phpGrid web-based data editing is easy. Even with little programming background, one can develop professional looking, AJAX-enabled PHP datagrids in just a few minutes.

phpGrid Supports all major relational databases.

Features List:

* True cross-browser AJAX inline editing datagrid
* Supports all HTML form controls
* Integrated search toolbar
* Master detail datagrid
* Capable of displaying image
* Web-based form and inline editing
* MS Excel and HTML data export
* User rights data access permission control
* Customize look and feel through theme roller
* Built-in record sort by any column
* Fully supports all modern web browsers
* Databases support: MySQL, SQL Server, Oracle, and more.
* Handles large database record sets

== Installation ==

1. Upload `php_grid_lite.zip` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go phpGrid Lite menu on the left to create your first datagrid.

== Frequently Asked Questions ==

= How do I make an editable datagrid with the plugin? =

The plugin is based on the phpGrid Lite edition which supports read-only datagrid. For editable datagrid visit http://phpgrid.com for the full version.

= How do I connect to database?

Visit Settings Page to set database connection properties. 

* host name
* database name
* database username
* database password
* database type
* charset
* server root

= What is SERVER ROOT in Database Connection Setting in the setting page?

SERVER_ROOT, formerly known as ABS_PATH, represents the absolute URL to the phpGrid library folder on the web server. This value tells your script where to find phpGrid library on the web server.

For instance, if the URL to get to the phpGrid is http://www.yoursite.com/phpGrid, or http://localhost/phpGrid, the SERVER_ROOT should be “/phpGrid” (must include the leading forward slash character “/”);

if the URL to phpGrid is http://www.yoursite.com/admin/phpGrid, or http://localhost/admin/phpGrid, the SERVER_ROOT should be “/admin/phpGrid“,

and so forth. 

For more details, please visit http://phpgrid.com/documentation/installation/

= I just need to create simple table. =

If you need to create dynamic, database-drive table in WordPress rather than a static table, this plugin for you. Otherwise, you should use plugin such as Table Reloaded, to create static tables.

== Screenshots ==

1)Admin Home Page -> Fill all field for display grid

2)Admin Home Page -> look for list of grids in All Grid tab where you can edit and delete a grid.

3)Admin Home Page -> click Preview Grid button to display the grid in progress.

4)Admin Home Page -> click View Grid Source button to display generated PHP code.

5)Page/Post Admin Page ->click on the grid button on the Visual tab to show the list of available grids.

6)Page/Post Admin Page -> You can also copy short code and paste to the content area.

7)Fron Side -> finally display the grid on a WordPress blog post or page. You can also display multiple grids on a single page.

== Changelog ==

= 1.2 =

* Updated to phpGrid Lite 4.5
* Database connection settings has been moved to setting page.

= 1.1 =

* Ability to create and manage multiple grids.
* Minor bug fix.

= 1.0 =

* Stable release version based on phpGrid Lite version 4.3
