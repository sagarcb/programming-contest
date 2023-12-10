<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerificationMail;
use App\Models\Contest;
use App\Models\MemberInfo;
use App\Models\Notices;
use App\Models\TeamInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index() {
        $contest = Contest::where('active_status', 1)->first();
        if ($contest) {
            Session::put('active_contest', true);
        }else {
            Session::put('active_contest', false);
        }
        return view('frontend.pages.index')->with(compact('contest'));
    }

    public function registration() {
        return view('frontend.pages.registration');
    }

    public function create(Request $request) {
        $request->validate([
            'team_name' => 'required',
            'university_name' => 'required',
            'coach_name' => 'required',
            'coach_email' => 'required|email',
            'coach_mobile_number' => 'required',
            'coach_tshirt_size' => 'required'
        ]);
        try {
            $contest = Contest::where('active_status', 1)->first();
            if ($contest) {
                $requestData = $request->all();
                $requestData['contest_id'] = $contest->id;
                $requestData['verification_token'] = Str::random(60);
                $teamInfo = TeamInfo::create($requestData);
                $verificationUrl = route('verifyEmail', $requestData['verification_token']);

                foreach ($requestData['team_info']  as $team) {
                    /*Store image*/
                    $fileStoragePath = null;
                    if ($team['image']) {
                        $fileName = time() . '_' . $team['image']->getClientOriginalName();
                        $filePath = $team['image']->storeAs('uploads', $fileName, 'public');
                        $fileStoragePath = '/storage/' . $filePath;
                    }
                    /*Store image*/
                    $team['team_info_id'] = $teamInfo->id;
                    $team['image'] = $fileStoragePath;
                    MemberInfo::create($team);
                }
                if ($this->sendEmail($contest, $teamInfo, $verificationUrl)) {
                    Session::put('emailVerificationPage', true);
                    return redirect()->route('verificationInfoPage')->with('success', "We have sent you an email
                    with verification link to '$teamInfo->coach_email' this email address. Please verify!");
                }
                Session::put('emailVerificationPage', false);
                return back()->with('error', 'Failed to send verification email! Please contact with the SUB');
            }
            Session::put('emailVerificationPage', false);
            return back()->with('error', 'Something went wrong. Please try again!');
        }catch (\Exception $exception) {
            Session::put('emailVerificationPage', false);
            return back()->with('error', 'Something went wrong. Please try again!');
        }
    }

    public function verifyEmail($token) {
        if ($token) {
            $teamInfo = TeamInfo::where('verification_token', $token)->first();
            if ($teamInfo) {
                if (!$teamInfo->email_verified) {
                    $teamInfo->email_verified = true;
                    $teamInfo->save();
                    Session::put('emailVerificationPage', false);
                    return view('frontend.pages.email-verified-page')
                        ->with('success', 'Your email has been verified successfully! Please wait for Admin confirmation email!');
                }else {
                    return redirect()->route('home')->with('error', 'Email already verified!');
                }
            }else {
                return view('frontend.pages.email-verified-page')->with('error', 'Invalid Token!');
            }
        }
        return view('frontend.pages.email-verified-page')->with('error', 'No Verification Token Found!');
    }

    public function verificationInfoPage() {
        if (Session::get('emailVerificationPage')) {
            return view('frontend.pages.verification-info-page');
        }
        return back()->with('error', "You can't enter to this page!");
    }

    public function teams() {
        $teams = TeamInfo::all();
        return view('frontend.pages.teams')->with(compact('teams'));
    }

    public function notices() {
        $notices = Notices::all();
        return view('frontend.pages.notices')->with(compact('notices'));
    }

    private function sendEmail($contestData, $coachData, $url) {
        try {
            $content = [
                'name' => $coachData->coach_name,
                'contest_title' => $contestData->title,
                'verification_link' => $url
            ];

            $emailSend = Mail::to($coachData->coach_email)->send(new EmailVerificationMail($content));
            if ($emailSend) return true;
            return false;
        }catch (\Exception $exception) {
            return false;
        }
    }
}
