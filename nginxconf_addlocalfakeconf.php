<?php
/**
 * Date: 2019/1/15
 * Time: 12:15
 */

//读取nginx.conf，判断localfake.conf是否存在，加入include localfake.conf
$x86=true;
$ngxconffile='/opt/nginx/conf/nginx.conf';
if(!file_exists($ngxconffile))
{
    $x86=false;
    $ngxconffile='/mnt/disk/ettapp/nginx/conf/nginx.conf';
}


$current=trim(file_get_contents($ngxconffile));
//$newstr=trim($current)."testnewstr";
/**
$newstr=rtrim($current,'}').
' include localfake.conf;
}';
 **/

$pos=strpos($current,'localfake.conf;');

if($pos==false){
    /**
     $newstr=preg_replace('/}$/','
        include localfake.conf;
    }
    ',$current);
     */

    $newstr=preg_replace('/}$/',PHP_EOL.'    include localfake.conf;'.PHP_EOL.'}',$current);


    if($x86)
     {
        $newconffile='/opt/nginx/conf/nginx.conf.modify_by_php_190117';
     }
     else
     {
         $newconffile='/mnt/disk/ettapp/nginx/conf/nginx.conf.modify_by_php_190117';
     }
    file_put_contents($newconffile,$newstr);
    echo "nginx.conf add locakfake.conf fin.";
}
else
{
    echo "nginx.conf already contains localfake.conf.";
}
//执行方式
//x86
// /usr/bin/php 1.php
//arm
// /mnt/disk/ettapp/php/bin/php 1.php
?>