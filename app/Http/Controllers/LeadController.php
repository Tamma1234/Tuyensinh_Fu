<?php

namespace App\Http\Controllers;

use App\Imports\LeadHistoryImport;
use App\Models\FileNameLead;
use App\Models\Lead;
use App\Models\LeadHistory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Validators\ValidationException;

class LeadController extends Controller
{
    public function import() {
        return view('leads.import');
    }

    public function postImport(Request $request) {

        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $leads = FileNameLead::select('file_name')->pluck('file_name')->toArray();
        if (!in_array($fileName, $leads)) {
            $user = auth()->user();
            $fileNameLead = new FileNameLead();
            $fileNameLead->create([
                'file_name' => $fileName,
                'user_email' => $user->email
            ]);
            try {
                Excel::import(new UsersImport, $request->file('file'));

                return redirect()->route('dashboard')->with('success', 'Leads successfully imported');
            } catch (ValidationException $e) {
                $failures = $e->failures();
                Excel::import(new LeadHistoryImport(), $request->file('file'));

                return redirect()->back()->with('import_errors', $failures);
//            foreach ($failures as $failure) {
//                $failure->row(); // row that went wrong
//                $failure->attribute(); // either heading key (if using heading row concern) or column index
//                $failure->errors(); // Actual error messages from Laravel validator
//                $failure->values(); // The values of the row that has failed.
//            }
            }
        } else {
            return redirect()->back()->with('error', "File Excel Already exist");
        }
    }

    public function leadHistory(Request $request) {
        $leadHistory = LeadHistory::all();
        return view('leads.history', compact('leadHistory'));
    }
}
