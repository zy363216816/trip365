<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\service;

use app\admin\model\Articles;
use app\admin\model\Categories;
use think\db\Query;

class ApiService
{
    /**
     * 查询文章列表,支持分页
     */
    public static function articles($param)
    {
        $articlesModel = new Articles();

        $where = [
            'articles.article_status' => 1,//状态;1:已发布;0:未发布;
            'articles.article_type'   => 1,//类型;1:文章;2:页面;
            'articles.delete_time'    => null
        ];

        $paramWhere  = empty($param['where']) ? '' : $param['where'];
        $limit       = empty($param['limit']) ? 10 : $param['limit'];
        $order       = empty($param['order']) ? '' : $param['order'];
        $page        = isset($param['page']) ? $param['page'] : false;
        $relation    = empty($param['relation']) ? '' : $param['relation'];
        $categoryIds = empty($param['category_ids']) ? '' : $param['category_ids'];

        $join = [];

        $whereCategoryId = null;

        if (!empty($categoryIds)) {

            $field = !empty($param['field']) ? $param['field'] : 'articles.*';
            array_push($join, ['article_category category', 'category.id = articles.category_id']);

            if (!is_array($categoryIds)) {
                $categoryIds = explode(',', $categoryIds);
            }

            if (count($categoryIds) == 1) {
                $whereCategoryId = function (Query $query) use ($categoryIds) {
                    $query->where('category_id', $categoryIds[0]);
                };
            } else {
                $whereCategoryId = function (Query $query) use ($categoryIds) {
                    $query->where('category_id', 'in', $categoryIds);
                };
            }
        } else {

            $field = !empty($param['field']) ? $param['field'] : 'articles.*';
            array_push($join, ['article_category category', 'category.id = articles.category_id']);
        }

        $articles = $articlesModel->alias('articles')->field($field)
            ->join($join)
            ->where($where)
            ->where($paramWhere)
            ->where($whereCategoryId)
            ->where('articles.published_time', ['> time', 0], ['<', date('Y-m-d H:i:s', time())], 'and')
            ->order($order);

        $arr = [];

        if (empty($page)) {
            $articles = $articles->limit($limit)->select();

            if (!empty($relation) && !empty($articles['items'])) {
                $articles->load($relation);
            }

            $arr['articles'] = $articles;
        } else {

            if (is_array($page)) {
                if (empty($page['list_rows'])) {
                    $page['list_rows'] = 10;
                }

                $articles = $articles->paginate($page);
            } else {
                $articles = $articles->paginate(intval($page));
            }

            if (!empty($relation) && !empty($articles['items'])) {
                $articles->load($relation);
            }

            $articles->appends(request()->get());
            $articles->appends(request()->post());

            $arr['articles']    = $articles->items();
            $arr['page']        = $articles->render();
            $arr['total']       = $articles->total();
            $arr['total_pages'] = $articles->lastPage();
        }


        return $arr;

    }

    /**
     * 查询标签文章列表,支持分页
     */
    public static function tagArticles($param)
    {
        $articlesModel = new Articles();

        $where = [
            'post_status' => 1,
            'post_type'   => 1,
            'delete_time' => 0
        ];

        $paramWhere = empty($param['where']) ? '' : $param['where'];

        $limit    = empty($param['limit']) ? 10 : $param['limit'];
        $order    = empty($param['order']) ? '' : $param['order'];
        $page     = isset($param['page']) ? $param['page'] : false;
        $relation = empty($param['relation']) ? '' : $param['relation'];
        $tagId    = empty($param['tag_id']) ? '' : $param['tag_id'];

        $join = [
            //['__USER__ user', 'user_id = user.id'],
        ];

        if (empty($tagId)) {
            return null;

        } else {
            $field = !empty($param['field']) ? $param['field'] : '*';
            array_push($join, ['__PORTAL_TAG_POST__ tag_post', 'id = tag_post_id']);

            $where['tag_tag_id'] = $tagId;
        }

        $articles = $articlesModel->alias('post')->field($field)
            ->join($join)
            ->where($where)
            ->where($paramWhere)
            ->where('published_time', ['> time', 0], ['<', time()], 'and')
            ->order($order);

        $return = [];

        if (empty($page)) {
            $articles = $articles->limit($limit)->select();

            if (!empty($relation) && !empty($articles['items'])) {
                $articles->load($relation);
            }

            $return['articles'] = $articles;
        } else {

            if (is_array($page)) {
                if (empty($page['list_rows'])) {
                    $page['list_rows'] = 10;
                }

                $articles = $articles->paginate($page);
            } else {
                $articles = $articles->paginate(intval($page));
            }

            if (!empty($relation) && !empty($articles['items'])) {
                $articles->load($relation);
            }

            $articles->appends(request()->get());
            $articles->appends(request()->post());

            $return['articles']    = $articles->items();
            $return['page']        = $articles->render();
            $return['total']       = $articles->total();
            $return['total_pages'] = $articles->lastPage();
        }

        return $return;
    }

    /**
     * 获取指定id的文章
     * @param int $id
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public static function article($id)
    {
        $articlesModel = new Articles();

        $where = [
            'post_status' => 1,
            'post_type'   => 1,
            'id'          => $id,
            'delete_time' => 0
        ];

        return $articlesModel->where($where)
            ->where('published_time', ['> time', 0], ['<', time()], 'and')
            ->find();
    }

    /**
     * 获取指定条件的页面列表
     * @param array $param 查询参数<pre>
     *                     array(
     *                     'where'=>'',
     *                     'order'=>'',
     *                     )</pre>
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function pages($param)
    {
        $paramWhere = empty($param['where']) ? '' : $param['where'];

        $order = empty($param['order']) ? '' : $param['order'];

        $articlesModel = new Articles();

        $where = [
            'post_status' => 1,
            'post_type'   => 2, //页面
            'delete_time' => 0
        ];

        return $articlesModel
            ->where($where)
            ->where($paramWhere)
            ->where('published_time', [['> time', 0], ['<', time()]], 'and')
            ->order($order)
            ->select();
    }

    /**
     * 获取指定id的页面
     * @param int $id 页面的id
     * @return array|false|\PDOStatement|string|\think\Model 返回符合条件的页面
     */
    public static function page($id)
    {
        $articlesModel = new Articles();

        $where = [
            'post_status' => 1,
            'post_type'   => 2,
            'id'          => $id,
            'delete_time' => 0
        ];

        return $articlesModel->where($where)
            ->where('published_time', ['> time', 0], ['<', time()], 'and')
            ->find();
    }

    /**
     * 返回指定分类
     * @param int $id 分类id
     * @return array 返回符合条件的分类
     */
    public static function category($id)
    {
        $categoryModel = new Categories();

        $where = [
            'status'      => 1,
            'delete_time' => 0,
            'id'          => $id
        ];

        return $categoryModel->where($where)->find();
    }

    /**
     * 返回指定分类下的子分类
     * @param int $categoryId 分类id
     * @param     $field      string  指定查询字段
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @return false|\PDOStatement|string|\think\Collection 返回指定分类下的子分类
     */
    public static function subCategories($categoryId, $field = '*')
    {
        $categoryModel = new Categories();

        $where = [
            'status'      => 1,
            'delete_time' => 0,
            'parent_id'   => $categoryId
        ];

        return $categoryModel->field($field)->where($where)->order('list_order ASC')->select();
    }

    /**
     * 返回指定分类下的所有子分类
     * @param int $categoryId 分类id
     * @return array 返回指定分类下的所有子分类
     */
    public static function allSubCategories($categoryId)
    {
        $categoryModel = new Categories();

        $categoryId = intval($categoryId);

        if ($categoryId !== 0) {
            $category = $categoryModel->field('path')->where('id', $categoryId)->find();

            if (empty($category)) {
                return [];
            }

            $categoryPath = $category['path'];
        } else {
            $categoryPath = 0;
        }

        $where = [
            'status'      => 1,
            'delete_time' => 0,
            'path'        => ['like', "$categoryPath-%"]
        ];

        return $categoryModel->where($where)->select();
    }

    /**
     * 返回符合条件的所有分类
     * @param array $param 查询参数<pre>
     *                     array(
     *                     'where'=>'',
     *                     'order'=>'',
     *                     )</pre>
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function categories($param)
    {
        $paramWhere = empty($param['where']) ? '' : $param['where'];

        $order = empty($param['order']) ? '' : $param['order'];

        $categoryModel = new Categories();

        $where = [
            'status'      => 1,
            'delete_time' => 0,
        ];

        return $categoryModel
            ->where($where)
            ->where($paramWhere)
            ->order($order)
            ->select();
    }

    /**
     * 获取面包屑数据
     * @param int $categoryId 当前文章所在分类,或者当前分类的id
     * @param boolean $withCurrent 是否获取当前分类
     * @return array 面包屑数据
     */
    public static function breadcrumb($categoryId, $withCurrent = false)
    {
        $data                = [];
        $categoryModel = new Categories();

        $path = $categoryModel->where(['id' => $categoryId])->value('path');

        if (!empty($path)) {
            $parents = explode('-', $path);
            if (!$withCurrent) {
                array_pop($parents);
            }

            if (!empty($parents)) {
                $data = $categoryModel->where('id', 'in', $parents)->order('path ASC')->select();
            }
        }

        return $data;
    }

}