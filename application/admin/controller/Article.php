<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Articles;

class Article extends Controller
{
    /**
     * 显示资源列表
     *
     */
    public function index()
    {
        return view('list');
    }

    /**
     * 显示添加文章表格
     *
     */
    public function form()
    {
        return view('form');
    }

    /**
     * 显示上传控件
     *
     */
    public function assetUpload()
    {
        return view('assets/upload');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     */
    public function save(Request $request)
    {
        $article = new Articles;
        if ($request->isPost()) {
            $data = $request->post(false);
            if (isset($data['image_ids'])) {
                $photosId = json_encode($data['image_ids']);
            }
            if (isset($data['file_ids'])) {
                $fileId = json_encode($data['file_ids']);
            }
            $res = $article->save([
                'category_id'    => $data['category_id'],
                'title'          => $data['article_title'],
                'keywords'       => $data['article_keywords'],
                'excerpt'        => $data['article_excerpt'],
                'source'         => $data['article_source'],
                'content'        => isset($data['editorValue']) ?: null,
                'photo_id'       => isset($photosId) ? $photosId : null,
                'file_id'        => isset($fileId) ? $fileId : null,
                'audio_id'       => isset($data['audio_id']) ?: null,
                'video_id'       => isset($data['video_id']) ?: null,
                'thumbnail_id'   => isset($data['thumbnail']) ?: null,
                'published_time' => $data['published_time'],
                'more'           => json_encode($data['more'])
            ]);
            if ($res) {
                return ['status' => 'success', 'msg' => '添加成功'];
            }
        }

        return false;
    }

    public function getAll()
    {
        $articles = Articles::all();
        foreach ($articles as $k => $article) {
            $article['author'] = isset($article->user->full_name) ? $article->user->full_name : '';
            $data[]            = $article;
            unset($article['user']);
        }
        return $data;
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     */
    public function delete($id)
    {
        if ($id) {
            $res = Articles::destroy($id);
            if ($res) {
                return true;
            }
        }
        return false;
    }
}
