<?php

$ip = '114.114.11.49';

// ip转整型
function ipton($ip){
    $ip_arr=explode('.',$ip);
    $ipstr = '';
    foreach ($ip_arr as $value){
        $iphex=dechex($value);
        if(strlen($iphex)<2){
            $iphex='0'.$iphex;
        }
        $ipstr.=$iphex;
    }
    return hexdec($ipstr);
}
// 整型转IP
function nToIp($n){
    $iphex=dechex($n);
    $len=strlen($iphex);
    if(strlen($iphex)<8){
        $iphex='0'.$iphex;
        $len=strlen($iphex);
    }
    for($j=0;$j<$len;$j=$j+2){
        $ippart=substr($iphex,$j,2);
        $fipart=substr($ippart,0,1);
        if($fipart=='0'){
            $ippart=substr($ippart,1,1);
        }
        $ip[]=hexdec($ippart);
    }
    return implode('.', $ip);
}

function ipTLong($ip) {
    $ipArr=explode('.',$ip);
    $n = $ipArr[0] << 24 | $ipArr[1] << 16 | $ipArr[2] << 8 | $ipArr[3];
    return $n;
}
function longTIp($n) {
    $ip1 = $n >> 24 & 0xff;
    $ip2 = $n >> 16 & 0xff;
    $ip3 = $n >> 8 & 0xff;
    $ip4 = $n & 0xff;
    return $ip1.'.'.$ip2.'.'.$ip3.'.'.$ip4;
}
echo nToIp(ipton($ip));