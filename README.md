**参考[zhuxiaoqiao/laravel-baidu-bos][1]**
因为原作者太久没维护

 1. 添加url方法获取图片路径（可在laravel-admin使用）
 2. 删除了BaiduBce.phr的symfony包使其不与laravel底层的symfony包冲突
 3. 更新BaiduBce.phr到了0.9.4

## 安装

```bash
composer require "diedaidai/laravel-bos"
```
在配置文件`config/app.php` `providers` 添加 
```php
Diedaidai\LaravelBos\BaiduBosFilesystemServiceProvider::class,
```

## 添加你的bos配置

编辑 `config\filesystems.php`:

```php
	'disks' => [
		...
		'bos' => [
			'driver' => 'bos',
			'bucket' => 'your-bucket-name',
			'options' => [
				'credentials' => [
					'ak' => 'your-ak',
					'sk' => 'your-sk',
				],
				'endpoint' => 'http://su.bcebos.com/upload/',
			]，
			'url' => 'http://gkoss01.su.bcebos.com/',
		],
	],
```

## 使用

```php
$path = Storage::disk('bos')->putFileAs($folder_name, $file,$filename);//上传
$path = Storage::disk('bos')->url($filename);//获取
```
## 更多方法参考laravel文档
[https://learnku.com/docs/laravel/5.6/filesystem/1390][2]


  [1]: https://github.com/zhuxiaoqiao/laravel-baidu-bos
  [2]: https://learnku.com/docs/laravel/5.6/filesystem/1390
