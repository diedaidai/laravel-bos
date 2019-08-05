<?php namespace Diedaidai\LaravelBos;

use Storage;
use BaiduBce\Services\Bos\BosClient;
use Diedaidai\LaravelBos\BaiduBosAdapter;
use Diedaidai\LaravelBos\PutFilePlugin;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class BaiduBosFilesystemServiceProvider extends ServiceProvider {

    public function boot()
    {
        Storage::extend('bos', function($app, $config)
        {
            $client = new BosClient($config['options']);
            $filesystem = new Filesystem(new BaiduBosAdapter($client, $config['bucket'],$config['url']));
            $filesystem->addPlugin(new PutFilePlugin);

            return $filesystem;
        });
    }

    public function register()
    {
        //
    }

}
