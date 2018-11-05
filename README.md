身份证验证
======

这个扩展基于[jxlwqq/id-validator](https://github.com/jxlwqq/id-validator)，用来验证中国大陆居民身份证、港澳居民居住证以及台湾地区居民居住证，输入证件号码查询后，如果身份证号合法，下方会显示分析信息（地区、出生日期、星座、生肖、性别、校验位），如果不合法则下面显示一个异常提示

## 工具截图

![wx20181105-231239](https://user-images.githubusercontent.com/1479100/48006400-55ec8f80-e150-11e8-8ed9-6e6ee14aff03.png)

## 安装

```bash
composer require laravel-admin-ext/id-validator
```

然后运行下面的命令在后台左侧菜单增加一个入口链接：
```bash
php artisan admin:import id-validator
```

打开`http://lcoalhost/admin/id-validator`即可使用。

License
------------
Licensed under [The MIT License (MIT)](LICENSE).

