@extends('layout.master')
@section('content')
    <div class="table-responsive">
        @if (@empty($files))
            <h1>No Images Present </h1>
        @else
            <table>
                @foreach ($files as $file)
                    <tr>
                        <td><h5 class="card-title" style="padding-right : 30%;">{{ $file['name'] }}</h5></td>
                    </tr>
                        @foreach ($file['itemdetails'] as $item)
                            <td>
                                <div class="card" style="width: 20em;">
                                    <img class="card-img-top" src="{{ asset('storage/techies/' . $item['filename']) }}"
                                        alt="Card image cap" onclick="window.open(this.src)">
                                    <div class="card-body">

                                        <a href="{{ Route('delete', $item['id']) }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        @endforeach
                @endforeach
            </table>

            {{-- <div>
                @foreach ($files as $file)
                    <h5 class="card-title" style="padding-right : 30%;">{{ $file['name'] }}</h5>
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="width :50%;">
                        <div class="carousel-inner ">
                            @foreach ($file['itemdetails'] as $item)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <div class="slider-image text-center">
                                        <img src="{{ asset('storage/techies/' . $item['filename']) }}" class="d-inline-block border text-center rounded" alt="image">
                                        <a href="{{ Route('delete', $item['id']) }}">Delete</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                    </div>
                @endforeach
            </div> --}}

            <div>
                @if (session()->has('message'))
                        @if (session()->get('message') == 'true')
                            <script>
                                swal("Great!", "Image Deleted Successfully!", "success");
                            </script>
                        @endif
                @endif
            </div>
        @endif
    </div>
@endsection
