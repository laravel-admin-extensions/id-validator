<?php

namespace Encore\Admin\IdValidator\Http\Controllers;

use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Callout;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\Table;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Jxlwqq\IdValidator\IdValidator;

class IdValidatorController extends Controller
{
    public function index(Request $request, Content $content)
    {
        $content->header('身份证校验');
        $content->description(' ');

        $form = new Form($request->all());
        $form->method('GET');
        $form->action(admin_url('id-validator'));
        $form->text('id', '身份证号码');

        $content->row(new Box('查询', $form));

        if ($id = $request->get('id')) {
            $content->row($this->renderResultTable($id));
        }

        return $content;
    }

    protected function renderResultTable($id)
    {
        $idValidator = new IdValidator();

        if (!$idValidator->isValid($id)) {
            $content = "<h4><i class=\"icon fa fa-warning\"></i>  提示</h4>您输入的身份证号码 [{$id}] 不合法";

            return new Callout($content, '', 'warning');
        }

        $info = $idValidator->getInfo($id);

        $data = [
            '地址码'     => Arr::get($info, 'addressCode'),
            '地址码是否废弃' => Arr::get($info, 'abandoned'),
            '地址'      => Arr::get($info, 'address'),
            '出生日期'    => Arr::get($info, 'birthdayCode'),
            '星座'      => Arr::get($info, 'constellation'),
            '生肖'      => Arr::get($info, 'chineseZodiac'),
            '性别'      => Arr::get($info, 'sex') == 1 ? '男' : '女',
            '号码长度'    => Arr::get($info, 'length'),
            '校验码'     => Arr::get($info, 'checkBit'),
        ];

        return new Box('查询结果', new Table(['信息'], $data));
    }
}