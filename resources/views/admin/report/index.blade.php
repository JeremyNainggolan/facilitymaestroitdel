@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="col-lg-10 col-md-8 p-4">
        <p>Pages / {{ $data['page_header'] }}</p>

        <h3 class="mb-4"><?= $data['page_header'] ?></h3>
        <div class="card p-4 shadow border-light d-flex">
            <div class="card-title fs-5 fw-medium mb-3">{{ $data['page_title'] . ' Detail' }}</div>
            @if (session()->has('error'))
                <div class="text-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="text-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Report Date</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    @if(!empty($data['reports']))
                        @foreach($data['reports'] as $report)
                            <tr class="">
                                <td>{{ $i++ }}</td>
                                <td><img alt=""
                                         src="{{ asset($report['filename'] != null ? 'report/' . $report['filename'] : 'report/default.png') }}"
                                         height="120rem"></td>
                                <td>{{ $report['item_name'] }}</td>
                                <td>{{ $report['condition'] }}</td>
                                <td>{{ $facility['report_date'] }}</td>
                                <td class="text-center">
                                    <a href="{{ url('admin/report/detail/' . $facility['report_id']) }}" type="button"
                                       class="btn"
                                       style="background-color: #8EAEC4"><i
                                            class="bi bi-pencil-square me-2"></i>Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="fst-italic">
                                No Data Available
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
