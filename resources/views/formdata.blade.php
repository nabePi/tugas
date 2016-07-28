@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Change Role User</div>

                <div class="panel-body">
                  {{ Form::model($user, array('route' => array('data.update', $user->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form')) }}

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          {{ Form::label('name', 'Name', array('class' => 'col-md-4 control-label')) }}

                          <div class="col-md-6">
                              {{ Form::text('name', request()->old('name'), array('class' => 'form-control', 'disabled' => true)) }}

                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('is_admin') ? ' has-error' : '' }}">
                          {{ Form::label('is_admin', 'Role', array('class' => 'col-md-4 control-label')) }}

                          <div class="col-md-6">
                              {{ Form::select('is_admin', array('' => '-Select-','1' => 'Admin', '0' => 'User')) }}

                              @if ($errors->has('is_admin'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('is_admin') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>


                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <a href="{{ url('/data') }}" class="btn btn-sm btn-warning">Back</a>
                              &nbsp;&nbsp;&nbsp;
                              {{ Form::submit('Change', array('class' => 'btn btn-sm btn-primary')) }}
                          </div>
                      </div>
                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
