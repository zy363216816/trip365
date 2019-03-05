<?php

namespace app\admin\controller;

use app\facade\Authenticated;
use think\Controller;
use app\admin\model\AdminUsers as Users;
use think\facade\Session;
use think\Request;

class AdminUsers extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function getAdmin($username)
    {
        return Users::where('account', $username)->find();

    }

    public function getAdmins()
    {
        $res = Users::all();
        $row['page'] = 1;
        $row['records'] = 3;
        $row['total'] = 3;
        $row['rows'] = $res;
        return json($row);
    }

    public function form()
    {
        return view('admin/form');
    }

    public function profile()
    {
        $admin = Authenticated::user();
        $this->assign('admin', $admin);
        return $this->fetch('admin/profile');
    }

    public function avatar()
    {
        $admin = Authenticated::user();
        $this->assign('admin', $admin);
        return view('admin/avatar');
    }

    public function add(Request $request)
    {
        if ($request->isAjax() && $request->isPost()) {
            $data = $request->only(['account', 'password', 'password_confirm', 'full_name', 'mobile', '__token__']);
            $valid = $this->validate($data, 'app\admin\validate\Admin');
            $data['account'] = trim($request->post('account'));
            $data['password'] = trim($this->encrypt($request->post('password')));
            if (true !== $valid) {
                return ['msg' => $valid, 'token' => token()];
            } else {
                $admin = Users::create($data);
                if ($admin) {
                    return true;
                }
            }
        }
        return false;
    }

    public function del(Request $request)
    {
        $pk = $request->post('keyValues');
        if ($pk) {
            $res = Users::destroy($pk);
            if ($res) {
                return true;
            }
        }
        return false;
    }

    /*
     * 加密密码
     */
    public function encrypt($password, $salt = 'sunny')
    {
        return crypt($password, md5($salt));
    }

    /*
     * 上传头像
     */
    public function uploadFile(Request $request)
    {
        $data = $request->post('file');
        $base64 = urldecode($data);
        $code = explode(',', $base64);
        $type = substr($code[0], 11, 3);
        $file = base64_decode($code[1]);
        $admin = Authenticated::user();
        $name = 'avatar/' . $admin['id'] . '.' . $type;
        try {
            file_put_contents(config('uploads') . $name, $file);
            $user = Users::get($admin['id']);
            $user->avatar = $name;
            if ($user->save()) {
                Authenticated::save($user);
                return true;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function changePassword()
    {
        $oldPwd = trim($this->request->post('old-password'));
        $newPwd = trim($this->request->post('new-password'));
        $newPwd1 = trim($this->request->post('new-password1'));
        $admin = Authenticated::user();
        $user = Users::get($admin['id']);
        if ($user->password !== $this->encrypt($oldPwd)) {
            return '原始密码输入错误';
        } else {
            if ($newPwd == ''){
                return '新密码不能为空';
            }
            if ($newPwd === $newPwd1) {
                $user->password = $this->encrypt($newPwd);
                if ($user->save()) {
                    Session::clear();
                    return '密码修改成功';
                }
                return '新密码输入不一致,请重新输入';
            }
        }
        return '密码修改失败';
    }
}
