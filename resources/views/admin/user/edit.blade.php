@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="col-lg-10 col-md-6 p-4">
        <p>Pages / {{ $data['page_header'] }}</p>
        <h3 class="mb-4"><?= $data['page_header'] ?></h3>
        <div class="card p-4 shadow border-light d-flex">


        </div>
    </div>
@endsection
