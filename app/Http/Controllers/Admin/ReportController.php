<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {
        $data['page_title'] = 'Reports';
        $data['page_header'] = 'Report';
        $data['reports'] = Report::all()->toArray();

        return view('admin.report.index', compact('data'));
    }
}
