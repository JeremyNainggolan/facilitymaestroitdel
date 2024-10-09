@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="col-lg-10 col-md-8 p-4">
        <p>Pages / {{ $data['page_title'] }}</p>

        <h3 class="mb-4"><?= $data['page_title'] ?></h3>
        <div class="card p-4 shadow border-light d-flex">
            <div class="card-title fs-5 fw-medium mb-3">{{ $data['page_title'] . ' Detail' }}<a href="{{ url('admin/item/add') }}" class="text-decoration-none text-dark"><i
                        class="bi bi-node-plus-fill ms-2"></i></a></div>
            <table class="table">
                <thead>
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Condition</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @if($data['items'] != null)
                    @foreach($data['items'] as $item)
                        <tr class="">
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->filename }}</td>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->item_status }}</td>
                            <td>{{ $item->condition }}</td>
                            <td class="text-center">
                                <a target="_blank" href="" type="button" class="btn"
                                   style="background-color: #8EAEC4"><i
                                        class="bi bi-pencil-square me-2"></i>Edit</a>
                                <a href="" type="button"
                                   class="btn" style="background-color: #D9D9D9"><i
                                        class="bi bi-clock-history me-2"></i>History</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="fst-italic">No Item Available</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
