<?php


namespace Hanson\Face;


use Hanson\Face\Exception\FetchImageException;
use Hanson\Face\Foundation\Api;

class Bill extends BaseFace
{

    /**
     * get a score info from url
     *
     * @param $url
     * @return array
     * @throws FetchImageException
     */
    public function get($url)
    {
        $this->initCookie();

        $response = $this->request($url, self::BILL_URL);

        return [
            'text'  => $response['content']['text'],
            'url'   => $response['content']['imageUrl']
        ];
    }

}