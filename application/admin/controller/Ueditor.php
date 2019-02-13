<?php
/**
 * User: User
 * Date: 2019-2-12
 * Time: 14:38
 */

namespace app\admin\controller;

use think\Controller;

class Ueditor extends Controller
{
    private $config;

    public function initialize()
    {
        date_default_timezone_set("Asia/chongqing");
        error_reporting(E_ERROR);
        header("Content-Type: text/html; charset=utf-8");
        $this->config = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("./static/plugins/ueditor/config.json")), true);
    }

    public function index()
    {
        $action = $_GET['action'];
        switch ($action) {
            case 'config':
                $result =  json($this->config);
                break;
            /* 上传图片 */
            case 'uploadimage':
                $this->uploadFile();
                break;
            /* 上传涂鸦 */
            case 'uploadscrawl':
                break;
            /* 上传视频 */
            case 'uploadvideo':
                break;
            /* 上传文件 */
            case 'uploadfile':
                $this->uploadFile();
                break;
            /* 列出图片 */
            case 'listimage':
                $this->showList();
                break;
            /* 列出文件 */
            case 'listfile':
                $this->showList();
                break;
            /* 抓取远程文件 */
            case 'catchimage':
                $this->crawler();
                break;
            default:
                $result = json_encode(array(
                    'state' => '请求地址出错'
                ));
                break;
        }

        /* 输出结果 */
        if(isset($_GET["callback"])){
            if(preg_match("/^[\w_]+$/", $_GET["callback"])){
                echo htmlspecialchars($_GET["callback"]).'('.$result.')';
            }else{
                echo json_encode(array(
                    'state' => 'callback参数不合法'
                ));
            }
        }else{
            return $result;
        }
        return false;
    }

    public function uploadFile()
    {
        /* 上传配置 */
        $base64 = "upload";
        $configs = $this->config;
        switch (htmlspecialchars($_GET['action'])) {
            case 'uploadimage':
                $config = array(
                    "pathFormat" => $configs['imagePathFormat'],
                    "maxSize" => $configs['imageMaxSize'],
                    "allowFiles" => $configs['imageAllowFiles']
                );
                $fieldName = $configs['imageFieldName'];
                break;
            case 'uploadscrawl':
                $config = array(
                    "pathFormat" => $configs['scrawlPathFormat'],
                    "maxSize" => $configs['scrawlMaxSize'],
                    "allowFiles" => $configs['scrawlAllowFiles'],
                    "oriName" => "scrawl.png"
                );
                $fieldName = $configs['scrawlFieldName'];
                $base64 = "base64";
                break;
            case 'uploadvideo':
                $config = array(
                    "pathFormat" => $configs['videoPathFormat'],
                    "maxSize" => $configs['videoMaxSize'],
                    "allowFiles" => $configs['videoAllowFiles']
                );
                $fieldName = $configs['videoFieldName'];
                break;
            case 'uploadfile':
            default:
                $config = array(
                    "pathFormat" => $configs['filePathFormat'],
                    "maxSize" => $configs['fileMaxSize'],
                    "allowFiles" => $configs['fileAllowFiles']
                );
                $fieldName = $configs['fileFieldName'];
                break;
        }
        /* 生成上传实例对象并完成上传 */
        $up = new Uploader($fieldName, $config, $base64);
        return json($up->getFileInfo());
    }

    public function crawler()
    {
        /* 上传配置 */
        $config = array(
            "pathFormat" => $this->config['catcherPathFormat'],
            "maxSize" => $this->config['catcherMaxSize'],
            "allowFiles" => $this->config['catcherAllowFiles'],
            "oriName" => "remote.png"
        );
        $fieldName = $this->config['catcherFieldName'];

        /* 抓取远程图片 */
        $list = array();
        if (isset($_POST[$fieldName])) {
            $source = $_POST[$fieldName];
        } else {
            $source = $_GET[$fieldName];
        }
        foreach ($source as $imgUrl) {
            $item = new Uploader($imgUrl, $config, "remote");
            $info = $item->getFileInfo();
            array_push($list, array(
                "state" => $info["state"],
                "url" => $info["url"],
                "size" => $info["size"],
                "title" => htmlspecialchars($info["title"]),
                "original" => htmlspecialchars($info["original"]),
                "source" => htmlspecialchars($imgUrl)
            ));
        }

        /* 返回抓取数据 */
        return json_encode(array(
            'state'=> count($list) ? 'SUCCESS':'ERROR',
            'list'=> $list
        ));
    }

    public function showList()
    {
        /* 判断类型 */
        switch ($_GET['action']) {
            /* 列出文件 */
            case 'listfile':
                $allowFiles = $this->config['fileManagerAllowFiles'];
                $listSize = $this->config['fileManagerListSize'];
                $path = $this->config['fileManagerListPath'];
                break;
            /* 列出图片 */
            case 'listimage':
            default:
                $allowFiles = $this->config['imageManagerAllowFiles'];
                $listSize = $this->config['imageManagerListSize'];
                $path = $this->config['imageManagerListPath'];
        }
        $allowFiles = substr(str_replace(".", "|", join("", $allowFiles)), 1);

        /* 获取参数 */
        $size = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize;
        $start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
        $end = $start + $size;

        /* 获取文件列表 */
        $path = $_SERVER['DOCUMENT_ROOT'] . (substr($path, 0, 1) == "/" ? "":"/") . $path;
        $files = $this::getfiles($path, $allowFiles);
        if (!count($files)) {
            return json_encode(array(
                "state" => "no match file",
                "list" => array(),
                "start" => $start,
                "total" => count($files)
            ));
        }

        /* 获取指定范围的列表 */
        $len = count($files);
        for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
            $list[] = $files[$i];
        }
//倒序
//for ($i = $end, $list = array(); $i < $len && $i < $end; $i++){
//    $list[] = $files[$i];
//}

        /* 返回数据 */
        $result = json_encode(array(
            "state" => "SUCCESS",
            "list" => $list,
            "start" => $start,
            "total" => count($files)
        ));

        return $result;
    }
    /**
     * 遍历获取目录下的指定类型的文件
     * @param $path
     * @param array $files
     * @return array
     */
    private static function getFiles($path, $allowFiles, &$files = array())
    {
        if (!is_dir($path)) return null;
        if(substr($path, strlen($path) - 1) != '/') $path .= '/';
        $handle = opendir($path);
        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $path2 = $path . $file;
                if (is_dir($path2)) {
                    self::getfiles($path2, $allowFiles, $files);
                } else {
                    if (preg_match("/\.(".$allowFiles.")$/i", $file)) {
                        $files[] = array(
                            'url'=> substr($path2, strlen($_SERVER['DOCUMENT_ROOT'])),
                            'mtime'=> filemtime($path2)
                        );
                    }
                }
            }
        }
        return $files;
    }
}