<?php

namespace Firwalle\Rule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Firwalle\Rule\Models\{
  blacklistip,
  browserlist,
  geolist,
  oslist,
  whitelistip
};

class FirwalleController extends Controller
{
   public function whitelist(){
    $data = whitelistip::get();
    return view("Rule::firewall.whiteip",['datas' => $data ]);

   }
   public function blacklist(){
    $data = blacklistip::get();
    return view("Rule::firewall.blackip",['datas' => $data ]);
   }
   public function browserlist(){
    $data = browserlist::get();
    return view("Rule::firewall.browserlist",['datas' => $data ]);

   }
   public function geolist(){
    $data = geolist::get();
    return view("Rule::firewall.geolist",['datas' => $data ]);

   }
   public function oslist(){
    $data = oslist::get();
    return view("Rule::firewall.os",['datas' => $data ]);

   }


   public function whitelist_store(Request $request){
    $whitedata = $request->validate([
      "whiteip" => 'required',
    ]);

     $whiteipdata =  whitelistip::create([
        "ip" => $request->whiteip
    ]);

    if($whiteipdata){
        return redirect()->route('firewall.whitelist');
    }

   }

   public function blacklist_store(Request $request){
    $blackipdata = $request->validate([
      "blackip" => 'required',
    ]);

     $blackdata =  blacklistip::create([
        "ip" => $request->blackip
    ]);

    if($blackdata){
        return redirect()->route('firewall.blacklist');
    }
   }
    public function browserlist_store(Request $request){
      $browserlistdata = $request->validate([
        "browser_name" => 'required',
      ]);

       $browserdata =  browserlist::create([
          "browser_name" => $request->browser_name
      ]);

      if($browserdata){
          return redirect()->route('firewall.browserlist');
      }
    }

    public function geolist_store(Request $request){
      $geolistdata = $request->validate([
        "country_name" => 'required',
        "city_name" => 'required',
      ]);

       $geodata =  geolist::create([
          "country_name" => $request->country_name,
          "city_name" => $request->city_name,
      ]);

      if($geodata){
          return redirect()->route('firewall.geolist');
      }
    }

    public function oslist_store(Request $request){
            $osdata = $request->validate([
              "os_name" => 'required',
            ]);

             $osdata =  oslist::create([
                "os_name" => $request->os_name
            ]);

            if($osdata){
                return redirect()->route('firewall.oslist');
            }
    }

}
