<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ViewReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {
        $data['page_title'] = 'Reports';
        $data['page_header'] = 'Report';
        $data['reports'] = ViewReport::all()->toArray();

        return view('admin.report.index', compact('data'));
    }

    public function detail(Request $request, $id)
    {
        $data['page_title'] = 'Reports';
        $data['page_header'] = 'Report';
        $data['reports'] = ViewReport::where('report_id', '=', $id)->first();

        return view('admin.report.detail', compact('data'));
    }


}
