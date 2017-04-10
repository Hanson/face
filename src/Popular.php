<?php


namespace Hanson\Face;


use Hanson\Face\Exception\FetchImageException;
use Hanson\Face\Foundation\Api;

class Popular extends BaseFace
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

        $response = Api::request(self::POPULAR_URL, [
            'msgId' => $this->generateTime(),
            'timestamp' => time(),
            'content[imageUrl]' => $result
        ]);

        $sort = [];

        if (isset($response['content']['metadata']) && ($count = $response['content']['metadata']['FBR_Cnt']) > 0) {
            $data = $response['content']['metadata'];
            for ($i = 0; $i < $count; $i++){
                $sort[] = ['crowd' => $data['FBR_Key'.$i], 'score' => $data['FBR_Score'.$i]];
            }
        }

        return [
            'text' => $response['content']['text'],
            'url' => $response['content']['imageUrl'],
            'sort' => $sort
        ];
    }

}