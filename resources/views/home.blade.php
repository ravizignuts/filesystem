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
                @if (session()->has('message'))
                    @if (session()->get('message') == 'true')
                        <script>
                            swal("Great!", "Image Deleted Successfully!", "success");
                        </script>
                    @endif
                @endif
        @endif
    </div>
@endsection
