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

        $response = $this->request($url, self::CLOTHING_URL);

        $key = explode('key=', $response['content']['imageUrl']);

        return [
            'text'  => $response['content']['text'],
            'url'   => 'https://kan.msxiaobing.com/ImageGame/Portal?task=cosmoclothing&aid='.$response['content']['metadata']['aid'].'&key='.$key[1],
            'data'  => $response['content']['metadata']
        ];
    }

}