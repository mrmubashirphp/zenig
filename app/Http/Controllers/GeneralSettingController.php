<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\InitialRefNo;
use App\Models\PoImportantNote;
use App\Models\PrApproval;
use App\Models\Quotation;
use App\Models\SpecBreak;
use App\Models\SstPercentage;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function create()
    {
        $sst_percentages = SstPercentage::orderBy('id', 'desc')->first();
        $po_important_note = PoImportantNote::orderBy('id', 'desc')->first();
        $spec_break = SpecBreak::orderBy('id', 'desc')->first();
        $qoutation = Quotation::orderBy('created_at', 'ASC')->get();
        $designation = Designation::orderBy('created_at', 'ASC')->get();
        $department = Department::orderBy('created_at', 'ASC')->get();
        return view('general-setting.create', [
            'sst_percentages' => $sst_percentages,
            'po_important_note' => $po_important_note,
            'spec_break' => $spec_break,
            'qoutation' => $qoutation,
            'designation' => $designation,
            'department' => $department,
        ]);
    }

    public function sst_percentage_store(Request $request)
    {
        $sst_percentage = new SstPercentage;
        $sst_percentage->sst_percentage = $request->sst_percentage;
        $sst_percentage->save();
        return redirect()->back();
    }
    public function po_important_note_store(Request $request)
    {
        $po_important_note = new PoImportantNote;
        $po_important_note->po_important_note = $request->po_important_note;
        $po_important_note->save();
        return redirect()->back();
    }
    public function spec_break_store(Request $request)
    {
        $spec_break = new SpecBreak;
        $spec_break->normal_hour = $request->normal_hour;
        $spec_break->ot_hour = $request->ot_hour;
        $spec_break->save();
        return redirect()->back();
    }
    public function initial_ref_no_store(Request $request)
    {
        foreach ($request->refNo as $ref_no) {
            $initial_ref_no = new InitialRefNo;
            $initial_ref_no->ref_no = $ref_no['ref_no'] ?? ''; 
            $initial_ref_no->running_no = $ref_no['running_no'] ?? 0; 
            $initial_ref_no->sample = $ref_no['sample'] ?? 0; 
            $initial_ref_no->save();
        }

        return redirect()->back();
    }
    public function pr_approval_store(Request $request)
    {
        foreach ($request->pr_approval as $pr_approval) {
            $pr_approvals = new PrApproval();
            $pr_approvals->designation = $pr_approval['designation'] ?? ''; 
            $pr_approvals->department = $pr_approval['department'] ?? 0; 
            $pr_approvals->less_more = $pr_approval['less_grate'] ?? 0; 
            $pr_approvals->amount = $pr_approval['amount'] ?? 0; 
            $pr_approvals->save();
        }
        return redirect()->back();
    }

}
