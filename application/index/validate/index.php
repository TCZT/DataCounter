<?php

namespace app\index\validate;
use think\Validate;

class Index extends Validate{

    protected $rule = [
       ['time','dateFormat:Y-m-d','输入时间格式错误']
    ];
}