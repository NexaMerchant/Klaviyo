<?php
namespace NexaMerchant\Klaviyo\Console\Commands\Lists;

use NexaMerchant\Apps\Console\Commands\CommandInterface;
use KlaviyoAPI\KlaviyoAPI;

class Lists extends CommandInterface 
{
    protected $signature = 'Klaviyo:lists:lists';

    protected $description = 'Get Klaviyo lists';

    private $klaviyo;

    public function getAppVer() {
        return config("Klaviyo.ver");
    }

    public function getAppName() {
        return config("Klaviyo.name");
    }

    public function handle()
    {
        $this->info("Get Klaviyo lists");

        $this->klaviyo = new KlaviyoAPI(config("Klaviyo.api_key"));

        // Get all lists
        $lists = $this->klaviyo->Lists->getLists();
        var_dump($lists);

        
    }

}