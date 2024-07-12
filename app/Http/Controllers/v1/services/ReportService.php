<?php

namespace App\Http\Controllers\v1\services;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Reports;
use Illuminate\Http\Request;

class ReportService extends Controller
{
    public function createReport(Request $request){
        $data = $request->input('data');
        $actionType = $request->input('actionType');
        $reportIdRandom = 'REPORT-'. random_int(0, 999999999);
        try{
            switch($actionType){
                case 'addReport':
                    $this->addReport(
                        $data['reportId'] = $reportIdRandom,
                        $data['issue'],
                        $data['department'],
                        $data['email']
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

    private function addReport($reportId, $issue, $department, $email){
        Report::create([
            'reportId' => $reportId,
            'issue' => $issue,
            'department' => $department,
            'email' => $email
        ]);
    }
}
