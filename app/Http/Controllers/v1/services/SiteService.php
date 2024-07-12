<?php

namespace App\Http\Controllers\v1\services;

use App\Http\Controllers\Controller;
use App\Models\Sites;
use Illuminate\Http\Request;

class SiteService extends Controller
{
    public function addSite(Request $request){
        $data = $request->input('data');
        $actionType = $request->input('actionType');
        $sitesIdRandom = 'SITE-'. random_int(0, 999999);
        try{
            switch($actionType){
                case 'addSites':
                    $this->addSites(
                        $data['siteId'] = $sitesIdRandom,
                        $data['site_name'],
                        $data['location'],
                        $data['staff_assigned']
                    );
                break;
                default:
                break;
            }
            return response()->json([
                'message' => 'success'
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    private function addSites($siteId, $siteName, $location, $staffAssigned){
        Sites::create([
            'siteId' => $siteId,
            'site_name' => $siteName,
            'location' => $location,
            'staff_assigned' => $staffAssigned
        ]);
    }
}
