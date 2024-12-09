@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <x-admin-nav>{{ $data['page_title'] }}</x-admin-nav>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 pt-3 ">
                <h6 class="text-capitalize">{{ $data['page_header'] }}</h6>
            </div>
            <div class="mx-4">
                    @if (session()->has('error'))
                        <div class="text-danger fw-bolder">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row my-2">
                        <div class="col-lg-8">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" id="name" class="form-control"
                                   value="{{ $data['reports']->user_name }}" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label for="re_date" class="form-label">Report Date</label>
                            <input type="date" readonly name="re_date" class="form-control" id="re_date"
                                   value="{{ $data['reports']->report_date }}">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <label for="reason" class="form-label">Reason</label>
                            <textarea rows="3" name="reason" type="text" id="reason" class="form-control"
                                      readonly>{{ $data['reports']->reason }}</textarea>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-3">
                            <label class="form-label">Picture</label>
                            <br>
                            <img src="{{ asset('report/' . $data['reports']->filename ) }}" alt="" width="120rem">
                        </div>
                        @if($data['reports']->item_id)
                            <div class="col-lg-3">
                                <label for="name" class="form-label">Item Name</label>
                                <input type="text" class="form-control" value="{{ $data['reports']->i_name }}"
                                       readonly>
                            </div>
                            <div class="col-lg-3">
                                <label for="condition" class="form-label">Item Condition</label>
                                <input type="text" class="form-control" value="{{ $data['reports']->i_condition }}"
                                       readonly>
                            </div>

                        @endif
                        <div class="col-lg-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" value="{{ $data['reports']->rent_status }}"
                                   readonly>
                        </div>
                    </div>
                    <div class="text-center justify-content-center">
                        <a type="button" href="{{ url('admin/report') }}" class="text-white btn m-4 px-5" style="background-color: #67C6E3">Back</a>
                    </div>
            </div>
        </div>
@endsection
