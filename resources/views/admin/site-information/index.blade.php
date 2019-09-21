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
                    <h2 class="header-title">Site Information</h2>
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
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Privacy Policy</th>
                                <th>Main Email</th>
                                <th>Main Number</th>
                                <th>Address</th>
                                <th>Link</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                              @if($site_informations)
                                  @foreach($site_informations as $key => $site_information)
                                    <tr>
                                        <th scope="row">{{$site_information->id}}</th>
                                        <td><img src="{{ asset("/images/$site_information->logo") }}" style="height: 30px;" alt=""></td>
                                        <td>{{$site_information->name}}</td>
                                        <td>{!! str_limit($site_information->privacy_policy, 25) !!}</td>
                                        <td>{{$site_information->main_email}}</td>
                                        <td>{{$site_information->main_number}}</td>
                                        <td>{{$site_information->address}}</td>
                                        <td>{{$site_information->link}}</td>
                                        <td>{{$site_information->created_at->diffForhumans()}}</td>
                                        <td>{{$site_information->updated_at->diffForhumans()}}</td>
                                        <td><a href="{{ route('admin.site-information.edit', $site_information->id) }}"><i class="fa fa-eye"></i></a>
                                            {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminSiteInformationController@destroy', $site_information->id],'id' => 'data-item-form'.$site_information->id]) !!}
                                            <div class="form-group">
                                                <a href="javascript:void(0)" onclick="removeItem({{ $site_information->id }})"><i class="fa fa-trash"></i></a>
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
                              @if($site_informations->total() == 0)
                                 0
                              @else
                                {{($site_informations->currentpage()-1)*$site_informations->perpage()+1}}
                              @endif
                               to {{(($site_informations->currentpage()-1)*$site_informations->perpage())+$site_informations->count()}} of {{$site_informations->total()}}
                            </div>
                            <div class="col-sm-6">
                              {{$site_informations->render()}}
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
