部署步骤

0. cd 到项目文件夹

A. composer安装 (依次运行，如下命令)
* 1. composer global require "fxp/composer-asset-plugin:^1.2.0"
* 2. composer install --no-dev


B. 初始化相关文件(自动生成文件，运行如下命令)
* 1. 执行命令 "./init --env=OnlineTest --overwrite=all"


C. 使用migrate生成数据库
* 1. 生成mysql数据库 (utf8_unicode_ci)
* 2. 配置数据库信息(common/config/database.php). 直接打开编辑即可
* 3. 运行命令 ./yii migrate(全部选择:yes)



D. web服务器 Nginx 设置
* 1. 复制并编辑提供的Demo配置文件 (/common/demoData/demo_web.conf)
* 2. 本项目需要3个域名才可使用，分别是:
	* 2.1 前端访问域名, 指向 /frontend/web/index.php
	* 2.2 管理后端访问域名, 指向 /frontendplus/web/index.php
	* 2.3 资源域名, 指向 /upload/



E. 其它参数配置
* 1.1 打开 /common/config/params-local.php
* 1.2 修改 "url.resourceBased" 为资源域名, 以"/"结尾, 例如 "http://r.demo.com/"
* 1.3 修改 "path.upload" 为资源存放路径(支持相对和绝对路径), 以"/"结尾, 例如 "/../../upload/", "/usr/tmp/upload/",  
* 1.4 其它参数保持即可




F. 开始测试
* 1. 前端, 打开前端域名直接访问并测试
* 2. 管理后端, 打开域名，登陆后即可测试，使用 eeTest/123 作为默认登录帐号

[Continuous Updating]