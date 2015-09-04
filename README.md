# Palette

一个开源的 PHP 图床程序，基于 laravel 框架开发。

### 注意

此应用仍在开发中！

 - 前台用户界面 [OK]
 - 后台管理界面 [Waiting]

> 请不要将此应用应用到生产环境！
> 目前已经可以正常使用，但是没有后台管理界面。

### 环境要求

PHP >= 5.6  [低于 5.6 版本未经测试，5.5 理论可用]

### 如何安装

首先复制 `.env.example` 到 `.env`，修改里面的数据库链接信息。

数据库可选 `MySQL` 和 `SQLite`(未测试)

然后进入 `database/seeds/DatabaseSeeder.php` 设置管理管理员信息

然后执行：

    php artisan migrate
    php artisan db:seed

### 框架

laraval v5.1 LTS

### 开源协议

MIT
