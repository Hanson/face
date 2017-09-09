<?php


namespace Hanson\Face;


use Hanson\Face\Exception\FetchImageException;
use Hanson\Face\Foundation\Api;

class Clothing extends BaseFace
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

        $result = $this->upload($url);

        $response = Api::request(self::CLOTHING_URL, [
            'msgId' => $this->generateTime(),
            'timestamp' => time(),
            'content[imageUrl]' => $result
        ]);

        return [
            'text'  => $response['content']['text'],
            'url'   => $response['content']['imageUrl'],
            'data'  => $response['content']['metadata']
        ];
    }

}