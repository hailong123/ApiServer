<?php
/**
 * Created by PhpStorm.
 * User: seadragon
 * Date: 2017/9/22
 * Time: 下午10:01
 *  登录控制器
 */

namespace App\Http\Controllers\LoginModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {

    //手机登录接口
    public function phone_login(Request $request) {

        $phone    = $request->input('mobile');
        $password = $request->input('password');

        $user     = $this->check_regist($phone, $password);

        if (empty($user)) {
            json_return(RESPONSE_UN_LOGIN,"用户未注册");
        } else {
            json_return(RESPONSE_OK,'登录成功',$user);
        }
    }

    //检查用户是否已注册
    public function check_regist($phoneNumber,$password){
        $users_table = DB::table('user_table')->where('mobile','=',$phoneNumber)->get();
        return $users_table;
    }

    //上传照片接口
    public function upload_image() {

        if (isset($_FILES['image'])) {

            //创建指定路径
            $fileName = $_SERVER['DOCUMENT_ROOT']."/uploads/photo/";

            if (!file_exists($fileName)) {

                //进行文件创建
                mkdir($fileName,0777,true);

            }

            //进行名称的拼接
            $imgName = $fileName.'my_newly_uploaded_file.png';

            //获取上传数据并写入
            $result = move_uploaded_file($_FILES['image']['tmp_name'],$imgName);

            if ($result) {

                $data = array(
                    //返回数据
                    'heardImg' => 'http://'.$_SERVER['HTTP_HOST']."/uploads/photo/".'my_newly_uploaded_file.png'
                );

                json_return(RESPONSE_OK,'登录成功',$data);

            } else {

                json_return(RESPONSE_UNKNOWN_ERROR,'头像上传失败');

            }
        }
    }
}