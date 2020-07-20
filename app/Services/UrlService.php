<?php


namespace App\Services;


use App\Models\Url;

class UrlService
{
    /**
     * @param $data
     * @return Url
     */
    public function short($data) {
        $url = Url::searchByLongUrl($data['long_url'])->first();

        if(!$url){
            if(isset($data['custom_url'])) {
                $data['short_url'] = $data['custom_url'];
            }else {
                $data['short_url'] = substr(md5($data['long_url'].mt_rand()), 0, 8);;
            }

            $url = new Url($data);
            $url->save();
        }

        return $url;
    }

    /**
     * @param $short_url
     * @return mixed
     */
    public function getRedirectUrl($short_url) {
        return Url::searchByShortUrl($short_url)->first();
    }
}