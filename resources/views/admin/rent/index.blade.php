@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="col-lg-10 col-md-8 p-4">
        <p>Pages / {{ $data['page_header'] }}</p>

        <h3 class="mb-4"><?= $data['page_header'] ?></h3>
        <div class="card p-4 shadow border-light d-flex">
            <div class="card-title fs-5 fw-medium mb-3">{{ $data['page_title'] . ' Detail' }}</div>
            <x-nav-tabs></x-nav-tabs>
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
                        <th scope="col">Rent User</th>
                        <th scope="col">Facility Name</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    @if(!empty($data['rents']))
                        @foreach($data['rents'] as $rent)
                            <tr class="">
                                <td>{{ $i++ }}</td>
                                <td><img alt="" src="{{ asset('rent/' . $rent['filename']) }}" height="120rem"></td>
                                <td>{{ $rent['name'] }}</td>
                                <td>{{ $rent['detail'] }}</td>
                                <td>{{ $rent['capacity'] }}</td>
                                <td class="text-center">
                                    <a href="{{ url('admin/rent/detail/' . $rent['rent_id']) }}" type="button"
                                       class="btn"
                                       style="background-color: #8EAEC4"><i
                                            class="bi bi-pencil-square me-2"></i>Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="fst-italic ">
                                No Request Available
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
