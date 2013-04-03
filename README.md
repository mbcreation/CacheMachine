CacheMachine
================

Php and htaccess scripts to cache entire WordPress GET request in flat html files. 

Usage
================

Create and CHMOD 777 a cache folder in your wordpress root directory.

Modify the default .htaccess file to add few exta lines (see .htaccess file)

Create and upload a cache.php file.

Configuration
================

Depending of your webserver configuration/system you might need to change two lines in the cache.php script.

1 - Line 4, the REMOTE ADDR condition ($_SERVER['REMOTE_ADDR'] != 'SERVER_IP') is to prevent the script to loop on himself. But there is chance it will not work locally. As a replacement you can try replace that condition by this one isset($_SERVER['HTTP_USER_AGENT']).

2 - Line 33, if the script doesn't work, you'll have to replace the response header test condition with this one HTTP/1.1 200 OK.


Filters and hooks
================

You will find two hooks in functions.php to clear cache for posts an pages when you update it or when someone post a comment

Important notice for SEO
================

You should add this to your robots.txt

User-agent: *

Disallow: /cache
