<?php

include('phpQuery/phpQuery-onefile.php');


function parser()
{
    if(isset($_POST['search']) && isset($_POST['url1'])){
        $url = $_POST['url1'];
        $post_data = [];
        $content = curlStart($url, true, $post_data = []);
        $query = phpQuery::newDocument($content);
        $query->find('');
        print_r([
            $_POST['search'],
            $content
        ]);
    }
}


function curlStart($url, $post, $post_data)
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://www.bizi.si/',
        CURLOPT_POST => $post,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
        CURLOPT_POSTFIELDS => $post_data
    ]);
    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}


parser();
