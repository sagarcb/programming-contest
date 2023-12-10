<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notices;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public function index() {
        $notices = Notices::all();
        return view('admin.notices.list')->with(compact('notices'));
    }

    public function add() {
        return view('admin.notices.add');
    }

    public function create(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required'
        ]);

        try {
            Notices::create($request->all());
        }catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('notices')->with('success', 'Notice added Successfully!');
    }

    public function edit(Notices $notice) {
        return view('admin.notices.edit')->with(compact('notice'));
    }

    public function update(Request $request, Notices $notice) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required'
        ]);

        $notice->update($request->all());
        return redirect()->route('notices')->with('success', 'Notice updated Successfully!');
    }

    public function delete(Notices $notice) {
        $notice->delete();
        return redirect()->route('notices')->with('success', 'Notice deleted Successfully!');
    }
}
