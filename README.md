CacheMachine
================

Php and htaccess scripts to cache entire WordPress GET request in flat html files. 

Usage
================

Create and CHMOD 777 a cache folder in your wordpress root directory.

Modify the default .htaccess file to add few exta lines (see .htaccess file)

Create and upload a cache.php file. Don't forget to replace 'IP SERVEUR' with the actual IP address of your webserver

Filters and hooks
================

You will find two hooks in functions.php to clear cache for posts an pages when you update it or when someone post a comment

Important notice for SEO
================
You should add this to your robots.txt

User-agent: *
Disallow: /cache
