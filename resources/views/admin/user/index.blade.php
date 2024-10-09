@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="col-lg-10 col-md-6 p-4">
        <p>Pages / {{ $data['page_title'] }}</p>
        <h3 class="mb-4"><?= $data['page_title'] ?></h3>
        <div class="card p-4 shadow border-light d-flex">
            <div class="card-title fs-5 fw-medium mb-3">{{ $data['page_title'] . ' Detail' }}</div>

            <table class="table">
                <thead>
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach($data['user'] as $user)
                    <tr class="">
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phonenumber }}</td>
                        <td class="text-center">
                            <a href="{{ url('admin/user/edit/' . $user->id) }}" type="button" class="btn"
                               style="background-color: #8EAEC4"><i
                                    class="bi bi-pencil-square me-2"></i>Edit</a>
                            <a href="" type="button"
                               class="btn" style="background-color: #D9D9D9"><i
                                    class="bi bi-clock-history me-2"></i>History</a>

                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
