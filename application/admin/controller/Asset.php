<?php

namespace app\admin\controller;

use app\admin\model\Assets;
use think\Controller;

class Asset extends Controller
{
    public function save($data = [])
    {
        if ($data){
            $asset= Assets::create([
                'file_size' => $data['file_size'],
                'file_key' => guid(),
                'filename' => $data['filename'],
                'original_name' => $data['original_name'],
                'file_path' => $data['file_path'],
                'suffix' => $data['suffix']
            ]);
            return $asset;
        }
        return null;
    }
}
