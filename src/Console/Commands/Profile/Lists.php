<?php
namespace NexaMerchant\Klaviyo\Console\Commands\Profile;

use NexaMerchant\Apps\Console\Commands\CommandInterface;
use KlaviyoAPI\KlaviyoAPI;

class Lists extends CommandInterface 
{
    protected $signature = 'Klaviyo:profile:lists';

    protected $description = 'Get Klaviyo profile lists';

    public function getAppVer() {
        return config("Klaviyo.ver");
    }

    public function getAppName() {
        return config("Klaviyo.name");
    }

    public function handle()
    {
        $this->info("Get Klaviyo profile lists");

        $klaviyo = new KlaviyoAPI(config("Klaviyo.api_key"));

        // Get all profiles Lists
        $lists = $klaviyo->Profiles->getProfiles(
            page_size: 1
        );
        var_dump($lists);

        
    }

}