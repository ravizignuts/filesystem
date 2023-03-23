@extends('layout.master')
@section('content')
    {{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

    <div class="container" style="margin-top: 4%;">
        <h2>Laravel Multiple File Uploading</h2>
        <br>
        <div class="row">
            <div class="col-md-6">
                <form action="/multiuploads" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="Product Name">Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Product Name" value = {{ old('name') }}>
                        @error('name')
                            <div class="error alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="Product Name">Product photos (can attach more than one):</label><br>
                    <input type="file" class="form-control" name="photos[]" multiple/>
                    @error('photos')
                        <div class="error alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br /><br />

                    <button type="submit" class="btn btn-primary " value="Upload">Upload</button>
                    <a href="{{ Route('home') }}" class="btn btn-primary">Home</a>
                </form>

            </div>
        </div>
        @if (session()->has('message'))
            @if (session()->get('message') == 'true')
                <script>
                    swal("Good Job!", "Item Uploaded Successfully!", "success");
                </script>
            @else
                <script>
                    swal("Ohh No!", "Sorry Only Upload jpg, png, pdf, docx", "error");
                </script>
            @endif
        @endif
    </div>

@endsection
