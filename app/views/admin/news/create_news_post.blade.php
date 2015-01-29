@extends($layout)

{{-- Page content --}}
@section('content')

<div class="page-header">
    <h1>New News Post</h1>
</div>

<form class="form-horizontal" role="form" method="post" action="{{ route('admin/news/post/create') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <div class="form-group">
        <label for="cp-newspost-title" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="cp-newspost-title" value="{{{ Input::old('title') }}}" required />
        </div>
    </div>

    <div class="form-group">
        <label for="cp-newspost-body" class="col-sm-2 control-label">Body</label>
        <div class="col-sm-10">
            <textarea rows="10" name="body" class="form-control" id="cp-newspost-body" required>{{{ Input::old('body') }}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2 text-right">
            <button type="submit" name="create_news_post" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>

@stop
