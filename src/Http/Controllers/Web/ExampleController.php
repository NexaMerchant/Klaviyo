<?php
/**
 * 
 * This file is auto generate by Nicelizhi\Apps\Commands\Create
 * @author Steve
 * @date 2025-02-27 13:49:53
 * @link https://github.com/xxxl4
 * 
 */
namespace NexaMerchant\Klaviyo\Http\Controllers\Web;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function demo(Request $request) {
        $data = [];
        $data['code'] = 200;
        $data['message'] = "Demo";
        return view('Klaviyo::demo', compact("data"));
    }
}
