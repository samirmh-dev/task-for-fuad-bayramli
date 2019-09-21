@extends('admin.layouts.app')
@section('content')

    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border bottom">
                        <h4 class="card-title">Create Roles</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['method'=>'POST', 'class'=>'form-horizontal form-label-left', 'action'=> 'Admin\AdminRoleController@store', 'files'=>true]) !!}
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
                                  {!! Form::label('slug', 'Slug:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::text('slug', null, ['class'=>'form-control'])!!}
                                    @if(!empty($errors->get('slug')))
                                    <ul class="alert-danger">
                                      @foreach ($errors->get('slug') as $error)
                                      <li>{{ $error }}</li>
                                      @endforeach
                                    </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('role_items', 'Permissions:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::select('role_items[]', $role_items, null, ['class'=>'form-control', 'multiple'])!!}
                                    @if(!empty($errors->get('role_items')))
                                        <ul class="alert-danger">
                                            @foreach ($errors->get('role_items') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="text-sm-center">
                                        {!! Form::submit('Create', ['class'=>'btn btn-gradient-success', 'id' => 'send']) !!}
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


@endsection

@section('customjs')
    <script src="{{ asset('backend/js/slugify.js') }}"></script>


    <script>
        var post_name = $("#name");
        var post_slug_d = $("#slug");
        post_name.keyup(function () {
            str = post_name.val();
            post_slug_d.val(url_slug(str));

        });

    </script>


@endsection
