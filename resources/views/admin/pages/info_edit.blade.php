
@extends('admin.app')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/summernote-bs4.css')}}">
@endsection
@section('page')
{!!ucfirst(strtolower($info->info))!!}
@endsection
@section('main')

@if (session('msg'))
<div class="alert {!! session('type') !!} alert-dismissible fade show" role="alert">
    {!! session('msg') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form method="POST" action="{{route('update_info', ['info' => $info->info] )}}">
    @csrf
    @method('put')
    <div class="text-right">
        <button class="btn btn-info rounded-0 mb-3">SIMPAN</button>
    </div>
    <textarea class="textarea" name="body" placeholder="Place some text here"
    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
        {{$info->body}}
    </textarea>
</form>
    <p class="text-sm mb-0">
        Editor <a href="https://github.com/summernote/summernote">Documentation and license sinformation.</a>
    </p>
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