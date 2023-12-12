<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Exception;

class ContestController extends Controller
{
    public function index(){
        $contests = Contest::orderBy('id', 'desc')->get();
        return view('admin.contest.list')->with(compact('contests'));
    }

    public function add() {
        return view('admin.contest.add');
    }

    public function create(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required'
        ]);

        try {
            $fileStoragePath = null;
            if ($request->file())  {
                $fileName = time() . '_' . $request->banner->getClientOriginalName();
                $filePath = $request->file('banner')->storeAs('uploads', $fileName, 'public');
                $fileStoragePath = '/storage/' . $filePath;
            }
            Contest::create([
                'title' => $request->title,
                'banner' => $fileStoragePath,
                'description' => $request->description
            ]);
        }catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return redirect()->route('contests')->with('success', 'Contest added Successfully!');
    }

    public function changeActiveStatus(Contest $contest) {
        try {
            $contest->active_status = !intval($contest->active_status);
            if ($contest->save()) {
                return response()->json(['status' => true, 'msg' => 'Status updated successfully!']);
            }
            return response()->json(['status' => false, 'msg' => 'Failed to update status!']);
        }catch (\Exception $exception) {
            return response()->json(['status' => false, 'msg' => $exception->getMessage()]);
        }
    }

    public function edit(Contest $contest) {
        return view('admin.contest.edit')->with(compact('contest'));
    }

    public function update(Contest $contest, Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required'
        ]);

        $requestData = $request->all();
        $requestData['banner'] = $contest->banner;
        if ($request->file())  {
            if (file_exists(asset($contest->banner))) {
                unlink(asset($contest->banner));
            }
            $fileName = time() . '_' . $request->banner->getClientOriginalName();
            $filePath = $request->file('banner')->storeAs('uploads', $fileName, 'public');
            $fileStoragePath = '/storage/' . $filePath;
            $requestData['banner'] = $fileStoragePath;
        }

        $contest->update($requestData);
        return redirect()->route('contests')->with('success', 'Contest updated Successfully!');
    }

    public function delete(Contest $contest) {
        $contest->delete();
        return redirect()->route('notices')->with('success', 'Contest deleted Successfully!');
    }
}
