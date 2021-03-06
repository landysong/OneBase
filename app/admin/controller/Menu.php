<?php
// +----------------------------------------------------------------------
// | Author: Bigotry <3162875@qq.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

/**
 * 菜单控制器
 */
class Menu extends AdminBase
{
    
    /**
     * 菜单列表
     */
    public function menuList()
    {
        
        $this->setTitle('菜单管理');
        
        $where = empty($this->param['pid']) ? ['pid' => 0] : ['pid' => $this->param['pid']];
        
        $this->assign('list', $this->menuLogic->getMenuList($where));
        
        $this->assign('pid', $where['pid']);
        
        return $this->fetch('menu_list');
    }
    
    /**
     * 获取菜单Select结构数据
     */
    public function getMenuSelectData()
    {
        
        $menu_select = $this->menuLogic->menuToSelect($this->authMenuTree);
        
        $this->assign('menu_select', $menu_select);
    }
    
    /**
     * 菜单添加
     */
    public function menuAdd()
    {
        
        $this->setTitle('菜单添加');
        
        $this->param['module'] = MODULE_NAME;
        
        IS_POST && $this->jump($this->menuLogic->menuAdd($this->param));
        
        //获取菜单Select结构数据
        $this->getMenuSelectData();
        
        !empty($this->param['pid']) && $this->assign('info', ['pid'=> $this->param['pid']]);
        
        return $this->fetch('menu_edit');
    }
    
    /**
     * 菜单编辑
     */
    public function menuEdit()
    {
        
        $this->setTitle('菜单编辑');
        
        IS_POST && $this->jump($this->menuLogic->menuEdit($this->param));
        
        $info = $this->menuLogic->getMenuInfo(['id' => $this->param['id']]);
        
        $this->assign('info', $info);
        
        //获取菜单Select结构数据
        $this->getMenuSelectData();
        
        return $this->fetch('menu_edit');
    }
    
    /**
     * 菜单删除
     */
    public function menuDel($id = 0)
    {
        
        $this->jump($this->menuLogic->menuDel(['id' => $id]));
    }
}
