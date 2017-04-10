<?php


namespace Hanson\FaceScore;


use GuzzleHttp\Client;
use Hanson\Exception\FetchImageException;

class FaceScore
{

    const UPLOAD_URL = 'http://kan.msxiaobing.com/Api/Image/UploadBase64';
    const SCORE_URL = 'http://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=yanzhi&tid=52a90c91aaeb4af698bec8ae2106cb36';

    /**
     * get a score info from url
     *
     * @param $url
     * @return array
     * @throws FetchImageException
     */
    public function getScore($url)
    {
        $result = $this->upload($url);

        if(!$result){
            throw new FetchImageException('获取图片失败');
        }

        $response = $this->request(self::SCORE_URL, [
            'msgId' => $this->generateTime(),
            'timestamp' => time(),
            'content[imageUrl]' => $result
        ]);
        
        return [
            'score' => $this->regexScore($response['content']['text']),
            'text'  => $response['content']['text'],
            'url'   => $response['content']['imageUrl']
        ];
    }

    /**
     * upload image and get the resource url
     *
     * @param $url
     * @return bool|string
     */
    private function upload($url)
    {
        $image = base64_encode(file_get_contents($url));

        $result = $this->request(self::UPLOAD_URL, $image);

        return count($result) !== 0 ? $result['Host'] . $result['Url'] : false;
    }

    /**
     * send a curl request
     *
     * @param $api
     * @param $data
     * @return mixed
     */
    private function request($api, $data)
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

    /**
     * generate a time for api
     *
     * @return float
     */
    private function generateTime()
    {
        list($s1, $s2) = explode(' ', microtime());

        return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
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