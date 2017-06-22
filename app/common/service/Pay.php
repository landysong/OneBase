<?php
// +----------------------------------------------------------------------
// | Author: Bigotry <3162875@qq.com>
// +----------------------------------------------------------------------

namespace app\common\service;

/**
 * 支付服务
 */
class Pay extends ServiceBase implements BaseInterface
{
    
    /**
     * 服务基本信息
     */
    public function serviceInfo()
    {
        
        return ['service_name' => '支付服务', 'service_class' => 'Pay', 'service_describe' => '系统支付服务，用于整合多个支付平台', 'author' => 'Bigotry', 'version' => '1.0'];
    }
    
    /**
     * 服务配置信息
     */
    public function serviceConfig()
    {
        
    }
}
