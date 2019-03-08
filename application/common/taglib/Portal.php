<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/7
 * Time: 10:35
 */

namespace app\common\taglib;

use think\template\TagLib;

class Portal extends TagLib
{
    /**
     * 定义标签列表
     */
    protected $tags = [
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'slides'   => ['attr' => 'id', 'close' => 1], //闭合标签，默认为不闭合
        'articles' => ['attr' => 'field,where,limit,order,page,relation,returnVarName,pageVarName,categoryIds', 'close' => 1],//非必须属性item
    ];

    /**
     * 这是一个闭合标签的简单演示
     */
    public function tagSlides($tag, $content)
    {
        $id    = empty($tag['id']) ? '0' : $tag['id'];
        $item  = empty($tag['item']) ? 'vo' : $tag['item'];//循环变量名
        $parse = <<<parse
<?php
     \$__SLIDE_ITEMS__ = \app\admin\service\ApiService::slides({$id});
?>
{volist name="__SLIDE_ITEMS__" id="{$item}"}
{$content}
{/volist}
parse;
        return $parse;
    }

    public function tagArticles($tag, $content)
    {
        $item        = empty($tag['item']) ? 'vo' : $tag['item'];//循环变量名
        $order       = empty($tag['order']) ? 'published_time DESC' : $tag['order'];
        $relation    = empty($tag['relation']) ? '' : $tag['relation'];
        $pageVarName = empty($tag['pageVarName']) ? '__PAGE_VAR_NAME__' : $tag['pageVarName'];
        $returnVarName = empty($tag['returnVarName']) ? 'data' : $tag['returnVarName'];
        $field = "''";
        if (!empty($tag['field'])) {
            if (strpos($tag['field'], '$') === 0) {
                $field = $tag['field'];
                $this->autoBuildVar($field);
            } else {
                $field = "'{$tag['field']}'";
            }
        }

        $where = '""';
        if (!empty($tag['where']) && strpos($tag['where'], '$') === 0) {
            $where = $tag['where'];
        }

        $limit = "''";
        if (!empty($tag['limit'])) {
            if (strpos($tag['limit'], '$') === 0) {
                $limit = $tag['limit'];
                $this->autoBuildVar($limit);
            } else {
                $limit = "'{$tag['limit']}'";
            }
        }

        $page = "''";
        if (!empty($tag['page'])) {
            if (strpos($tag['page'], '$') === 0) {
                $page = $tag['page'];
            } else {
                $page = intval($tag['page']);
                $page = "'{$page}'";
            }
        }

        $categoryIds = "''";
        if (!empty($tag['categoryIds'])) {
            if (strpos($tag['categoryIds'], '$') === 0) {
                $categoryIds = $tag['categoryIds'];
                $this->autoBuildVar($categoryIds);
            } else {
                $categoryIds = "'{$tag['categoryIds']}'";
            }
        }

        if (strpos($tag['order'], '$') === 0) {
            $order = $tag['order'];
            $this->autoBuildVar($order);
        } else {
            $order = "'{$order}'";
        }

        $parse = <<<parse
<?php
\${$returnVarName} = \app\portal\service\ApiService::articles([
    'field'   => {$field},
    'where'   => {$where},
    'limit'   => {$limit},
    'order'   => {$order},
    'page'    => {$page},
    'relation'=> '{$relation}',
    'category_ids'=>{$categoryIds}
]);

\${$pageVarName} = isset(\${$returnVarName}['page'])?\${$returnVarName}['page']:'';

 ?>
{volist name="{$returnVarName}.articles" id="{$item}"}
{$content}
{/volist}
parse;
        return $parse;
    }
}