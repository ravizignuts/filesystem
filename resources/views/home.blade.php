@extends('layout.master')
@section('content'  )
    {{-- @dd($files) --}}
    <div class="table-responsive">
        <table class="table table-striped
        table-hover
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>ITEMS ID</th>
                    <th>IMAGES</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($files as $file )
                    {{-- @dd($file->filename) --}}
                    {{-- @dd(storage_path()) --}}
                    @dd(asset('storage'))
                        <tr class="table-primary">
                            <td>{{ $file->id }}</td>
                            <td>{{ $file->item_id }}</td>
                            <td><img src="{{ asset('storage/app/'.$file->filename) }}"></td>
                            {{-- <td><img src="{{ storage_path().'/app/'.$file->filename  }}"></td> --}}
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
        </table>
    </div>

@endsection
