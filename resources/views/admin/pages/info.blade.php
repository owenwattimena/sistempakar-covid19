@php
    // dd($tentang);
@endphp
@extends('admin.app')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/summernote-bs4.css')}}">
@endsection
@section('page', 'Info')
@section('main')


<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Info</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($info as $data)
                        <tr>
                            <th scope="row">#</th>
                            <td>{{$data->info}}</td>
                            <td>
                                <a href="{{route('edit_info', ['info' => strtolower($data->info)])}}" class="btn btn-sm btn-warning rounded-0">
                                   <i class="fa fa-edit"></i> | EDIT
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Tidak ada data!</td>
                        </tr>
                    @endforelse
                
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{asset('assets/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>
@endsection