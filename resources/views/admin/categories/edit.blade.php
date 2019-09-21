@extends('admin.layouts.app')
@section('content')

    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border bottom">
                        <h4 class="card-title">Edit Category</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($category, ['method'=>'PATCH', 'class'=>'form-horizontal form-label-left', 'action'=> ['Admin\AdminCategoryController@update', $category->id], 'files'=>true]) !!}
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
