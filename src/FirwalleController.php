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
// whiteip function
    public function whitelist(){
        $data = whitelistip::get();
        return view("Rule::firewall.whiteip",['datas' => $data ]);
    }

    public function whitelist_store(Request $request){
        $whitedata = $request->validate([
        "whiteip" => 'required|ip|unique:whiteip,ip',
        ]);

        $whiteipdata =  whitelistip::insert([
            "ip" => $request->whiteip
        ]);

        if($whiteipdata){
            return redirect()->route('firewall.whitelist');
        }
    }

    public function whiteip_delete(Request $request){
        $data = whitelistip::where('id',$request->id)->delete();
        if (!$data) {
            return response()->json(['status' => '0','message' => "Item not found"], 404);
        }else{
          return response()->json(['status' => '1','message' => 'Item deleted successfully.'], 200);
        }
    }

// Blackip function
    public function blacklist(){
        $data = blacklistip::get();
        return view("Rule::firewall.blackip",['datas' => $data ]);
    }

    public function blacklist_store(Request $request){
        $blackipdata = $request->validate([
          "blackip" => 'required|ip|unique:blackip,ip',
        ]);

         $blackdata =  blacklistip::create([
            "ip" => $request->blackip
        ]);

        if($blackdata){
            return redirect()->route('firewall.blacklist');
        }
    }

    public function blackip_delete(Request $request){
        $data = blacklistip::where('id',$request->id)->delete();
        if (!$data) {
            return response()->json(['status' => '0','message' => "Item not found"], 404);
        }else{
          return response()->json(['status' => '1','message' => 'Item deleted successfully.'], 200);
        }
    }

// Browser function
    public function browserlist(){
        $data = browserlist::get();
        return view("Rule::firewall.browserlist",['datas' => $data ]);
    }
    public function browserlist_store(Request $request){
        $browserlistdata = $request->validate([
          "browser_name" => 'required|unique:browserlist',
        ]);

         $browserdata =  browserlist::create([
            "browser_name" => $request->browser_name
        ]);

        if($browserdata){
            return redirect()->route('firewall.browserlist');
        }
    }

    public function browser_delete(Request $request){
        $data = browserlist::where('id',$request->id)->delete();
        if (!$data) {
            return response()->json(['status' => '0','message' => "Item not found"], 404);
        }else{
          return response()->json(['status' => '1','message' => 'Item deleted successfully.'], 200);
        }
    }
// OS function
    public function oslist(){
        $data = oslist::get();
        return view("Rule::firewall.os",['datas' => $data ]);

    }

    public function oslist_store(Request $request){
        $osdata = $request->validate([
        "os_name" => 'required|unique:oslist',
        ]);

        $osdata =  oslist::create([
            "os_name" => $request->os_name
        ]);

        if($osdata){
            return redirect()->route('firewall.oslist');
        }
    }

    public function os_delete(Request $request){
        $data = oslist::where('id',$request->id)->delete();
        if (!$data) {
            return response()->json(['status' => '0','message' => "Item not found"], 404);
        }else{
          return response()->json(['status' => '1','message' => 'Item deleted successfully.'], 200);
        }
    }
// GEO function
    public function geolist(){
        $data = geolist::get();
        return view("Rule::firewall.geolist",['datas' => $data ]);

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

    public function geo_delete(Request $request){
        $data = geolist::where('id',$request->id)->delete();
        if (!$data) {
            return response()->json(['status' => '0','message' => "Item not found"], 404);
        }else{
          return response()->json(['status' => '1','message' => 'Item deleted successfully.'], 200);
        }
    }



}
