<?php


namespace Hanson\Face\Foundation;


use GuzzleHttp\Client;

class Api
{

    protected static $client = null;

    /**
     * send a curl request
     *
     * @param $api
     * @param $data
     * @param string $method
     * @return mixed
     */
    public static function request($api, $data, $method = 'post')
    {
        $client = self::getClient();

        $options = [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36',
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'Referer' => 'http://kan.msxiaobing.com/V3/Portal?task=yanzhi&ftid=',
            ],
            'timeout' => 7,
        ];

        $options = is_array($data) ? array_merge($options, ['form_params' => $data]) : array_merge($options, ['body' => $data]);

        $request = $method === 'post' ? $client->post($api, $options) : $client->get($api);

        $response = $request->getBody()->getContents();

        return json_decode($response, true);
    }

    protected static function getClient()
    {
        if (self::$client) {
            return self::$client;
        }

        return self::$client = new Client(['cookies' => true]);
    }

}