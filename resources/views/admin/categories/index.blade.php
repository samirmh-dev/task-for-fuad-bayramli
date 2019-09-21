@extends('admin.layouts.app')
@section('customcss')
    <link href="{{ asset('backend/css/sweet-alert.css') }}" rel="stylesheet">
@endsection
@section('content')

    <!-- Content Wrapper START -->

    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="page-header">
                    <h2 class="header-title">Categories</h2>
                    <div class="app header-success-gradient">
                      <div class="layout">
                        <div class="header navbar no-fixed">
                          <div class="header-container">
                            <ul class="nav-left">
                              <li class="search-box">
                                <a class="search-toggle" href="javascript:void(0);">
                                  <i class="search-icon mdi mdi-magnify"></i>
                                  <i class="search-icon-close mdi mdi-close-circle-outline"></i>
                                </a>
                              </li>
                              <li class="search-input">
                                <form method="get">
                                  <input class="form-control" type="text" name="q" placeholder="Axtarın...">
                                  <button class="btn btn-default d-none" type="submit"></button>
                                </form>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                              @if($categories)
                                  @foreach($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{$category->id}}</th>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at->diffForhumans()}}</td>
                                        <td>{{$category->updated_at->diffForhumans()}}</td>
                                        <td><a href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-eye"></i></a>
                                            {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminCategoryController@destroy', $category->id],'id' => 'data-item-form'.$category->id]) !!}
                                            <div class="form-group">
                                                <a href="javascript:void(0)" onclick="removeItem({{ $category->id }})"><i class="fa fa-trash"></i></a>
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach

                            @endif

                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-sm-6">
                              @if($categories->total() == 0)
                                 0
                              @else
                                {{($categories->currentpage()-1)*$categories->perpage()+1}}
                              @endif
                               to {{(($categories->currentpage()-1)*$categories->perpage())+$categories->count()}} of {{$categories->total()}}
                            </div>
                            <div class="col-sm-6">
                              {{$categories->render()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->

@endsection


@section('customjs')
    <script src="{{ asset('backend/js/sweet-alert.js') }}"></script>

    <script>

        function removeItem($id) {

            swal({
                    title: "Are you sure",
                    text: "You will be able to recover this data!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, sure",
                    cancelButtonText: "No, cancel",
                    allowOutsideClick: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $('#data-item-form' + $id).submit();
                    }
                });
        }
    </script>
@endsection
