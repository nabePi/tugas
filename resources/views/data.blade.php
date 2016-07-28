@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Data</div>

                <div class="panel-body">
                  @if(Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                  @endif

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <td>No</td>
                          <td>Name</td>
                          <td>Phone</td>
                          <td>Occupation</td>
                          <td>Email</td>
                          <td>Role</td>
                          <td colspan="2">Action</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td>1</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->occupation }}</td>
                            <td>{{ $user->email }}</td>
                            @if($user->is_admin)
                              <td>Admin</td>
                            @else
                              <td>User</td>
                            @endif
                            <td><a class="btn btn-sm btn-success" href="{{ URL::to('/data/' . $user->id . '/edit') }}">Change Role</a></td>
                            <td>
                              {{ Form::open(array('url' => '/data/' . $user->id)) }}
                              {{ Form::hidden('_method', 'DELETE') }}
                              {{ Form::submit('Delete', array('class' => 'btn btn-sm btn-danger')) }}
                              {{ Form::close() }}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
