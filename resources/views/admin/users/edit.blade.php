@extends('admin.layouts.app')
@section('content')

    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border bottom">
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($user, ['method'=>'PATCH', 'class'=>'form-horizontal form-label-left', 'action'=> ['Admin\AdminUserController@update', $user->id], 'files'=>true]) !!}
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3">
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('name', 'Name:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::text('name', null, ['class'=>'form-control'])!!}
                                    @if(!empty($errors->get('name')))
                                      <ul class="alert-danger">
                                        @foreach ($errors->get('name') as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                      </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('img', 'Image:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::file('img', null, ['class'=>'form-control'])!!}
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('email', 'Email:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::email('email', null, ['class'=>'form-control'])!!}
                                    @if(!empty($errors->get('email')))
                                        <ul class="alert-danger">
                                            @foreach ($errors->get('email') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('password', 'Password:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    <input type="password" name="password" class="form-control">
                                    @if(!empty($errors->get('password')))
                                        <ul class="alert-danger">
                                            @foreach ($errors->get('password') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('password_confirmation', 'Password Confirmation:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    <input type="password" name="password_confirmation" class="form-control">
                                    @if(!empty($errors->get('password_confirmation')))
                                        <ul class="alert-danger">
                                            @foreach ($errors->get('password_confirmation') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('role_id', 'Role:', ['class'=>'control-label']) !!}
                                  </diV>
                                  <div class="col-md-9">
                                    {!! Form::select('role_id', [''=>'Choose Roles'] + $roles, $user->role()->pluck('id'), ['class'=>'form-control'])!!}
                                    @if(!empty($errors->get('role_id')))
                                        <ul class="alert-danger">
                                            @foreach ($errors->get('role_id') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="text-sm-center">
                                        {!! Form::submit('Edit', ['class'=>'btn btn-gradient-success', 'id' => 'send']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>


            </div>
        </div>
    </div>
    </div>
    </div>

@endsection

@section('customjs')

@endsection
