#设置全局composer依赖仓库地址
composer config -g secure-http false
composer config -g repo.packagist composer http://mirrors.huaweicloud.com/repository/php/
composer install
#tar -zcvf php-composer.tgz *
composer update -vvv --profile --prefer-dist --optimize-autoloader