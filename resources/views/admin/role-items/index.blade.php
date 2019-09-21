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
                    <h2 class="header-title">Role Items</h2>
                    <div class="app header-success-gradient">
                      <div class="layout">
                        <div class="header navbar  no-fixed">
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
                                  <input class="form-control" type="text" name="q" placeholder="Type to search...">
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
                                <th>Slug</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                            </tr>
                            </thead>
                            <tbody>
                              @if($role_items)
                                  @foreach($role_items as  $key => $role_item)
                                    <tr>
                                        <th scope="row">{{$role_item->id}}</th>
                                        <td>{{$role_item->name}}</td>
                                        <td><a href="#">{{$role_item->slug}}</a></td>
                                        <td>{{$role_item->created_at->diffForhumans()}}</td>
                                        <td>{{$role_item->updated_at->diffForhumans()}}</td>
                                    </tr>
                                @endforeach

                            @endif

                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-sm-6">
                              @if($role_items->total() == 0)
                                 0
                              @else
                                {{($role_items->currentpage()-1)*$role_items->perpage()+1}}
                              @endif
                               to {{(($role_items->currentpage()-1)*$role_items->perpage())+$role_items->count()}} of {{$role_items->total()}}
                            </div>
                            <div class="col-sm-6">
                              {{$role_items->render()}}
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
