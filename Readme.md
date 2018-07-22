
step 1:
thrift --gen php:server Test.thrift

step 2:

ssh window 1:
 /usr/local/php7/bin/php Server.php 

ssh window 2:
 /usr/local/php7/bin/php Client.php 

