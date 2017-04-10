<?php


namespace Hanson\Face;


use Hanson\Face\Exception\FetchImageException;
use Hanson\Face\Foundation\Api;

class Relation extends BaseFace
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
        $result = $this->upload($url);

        $response = Api::request(self::RELATION_URL, [
            'msgId' => $this->generateTime(),
            'timestamp' => time(),
            'content[imageUrl]' => $result
        ]);

        return [
            'text'  => $response['content']['text'],
            'url'   => $response['content']['imageUrl']
        ];
    }

}