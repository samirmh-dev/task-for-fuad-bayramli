<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Applicator - Admin Dashboard Template</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" href="{{ asset('backend/assets/images/logo/apple-touch-icon.html') }}">
  <link rel="shortcut icon" href="{{ asset('backend/assets/images/logo/favicon.png') }}">

  <!-- core dependcies css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/dist/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/vendor/PACE/themes/blue/pace-theme-minimal.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" />

  <!-- page css -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- core css -->
  <link href="{{ asset('backend/assets/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/themify-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/materialdesignicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/animate.min.css') }}" rel="stylesheet">

  @yield('customcss')
  <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}">
  <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div class="app header-success-gradient">
    <div class="layout">
      <!-- Header START -->
      <div class="header navbar">
        <div class="header-container">
          <div class="nav-logo">
            <a href="{{url('admin')}}">
              <div class="logo logo-dark" style="background-image: url({{ asset('backend/assets/images/logo/logo.png')}})"></div>
              <div>
                <a href="{{url('/admin')}}"> <h3 class="text-white text-center logo">Admin</h3></a>
              </div>
            </a>
          </div>
          <ul class="nav-left">
            <li>
              <a class="sidenav-fold-toggler" href="javascript:void(0);">
                <i class="mdi mdi-menu"></i>
              </a>
              <a class="sidenav-expand-toggler" href="javascript:void(0);">
                <i class="mdi mdi-menu"></i>
              </a>
            </li>
          </ul>
          <ul class="nav-right">
            <li class="user-profile dropdown dropdown-animated scale-left">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img class="profile-img img-fluid" src="{{ asset('/images').'/'.Auth::user()->img }}" alt="">
              </a>
              <ul class="dropdown-menu dropdown-md p-v-0">
                <li>
                  <ul class="list-media">
                    <li class="list-item p-15">
                      <div class="media-img">
                        <img src="{{ asset('/images').'/'.Auth::user()->img }}" alt="">
                      </div>
                      <div class="info">
                        <span class="title text-semibold">{{Auth::user()->name}}</span>
                        <span class="sub-title">{{Auth::user()->role->name}}</span>
                      </div>
                    </li>
                  </ul>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="{{url('logout')}}">
                    <i class="ti-power-off p-r-10"></i>
                    <span>Logout</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- Header END -->

      <!-- Side Nav START -->
      <div class="side-nav expand-lg">
        <div class="side-nav-inner">
          <ul class="side-nav-menu scrollable">
            <li class="side-nav-header">
              <span>Navigation</span>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="mdi mdi-gauge"></i>
                </span>
                <span class="title">Users</span>
                <span class="arrow">
                  <i class="mdi mdi-chevron-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('admin.users.index') }}">Users List</a></li>
                <li><a href="{{ route('admin.users.create') }}">Create User</a></li>
                <li><a href="{{ route('admin.roles.index') }}">Roles List</a></li>
                <li><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                <li><a href="{{ route('admin.role-items.index') }}">Role Items List</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="mdi mdi-image-filter-drama"></i>
                </span>
                <span class="title">Site Information</span>
                <span class="arrow">
                  <i class="mdi mdi-chevron-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('admin.site-information.index') }}">Site Information List</a></li>
                <li><a href="{{ route('admin.site-information.create') }}">Create Site Information</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="mdi mdi-compass-outline"></i>
                </span>
                <span class="title">Categories</span>
                <span class="arrow">
                  <i class="mdi mdi-chevron-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('admin.categories.index') }}">Category List</a></li>
                <li><a href="{{ route('admin.categories.create') }}">Create Category</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="mdi mdi-vector-arrange-above"></i>
                </span>
                <span class="title">Posts</span>
                <span class="arrow">
                  <i class="mdi mdi-chevron-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('admin.posts.index') }}">Post List</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="mdi mdi-vector-arrange-above"></i>
                </span>
                <span class="title">Tags</span>
                <span class="arrow">
                  <i class="mdi mdi-chevron-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('admin.tags.index') }}">Tag List</a></li>
                <li><a href="{{ route('admin.tags.create') }}">Create Tag</a></li>
              </ul>
            </li>
            {{-- <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="mdi mdi-image-filter-drama"></i>
                </span>
                <span class="title">Messages</span>
                <span class="arrow">
                  <i class="mdi mdi-chevron-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('admin.messages.index') }}">Message List</a></li>
              </ul>
            </li> --}}


          </ul>
        </div>
      </div>
      <!-- Side Nav END -->



      @yield('content')




    </div>
  </div>

  <script src="{{ asset('backend/assets/js/vendor.js') }}"></script>

  <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/dashboard/bank.js') }}"></script>
  <!-- page js -->
  @yield('customjs')
  <script src="{{ asset('backend/js/toastr.min.js') }}"></script>
  <script>
    @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
    @elseif (Session::has('error'))
      toastr.error("{{ Session::get('error') }}")
    @endif
  </script>
</body>


</html>
