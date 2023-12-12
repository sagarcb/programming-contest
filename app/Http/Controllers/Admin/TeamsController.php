<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendAdminApprovalMail;
use App\Models\TeamInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TeamsController extends Controller
{
    public function index() {
        $teams = TeamInfo::with('members')->get();
        return view('admin.teams.list')->with(compact('teams'));
    }

    public function updateAdminApproval(TeamInfo $teamInfo, Request $request) {
        if (!empty($request->all())) {
            $content['name'] = $teamInfo->coach_name;
            $content['value'] = $request->value == 'true' ? 1 : 0;
            try {
                if ($request->value) {
                    $teamInfo->admin_approved = 1;
                    $teamInfo->save();
                    $emailSend = Mail::to($teamInfo->coach_email)->send(new SendAdminApprovalMail($content));
                    if ($emailSend) {
                        return response()->json(['status' => true, 'msg' => 'Registration is approved and email has been send successfully!']);
                    }
                    return response()->json(['status' => false, 'msg' => 'Registration is approved, but Failed to send email!']);
                }else {
                    $teamInfo->admin_approved = 0;
                    $teamInfo->save();
                    $emailSend = Mail::to($teamInfo->coach_email)->send(new SendAdminApprovalMail($content));
                    if ($emailSend) {
                        return response()->json(['status' => true, 'msg' => 'Registration is disapproved and email has been send successfully!']);
                    }
                    return response()->json(['status' => false, 'msg' => 'Registration is disapproved, but Failed to send email!']);
                }
            }catch (\Exception $exception) {
                return response()->json(['status' => false, 'msg' => $exception->getMessage()]);
            }
        }
        return response()->json(['status' => false, 'msg' => 'Invalid request data']);
    }

    public function delete(TeamInfo $teamInfo) {
        $teamInfo->delete();
        return redirect()->route('teams')->with('success', 'Team Info deleted Successfully!');
    }
}
