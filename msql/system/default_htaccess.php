<?php //msql/default_htaccess
$r=["_"=>['title_1'],
"1"=>['AddDefaultCharset ISO-8859-1
RewriteEngine on
RewriteRule ^([0-9]+)$ /?read=$1 [L]
RewriteRule ^art/([^/])$ /?art=$1 [L]
RewriteRule ^read/([^/])$ /?read=$1 [L]
RewriteRule ^module/([^/]+)/(.+)$ /?module=m:$1,p:$2 [L]
RewriteRule ^module/([^/]+)$ /?module=$1 [L]
RewriteRule ^context/([^/]+)/(.+)$ /?module=m:context,p:$1&o=$2 [L]
RewriteRule ^context/([^/]+)$ /?module=m:context,p:$1 [L]
RewriteRule ^admin/([^/]+)/(.+)$ /?admin=$1 [L]
RewriteRule ^msql/(.+)$ /?msql=$1 [L]
RewriteRule ^([0-9]+)/look/([^/]+)$ /?read=$1&look=$2 [L]
RewriteRule ^([0-9]+)/find/([^/]+)$ /?read=$1&look=$2&seg=1 [L]
RewriteRule ^call/([^/]+)/([^/]+)/([^/]+)$ /call.php?a=$1&p=$2&o=$3 [L]
RewriteRule ^call/([^/]+)/([^/]+)$ /call.php?a=$1&p=$2 [L]
RewriteRule ^call/([^.]+)$ /call.php?a=$1 [L]
RewriteRule ^app/([^/]+)/([^/]+)/([^/]+)$ /app.php?a=$1&p=$2&o=$3 [L]
RewriteRule ^app/([^/]+)/([^/]+)$ /app.php?a=$1&p=$2 [L]
RewriteRule ^app/([^/]+)$ /app.php?a=$1 [L]
RewriteRule ^plug/([^/]+)$ /app.php?a=$1 [L]
RewriteRule ^search/(.+)/([0-9]+)$ /?search=$1&dig=$2 [L]
RewriteRule ^search/(.+)$ /?search=$1 [L]
RewriteRule ^source/(.+)/([0-9]+)$ /?source=$1&dig=$2 [L]
RewriteRule ^source/(.+)$ /?source=$1 [L]
RewriteRule ^apicom/(.+)$ /call.php?a=apicom&p=$1 [L]
RewriteRule ^api/(.+)$ /?api=$1 [L]
RewriteRule ^rss/([^.]+)$ /call.php?a=rss&m=output&p=$1 [L]
RewriteRule ^rss$ /call.php?a=rss&m=output [L]
RewriteRule ^hub/([^.^/]+)$ /?hub=$1 [L]
RewriteRule ^([^.^/]+)/([^.^/]+)/([0-9]+)/page/([0-9]+)$ /?$1=$2&dig=$3&page=$4 [L]
RewriteRule ^([^.^/]+)/([^.^/]+)/page/([0-9]+)$ /?$1=$2&page=$3 [L]
RewriteRule ^([^.^/]+)/([^.^/]+)/([0-9]+)$ /?$1=$2&dig=$3 [L]
RewriteRule ^([^.^/]+)/([^.^/]+)$ /?$1=$2 [L]
RewriteRule ^reload /?refresh== [L]
RewriteRule ^home /?module=Home [L]
RewriteRule ^all /?module=All [L]
RewriteRule ^admin /?admin=console [L]
RewriteRule ^update /?admin=update&update=program [L]
RewriteRule ^login /?module=login [L]
RewriteRule ^logon /?log=on [L]
RewriteRule ^logout /?log=out [L]
RewriteRule ^logoff /?log=off [L]
RewriteRule ^reboot /?log=reboot [L]
RewriteRule ^shutdown /?log=down [L]
RewriteRule ^dev /?dev=b [L]
RewriteRule ^#([^/]+)$ /?hash=$1 [L,R,NE]
RewriteRule ^([^.]+)$ /?id=$1 [L]']]; ?>