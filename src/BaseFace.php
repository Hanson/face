<?php


namespace Hanson\Face;


use Hanson\Face\Exception\FetchImageException;
use Hanson\Face\Foundation\Api;

class BaseFace
{
    const UPLOAD_URL = 'http://kan.msxiaobing.com/Api/Image/UploadBase64';
    const SCORE_URL = 'http://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=yanzhi&tid=52a90c91aaeb4af698bec8ae2106cb36';
    const BILL_URL = 'https://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=qingke&tid=bc70072cf17e41ac8501a01399ff1c9c';
    const POPULAR_URL = 'https://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=beauty&tid=662e823fd7494b63bc707ccd36e4b30e';
    const RELATION_URL = 'https://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=beauty&tid=662e823fd7494b63bc707ccd36e4b30e';
    const CLOTHING_URL = 'https://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=cosmoclothing&tid=0dc5049c96c04dbe924134d5e3c39ac9';

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

    /**
     * generate a time for api
     *
     * @return float
     */
    protected function generateTime()
    {
        list($s1, $s2) = explode(' ', microtime());

        return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }
}