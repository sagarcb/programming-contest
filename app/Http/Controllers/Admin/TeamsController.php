<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PaymentApprovalMail;
use App\Mail\SendAdminApprovalMail;
use App\Models\TeamInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

    public function updatePaymentStatus(TeamInfo $teamInfo, Request $request) {
        if (!empty($request->all())) {
            $content['name'] = $teamInfo->coach_name;
            try {
                if ($request->value) {
                    $teamInfo->payment_status = 1;
                    $teamInfo->save();
                    $emailSend = Mail::to($teamInfo->coach_email)->send(new PaymentApprovalMail($content));
                    if ($emailSend) {
                        return response()->json(['status' => true, 'msg' => 'Payment Status is approved and email has been send successfully!']);
                    }
                    return response()->json(['status' => false, 'msg' => 'Payment Status is approved, but Failed to send email!']);
                }else {
                    $teamInfo->payment_status = 0;
                    $teamInfo->save();
                    return response()->json(['status' => true, 'msg' => 'Payment status disapproved successfully!']);
                }
            }catch (\Exception $exception) {
                return response()->json(['status' => false, 'msg' => $exception->getMessage()]);
            }
        }
        return response()->json(['status' => false, 'msg' => 'Invalid request data']);
    }

    public function delete(TeamInfo $teamInfo) {
        foreach ($teamInfo->members as $member) {
            if (Storage::disk('public')->exists(str_replace('/storage/', '', $member->image))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $member->image));
            }
        }
        $teamInfo->delete();
        return redirect()->route('teams')->with('success', 'Team Info deleted Successfully!');
    }

    public function edit(TeamInfo $teamInfo) {
        return view('admin.teams.edit')->with('team', $teamInfo);
    }

    public function update(TeamInfo $teamInfo, Request $request) {
        $request->validate([
            'team_name' => 'required',
            'university_name' => 'required',
            'coach_name' => 'required',
            'coach_email' => 'required|email',
            'coach_mobile_number' => 'required',
            'coach_tshirt_size' => 'required'
        ]);

        $requestData = $request->all();
        if (!empty($requestData) && !empty($requestData['name']) && !empty($requestData['email']) && !empty($requestData['tshirt_size'])) {
            try {
                if ($teamInfo->update($requestData)) {
                    foreach ($teamInfo->members as $key => $member) {
                        $fileStoragePath = $member->image;
                        if (isset($requestData['image'][$key]) && !empty($requestData['image'][$key]))  {
                            if (Storage::disk('public')->exists(str_replace('/storage/', '', $member->image))) {
                                Storage::disk('public')->delete(str_replace('/storage/', '', $member->image));
                            }
                            $fileName = time() . '_' . $requestData['image'][$key]->getClientOriginalName();
                            $filePath = $requestData['image'][$key]->storeAs('uploads', $fileName, 'public');
                            $fileStoragePath = '/storage/' . $filePath;
                        }
                        $memberData['name'] = $requestData['name'][$key];
                        $memberData['email'] = $requestData['email'][$key];
                        $memberData['image'] = $fileStoragePath;
                        $memberData['tshirt_size'] = $requestData['tshirt_size'][$key];

                        $member->update($memberData);
                    }
                    return redirect()->route('teams')->with('success', 'Data updated Successfully!');
                }
                return back()->with('error', 'Failed to update data!');
            }catch (\Exception $exception) {
                return back()->with('error', $exception->getMessage());
            }
        }
        return back()->with('error', 'Invalid Request Data!');
    }
}
