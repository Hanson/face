<?php


namespace Hanson\Face;


use Hanson\Face\Exception\FetchImageException;
use Hanson\Face\Foundation\Api;

class BaseFace
{
    const UPLOAD_URL = 'http://kan.msxiaobing.com/Api/Image/UploadBase64';
    const SCORE_URL = 'http://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=yanzhi&tid=';
    const BILL_URL = 'https://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=qingke&tid=';
    const POPULAR_URL = 'https://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=beauty&tid=';
    const RELATION_URL = 'https://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=beauty&tid=';
    const CLOTHING_URL = 'https://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=cosmoclothing&tid=';

    /**
     * upload image and get the resource url
     *
     * @param $url
     * @return bool|string
     * @throws FetchImageException
     */
    protected function upload($url)
    {
        $image = base64_encode(file_get_contents($url));

        $result = Api::request(self::UPLOAD_URL, $image);

        if(count($result) !== 0){
            return $result['Host'] . $result['Url'];
        }else{
            throw new FetchImageException('获取图片失败');
        }
    }

    public function initCookie()
    {
        Api::request('http://kan.msxiaobing.com/V3/Portal?task=yanzhi&ftid=', [], 'get');
    }

    /**
     * generate a time for api
     *
     * @return float
     */
    protected function generateTime()
    {
        return time() * 1000;
    }
}