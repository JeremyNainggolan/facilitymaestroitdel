@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="col-lg-10 col-md-8 p-4">
        <p>Pages / {{ $data['page_header'] }}</p>
        <h3 class="mb-4"><?= $data['page_header'] ?></h3>
        <div class="card p-4 shadow border-light d-flex">
            <div class="card-title fs-5 fw-medium mb-3">{{ $data['page_title']}}</div>
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
                    <div class="col-lg-12">
                        <label for="item_name" class="form-label">Storage Name</label>
                        <input name="name" type="text" id="name" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-lg-12">
                        <label for="detail" class="form-label">Detail</label>
                        <textarea name="detail" class="form-control" id="detail" rows="3" required></textarea>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-lg-10">
                        <label for="item_img" class="form-label">Picture</label>
                        <input class="form-control" type="file" id="item_img" name="item_img"
                               accept=".png, .jpg, .jpeg">
                    </div>
                    <div class="col-lg-2">
                        <label for="capacity" class="form-label">Capacity</label>
                        <input class="form-control" min="0" type="number" id="capacity" name="capacity">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-lg-6">
                        <img src="#" id="item_preview" alt="" height=120rem class="mt-2">   <!--for preview purpose -->
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
