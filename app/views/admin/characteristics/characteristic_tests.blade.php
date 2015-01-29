@extends($layout)

{{-- Page content --}}
@section('content')

<div class="page-header">
    <h1>Existing Characteristic Tests</h1>
</div>

<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h3 class="panel-title">
            <big>Search Options</big>
        </h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="get" id="search-characteristictests">
            <div class="form-group">
                <label for="search-characteristictests-id" class="col-sm-2 control-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" name="id" class="form-control" id="search-characteristictests-id" value="{{{ Input::get('id') }}}" />
                </div>
            </div>

            <div class="form-group">
                <label for="search-characteristictests-name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="search-characteristictests-name" value="{{{ Input::get('name') }}}" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                    <button type="submit" name="search" value="characteristic_tests" data-loading-text="<i class='fa fa-cog fa-spin'></i> Searching..." class="btn btn-primary btn-loading">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{ $characteristicTests->appends(array_except(Input::all(), 'page'))->links() }}

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Characteristics</th>
            <th>Active?</th>
        </tr>
    </thead>
    <tbody>
        @foreach($characteristicTests as $characteristicTest)
        <tr>
            <td><a href="{{ route('admin/characteristics/test/edit', $characteristicTest->id) }}">{{ $characteristicTest->id }}</a></td>
            <td><a href="{{ route('admin/characteristics/test/edit', $characteristicTest->id) }}">{{ $characteristicTest->name }}</a></td>
            <td><a href="{{ route('admin/characteristics/characteristic/edit', $characteristicTest->characteristic->id) }}">{{ $characteristicTest->characteristic->name }}</a></td>
            <td>{{ $characteristicTest->isActive() ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' }}</td>
        </tr>
        @endforeach()

        @if($characteristicTests->isEmpty())
        <tr>
            <td colspan="3">No characteristic tests to display.</td>
        </tr>
        @endif
    </tbody>
</table>

{{ $characteristicTests->appends(array_except(Input::all(), 'page'))->links() }}

@stop
