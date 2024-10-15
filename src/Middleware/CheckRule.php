<?php

namespace Firwalle\Rule\Middleware;

use Closure;
use Jenssegers\Agent\Agent;
use Firwalle\Rule\Models\{
    blacklistip,
    browserlist,
    geolist,
    oslist,
    whitelistip,
    notfound
  };

class CheckRule
{
    public function handle($request, Closure $next)
    {

        // Your middleware logic here
         $ip = $request->ip();

        $ip_data = blacklistip::where('ip',$ip)->first();

        if($ip_data){
            $message = 'This ip is blocked !';
            return response(view('Rule::error_show')->with('Inactive',$message));
        }

        // get request informations
        $userAgent = $request->header('User-Agent');
        $agent = new Agent();
        $agent->setUserAgent($userAgent);

        // Get the browser name
        $browser = $agent->browser();
        $browser_data = browserlist::where('browser_name',$browser)->first();

        if($browser_data){
          $message = 'This Browser is blocked !';
          return response(view('Rule::error_show')->with('Inactive',$message));
        }

        // Get the operating system
        $os = $agent->platform();
        $os_data = oslist::where('os_name',$os)->first();

        if($os_data){
          $message = 'This OS is blocked !';
          return response(view('Rule::error_show')->with('Inactive',$message));
        }


         //404 error save
         $response =  $next($request); 
         if($response->getStatusCode() == 404){
            
             if ($this->shouldExcludeRequest($request)) {
                 return $response;
             }
 
             $notfound_data = notfound::where('ip',$ip)->where('error_code',$response->getStatusCode())->first();
               
             if($notfound_data){
                 if( $notfound_data->count <= 5){
                     $notfound_data->count = $notfound_data->count + 1;
                     $notfound_data->save();
 
                 }else{
                     $whiteip_data = whitelistip::where('ip',$ip)->first();
                     if(!$whiteip_data){
                         $blacklist_data =  blacklistip::where('ip',$ip)->first();
                         if(!$blacklist_data ){
                             blacklistip::create([
                                 'ip' => $ip
                             ]);
                         }
                     }
                 }
 
             }else{
                 notfound::create([
                     'ip' => $ip,
                     'count' => '1',
                     'error_code' => $response->getStatusCode()
                 ]); 
             }
 
             $message = '404 Not Found';
             return response(view('Rule::error_show')->with('Inactive',$message));
         }
      
        return $next($request);

      
    }


    //check file extensions
    private function shouldExcludeRequest(Request $request): bool
    {
        $excludedExtensions = [
            'css',
            'js',
            'map',
            'png',
            'svg',
            'jpg',
             // Add any other extensions you want to exclude
        ];

        $urlPath = pathinfo(parse_url($request->url(), PHP_URL_PATH), PATHINFO_EXTENSION);

        return in_array($urlPath, $excludedExtensions);
    }

}
