<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/11
 * Time: 16:40
 */

namespace app\common\sms;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;use think\console\command\optimize\Autoload;

class Sms
{
    public function __construct()
    {
        AlibabaCloud::accessKeyClient('LTAI0F60usfAhELN', 'oj1PBfmPYpKZbKFLewfjRfMFpOQfAe')
            ->regionId('cn-hangzhou')// replace regionId as you need
            ->asGlobalClient();
    }

    public function sendSms($mobile, $param, $templateCode = 'SMS_139237854', $signName = '途迹网')
    {
        try {
            $result = AlibabaCloud::rpcRequest()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->options([
                    'query' => [
                        'PhoneNumbers'  => $mobile,
                        'SignName'      => $signName,
                        'TemplateCode'  => $templateCode,
                        'TemplateParam' => json_encode(['code' => $param]),
                    ],
                ])
                ->request();
            return $result->toArray();
        } catch (ClientException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        }

    }
}
