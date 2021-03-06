<?php
// +----------------------------------------------------------------------
// | Author: Bigotry <3162875@qq.com>
// +----------------------------------------------------------------------

namespace app\admin\logic;

/**
 * 服务逻辑
 */
class Service extends AdminBase
{
    
    // 对象实例
    protected static $instance = [];
    
    /**
     * 获取服务 or 驱动列表
     */
    public function getServiceList($service_name)
    {
        
        $object_list = $this->getObjectList($service_name);
       
        $list = [];
        
        foreach ($object_list as $object) {
            
            $list[] =  is_null($service_name) ?  $object->serviceInfo() : $object->driverInfo();
        }
        
        return $list;
    }
    
    
    /**
     * 获取对象列表
     */
    public function getObjectList($service_name)
    {
        
        $app_namespace = config('app_namespace');
        
        if (is_null($service_name)) {
            
            $file_list  = file_list($app_namespace.'/common/'.LAYER_SERVICE_NAME);

            $object_path = "\\$app_namespace\\common\\".LAYER_SERVICE_NAME;
            
        } else {
            
            $driver_name = strtolower($service_name);
            
            $file_list  = file_list($app_namespace.'/common/'.LAYER_SERVICE_NAME.'/'.$driver_name.'/driver');

            $object_path = "\\$app_namespace\\common\\".LAYER_SERVICE_NAME."\\$driver_name\\driver";
        }
        
        foreach ($file_list as $v) {
            
            $class_name = str_replace(EXT, '', $v);
            
            
            if (!(false === strpos($class_name, 'Base'))) {
                
                continue;
            }
            
            if (!isset(self::$instance[$class_name])) {
                
                $class = $object_path.'\\'.$class_name;
                
                self::$instance[$class_name] = new $class();
            }
        }
        
        return self::$instance;
    }
    
}
