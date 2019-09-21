@extends('admin.layouts.app')
@section('content')

    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border bottom">
                        <h4 class="card-title">Edit Site Information</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($site_information, ['method'=>'PATCH', 'class'=>'form-horizontal form-label-left', 'action'=> ['Admin\AdminSiteInformationController@update', $site_information->id], 'files'=>true]) !!}
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
                                    {!! Form::label('logo', 'Logo:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::file('logo', null, ['class'=>'form-control'])!!}
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('main_email', 'Main Email:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::email('main_email', null, ['class'=>'form-control'])!!}
                                    @if(!empty($errors->get('main_email')))
                                        <ul class="alert-danger">
                                            @foreach ($errors->get('main_email') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('main_number', 'Main Number:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::text('main_number', null, ['class'=>'form-control'])!!}
                                    @if(!empty($errors->get('main_number')))
                                      <ul class="alert-danger">
                                        @foreach ($errors->get('main_number') as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                      </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('address', 'Address:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::text('address', null, ['class'=>'form-control'])!!}
                                    @if(!empty($errors->get('address')))
                                      <ul class="alert-danger">
                                        @foreach ($errors->get('address') as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                      </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('link', 'Link:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::text('link', null, ['class'=>'form-control'])!!}
                                    @if(!empty($errors->get('link')))
                                      <ul class="alert-danger">
                                        @foreach ($errors->get('link') as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                      </ul>
                                    @endif
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-3">
                                    {!! Form::label('privacy_policy', 'Privacy Policy:', ['class'=>'control-label']) !!}
                                  </div>
                                  <div class="col-md-9">
                                    {!! Form::textarea('privacy_policy', null, ['class'=>'form-control', 'id' => 'editor1'])!!}
                                    @if(!empty($errors->get('privacy_policy')))
                                      <ul class="alert-danger">
                                        @foreach ($errors->get('privacy_policy') as $error)
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
<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>

@endsection
