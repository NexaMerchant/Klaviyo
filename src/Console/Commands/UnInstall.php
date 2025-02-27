<?php
/**
 * 
 * This file is auto generate by Nicelizhi\Apps\Commands\Create
 * @author Steve
 * @date 2025-02-27 13:49:53
 * @link https://github.com/xxxl4
 * 
 */
namespace NexaMerchant\Klaviyo\Console\Commands;

use NexaMerchant\Apps\Console\Commands\CommandInterface;

class UnInstall extends CommandInterface 

{
    protected $signature = 'Klaviyo:uninstall';

    protected $description = 'Uninstall Klaviyo an app';

    public function getAppVer() {
        return config("Klaviyo.ver");
    }

    public function getAppName() {
        return config("Klaviyo.name");
    }

    public function handle()
    {
        if (!$this->confirm('Do you wish to continue?')) {
            // ...
            $this->error("App Klaviyo UnInstall cannelled");
            return false;
        }
    }
}