@extends($layout)

{{-- Page content --}}
@section('content')

<div class="page-header">
    <h1>Search Players</h1>
</div>

<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h3 class="panel-title">
            <big>Options</big>
        </h3>
    </div>

    <div class="panel-body">
        <form class="form-horizontal" role="form" method="get">
            <div class="form-group">
                <label for="userId" class="col-sm-2 control-label">Player ID</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon">#</span>
                        <input type="text" name="id" class="form-control" id="userId" value="{{{ Input::get('id') }}}" placeholder="Player ID" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="displayName" class="col-sm-2 control-label">Display Name</label>
                <div class="col-sm-10">
                    <input type="text" name="display_name" class="form-control" id="displayName" value="{{{ Input::get('display_name') }}}" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                    <button type="submit" name="search" value="users" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

@if( ! is_null($results))
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-xs-2">ID</th>
            <th>Profile</th>
            <th class="col-xs-2">Online?</th>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td><a href="{{ route('user/profile', $user->id) }}">{{{ $user->display_name }}}</a></td>
            <td>{{ $user->isOnline() ? 'Yes' : 'No' }}</td>
        </tr>
        @endforeach

        @if( ! count($results))
        <tr>
            <td colspan="3">No results found</td>
        </tr>
        @endif
    </tbody>
</table>

{{ $results->appends(array_except(Input::all(), 'page'))->links() }}
@endif

@stop
