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
                <form role="form" method="POST" action="{{ route('item.add') }}" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="text-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <div class="row my-2">
                        <div class="col-lg-10">
                            <label for="item_name" class="form-label">Name</label>
                            <input name="item_name" type="text" id="item_name" class="form-control" autofocus required>
                        </div>
                        <div class="col-lg-2">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input name="capacity" type="number" min="1" id="capacity" class="form-control" autofocus required>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3"
                                      required></textarea>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label for="item_img" class="form-label">Picture</label>
                            <input class="form-control" type="file" id="item_img" name="item_img"
                                   accept=".png, .jpg, .jpeg">
                        </div>
                        <div class="col-lg-6">
                            <img src="#" id="item_preview" alt="" height=120rem class="mt-2">
                            <!--for preview purpose -->
                        </div>
                    </div>
                    <div class="text-center justify-content-center">
                        <button id="submit" name="submit" type="submit"
                                class="text-white btn m-4 px-5"
                                style="background-color: #67C6E3">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>

        $(document).ready(function (e) {


            $('#item_img').change(function () {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#item_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });

    </script>
@endsection
