<?php


namespace Hanson\Face\Foundation;


use GuzzleHttp\Client;

class Api
{

    /**
     * send a curl request
     *
     * @param $api
     * @param $data
     * @return mixed
     */
    public static function request($api, $data)
    {
        $client = new Client();

        $options = [
            'headers' => [
                'Host' => 'kan.msxiaobing.com',
                'Connection' => 'keep-alive',
                'Accept' => '*/*',
                'Origin' => 'http://kan.msxiaobing.com',
                'X-Requested-With' => 'XMLHttpRequest',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36',
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'Referer' => 'http://kan.msxiaobing.com/V3/Portal',
                'Accept-Encoding' => 'gzip, deflate',
                'Accept-Language' => 'zh-CN,zh;q=0.8,en-US;q=0.6,en;q=0.4',
                'Expect' => ''
            ],
            'timeout' => 7,
        ];

        $options = is_array($data) ? array_merge($options, ['form_params' => $data]) : array_merge($options, ['body' => $data]);

        $request = $client->post($api, $options);

        $response = $request->getBody()->getContents();

        return json_decode($response, true);
    }

}