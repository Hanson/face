<?php


namespace Hanson\Face;


use Hanson\Face\Exception\FetchImageException;
use Hanson\Face\Foundation\Api;

class Score extends BaseFace
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

        $response = Api::request(self::SCORE_URL, [
            'MsgId' => strval($this->generateTime()),
            'CreateTime' => strval(time()),
            'Content[imageUrl]' => $result
        ]);

        return [
            'score' => $this->regexScore($response['content']['text']),
            'text'  => $response['content']['text'],
            'url'   => $response['content']['imageUrl']
        ];
    }

    /**
     * get a score by regex
     *
     * @param $scoreText
     * @return int
     */
    private function regexScore($scoreText)
    {
        preg_match('/\d+\.\d+/', $scoreText, $score);

        return empty($score[0]) ? 0 : $score[0];
    }

}