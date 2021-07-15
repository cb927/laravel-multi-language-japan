<?php
namespace App\Library;

class HttpRequest
{
    static public function GetRequest($url){
        $options = array(
            'http'=>array(
                'ignore_errors' => true,
                'method'=>'GET',
                'header'=>"User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)\r\n".
                          "Accept-language: ja\r\n"
            )
        );
        
        $options['ssl']['verify_peer']=false;
        $options['ssl']['verify_peer_name']=false;
        
        $context = stream_context_create( $options );
        $result = file_get_contents( $url, FALSE, $context );
        
        $result = mb_convert_encoding($result, "UTF-8", "SJIS");

        return $result;
    }
}