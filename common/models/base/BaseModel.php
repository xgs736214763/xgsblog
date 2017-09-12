<?php
namespace common\models\base;

use Yii;
use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    /*
    *函数用途描述：获取分页数据
    *@date:2017年8月6日 下午3:54:02
    *@author: xiaoxie
    *@param:
    */
    public function getPages($query,$curPage = 1, $pageSize = 10,$search = null) {
        if ($search){
            $query = $query->andFilerWhere($search);
        }
        //总条数
        $data['count'] = $query->count();
        if (!$data['count']){
            return ['count'=>0,'curPage'=>$curPage,'pageSize'=>$pageSize,'start'=>0,'end'=>0,'data'=>[]];
        }
        
        //超过实际页数，不去curPage为当前页
        $curPage = (ceil($data['count']/$pageSize) < $curPage)
        ?ceil($data['count']/$pageSize):$curPage;
        //当前页
        $data['curPage'] = $curPage;
        //每页显示条数
        $data['pageSize'] = $pageSize;
        //起始页
        $data['start'] = ($curPage-1)*$pageSize+1;
        //末尾页
        $data['end'] = (ceil($data['count']/$pageSize) == $curPage)?$data['count']:($curPage-1)*$pageSize+$pageSize;
        
        $data['data'] = $query
                        ->offset(($curPage-1)*$pageSize)
                        ->limit($pageSize)
                        ->asArray()
                        ->all();
        return $data;
        
    }
}

