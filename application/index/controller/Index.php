<?php
namespace app\index\controller;
use think\Controller;
use app\index\validate\Index as valIndex;
use \traits\controller\Jump;
class Index extends Controller
{


    public function index()
    {
        return view();
    }
    public function hello(){
        echo "Hello World";
    }
    public function counter()
    {

        if($_POST and $_POST['submit']='submit'){
            trace('提交信息已获得');
            if($_POST['startdate']&& $_POST['enddate']){
                trace('提交信息不为空');
                //获取时间值,并进行日期转换
                $startDate = $this->dateDisposal($_POST['startdate']);
                $endDate = $this->dateDisposal($_POST['enddate']);
                $stime = strtotime($startDate);
                $etime = strtotime($endDate);

                //判断转换是否正确
                if($stime&&$etime) {
                    trace('格式正确') ;
                    $ctime = $etime - $stime;
                    $cdate = $ctime/60/60/24;
                    echo '<br>';
                    echo $startDate.'与 '.$endDate.'间隔['.$cdate.']天';
                   // $this->assign('waitSecond','10');
                    $this->success('即将跳转回查询页面','index');

                }else {

                    //页面跳转
                    $this->error('错误的日期格式','index');
                }
            }else {
               // echo '错误，输入项不能为空';
                $this->error('输入项不能为空','index');
            }


        }
    }
    public function dateDisposal($date){
        trace("这是dateDisposal方法");
        trace("原始时间：".$date);
        $date = str_replace('.','-',$date);
        trace("修改后时间：".$date);
        return $date;

    }

}
