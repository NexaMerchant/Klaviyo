<?php
namespace NexaMerchant\Klaviyo\Console\Commands\Profile;

use NexaMerchant\Apps\Console\Commands\CommandInterface;
use KlaviyoAPI\KlaviyoAPI;
use Illuminate\Support\Facades\Redis;

class Lists extends CommandInterface 
{
    protected $signature = 'Klaviyo:profile:lists';

    protected $description = 'Get Klaviyo profile lists';

    private $klaviyo;

    private $page_cursor = null;

    private $client;

    private $list_id = "Rua5Sy";

    public function getAppVer() {
        return config("Klaviyo.ver");
    }

    public function getAppName() {
        return config("Klaviyo.name");
    }

    public function handle()
    {
        $this->info("Get Klaviyo profile lists");

        $this->klaviyo = new KlaviyoAPI(config("Klaviyo.api_key"));

        $list_id = "Rua5Sy";

        // Get all profiles Lists
        $profiles = $this->getProfiles();   

        

        
    }

    public function getProfiles($next = null) {
        $profiles = $this->klaviyo->Profiles->getProfiles(
            page_size: 100,
            page_cursor: $next
        );

        $this->client = new \GuzzleHttp\Client();
        
        // check the profile in the list, if not exist, create it
        foreach ($profiles['data'] as $profile) {
            //var_dump($profile);

            $profile_id = $profile['id'];

            // relationships/profiles
            $this->info('Pushing profile to Klaviyo...'.$profile_id);
            //var_dump($profile_id);

            // check if the profile exists
            $profile_exists = Redis::get('klaviyo_profile_'.$profile_id);
            if ($profile_exists) {
                continue;
            }

            $response = $this->client->request('POST', 'https://a.klaviyo.com/api/lists/'.$this->list_id.'/relationships/profiles', [
                'body' => '{"data":[{"type":"profile","id":"'.$profile_id.'"}]}',
                'headers' => [
                  'Authorization' => 'Klaviyo-API-Key ' . config('mail.mailers.klaviyo.api_key'),
                  'accept' => 'application/vnd.api+json',
                  'content-type' => 'application/vnd.api+json',
                  'revision' => '2025-01-15',
                ],
              ]);
              
              echo $response->getBody();

              // redis save the profile id
              Redis::set('klaviyo_profile_'.$profile_id, $profile_id);
              sleep(1);


              //exit;


        }

        //var_dump($profiles);

        //exit;
        

        if ($profiles['links']['next']) {
            $this->error('Next page...'.$profiles['links']['next']);
            $this->getProfiles($profiles['links']['next']);
        }

        //var_dump($profiles);
        

        return $profiles;        
    }

}