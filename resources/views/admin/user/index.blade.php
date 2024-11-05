@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <x-admin-nav>{{ $data['page_title'] }}</x-admin-nav>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 pt-3 ">
                <h6 class="text-capitalize">{{ $data['page_header'] }}</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr class="">
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email Address</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    @foreach($data['user'] as $user)
                        <tr class="align-middle text-xs font-weight-bold mb-0">
                            <td>
                                <div class="d-flex ps-3 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $i++ }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $user['name'] }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $user['email'] }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $user['phonenumber'] }}</p>
                            </td>

                            <td class="text-center">
                                <a href="{{ url('admin/user/edit/' . $user['id']) }}" type="button" class="btn text-white"
                                   style="background-color: #8EAEC4"><i
                                        class="bi bi-pencil-square me-2"></i>Edit</a>
                                <a href="" type="button"
                                   class="btn text-dark" style="background-color: #D9D9D9"><i
                                        class="bi bi-clock-history me-2"></i>History</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
