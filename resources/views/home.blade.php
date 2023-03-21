@extends('layout.master')
@section('content')
    {{-- @dd($files) --}}
    <div class="table-responsive">
        <table
            class="table table-striped
        table-hover
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <tr>
                    <th>IMAGES</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($files as $file)
                    <tr>
                        <td>
                            {{ $file['name'] }}
                        </td>
                    </tr>
                    @foreach ($file['itemdetails'] as $item)
                        <tr class="table-primary">
                            <td>
                                <img src={{ asset('storage/techies/' . $item['filename']) }} alt="Image" width="1200"
                                    height="600" style="border:1px solid black">
                            </td>
                            <td>
                                <a href="{{ Route('delete',$item['id']) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        @if (session()->has('message'))
            @if (session()->get('message') == 'true')
                <script>
                    swal("Great!", "Image Deleted Successfully!", "success");
                </script>
            @endif
        @endif
    </div>
@endsection
