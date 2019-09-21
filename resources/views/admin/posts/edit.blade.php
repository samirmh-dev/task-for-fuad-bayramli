@extends('admin.layouts.app')

@section('content')

  <div class="page-container">
    <div class="main-content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header border bottom">
            <h4 class="card-title">Edit Post</h4>
          </div>
          <div class="card-body">
            <form class="form-horizontal form-label-left" action="{{ url('/admin/posts').'/'.$post->id.'/update' }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-sm-8 offset-sm-2">
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="category_id" class="control-label">Kateqoriyalar:</label>
                    </div>
                    <div class="col-md-9">
                      <select class="form-control" name="category_id" id="category_id">
                        <?php foreach ($categories as $key => $category): ?>
                          @if ($category->id == $post->category->id )
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                          @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endif
                        <?php endforeach; ?>
                      </select>
                      @if(!empty($errors->get('category_id')))
                        <ul class="alert-danger">
                          @foreach ($errors->get('category_id') as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="title" class="control-label">Postun başlığı:</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                      @if(!empty($errors->get('title')))
                        <ul class="alert-danger">
                          @foreach ($errors->get('title') as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="content" class="control-label">Məzmun:</label>
                    </div>
                    <div class="col-md-9">
                      <textarea name="content" rows="5" cols="80" class="form-control" id="editor1">{{$post->content}}</textarea>
                      @if(!empty($errors->get('content')))
                        <ul class="alert-danger">
                          @foreach ($errors->get('content') as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="status" class="control-label">Status:</label>
                    </div>
                    <div class="col-md-9">
                      <select class="form-control" name="status" id="status">
                        <option value="0" @if($post->status == 0) selected @endif>Deactive</option>
                          <option value="1" @if($post->status == 1) selected @endif>Active</option>
                          </select>
                          @if(!empty($errors->get('status')))
                            <ul class="alert-danger">
                              @foreach ($errors->get('status') as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-3">
                          <label for="img" class="control-label">Public:</label>
                        </div>
                        <div class="col-md-9 checkbox">
                            <input type="checkbox" id="checkbox_public" name="public" class="form-control" @if($post->public == 1) checked @else '' @endif>
                            <label for="checkbox_public">Everyone</label>
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
                </form>
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
