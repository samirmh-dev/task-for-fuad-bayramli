@extends('admin.layouts.app')
@section('content')

<!-- Page Container START -->
<div class="page-container">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-between">
        <div class="col-sm-2">
          <div class="card">
            <div class="card-body">
              <div class="media justify-content-between">
                  <a href="{{ route('admin.users.index') }}">
                    <p class="">Total Users</p>
                    <h2 class="font-size-28 font-weight-light">{{ \App\User::all()->count() }}</h2>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card">
              <div class="card-body">
                <div class="media justify-content-between">
                  <div>
                    <a href="{{ route('admin.posts.index') }}">
                      <p class="">Total Posts</p>
                      <h2 class="font-size-28 font-weight-light">{{ \App\Post::all()->count() }}</h2>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card">
              <div class="card-body">
                <div class="media justify-content-between">
                  <div>
                    <a href="{{ route('admin.categories.index') }}">
                      <p class="">Total Categories</p>
                      <h2 class="font-size-28 font-weight-light">{{ \App\Category::all()->count() }}</h2>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      {{-- <div class="col-sm-2">
            <div class="card">
              <div class="card-body">
                <div class="media justify-content-between">
                  <div>
                    <a href="{{ route('admin.cities.index') }}">
                      <p class="">Total Cities</p>
                      <h2 class="font-size-28 font-weight-light">{{ \App\City::all()->count() }}</h2>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card">
              <div class="card-body">
                <div class="media justify-content-between">
                  <div>
                    <a href="{{ route('admin.categories.index') }}">
                      <p class="">Total Categories</p>
                      <h2 class="font-size-28 font-weight-light">{{ \App\Category::all()->count() }}</h2>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card">
              <div class="card-body">
                <div class="media justify-content-between">
                  <div>
                    <a href="{{ route('admin.sub-categories.index') }}">
                      <p class="">Total Sub Categories</p>
                      <h2 class="font-size-28 font-weight-light">{{ \App\SubCategory::all()->count() }}</h2>
                    </a>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Footer START -->
  <footer class="content-footer">
    <div class="footer">
      <div class="copyright">
        <span>Copyright © 2018 <b class="text-dark">Theme_Nate</b>. All rights reserved.</span>
        <span class="go-right">
          <a href="#" class="text-gray m-r-15">Term &amp; Conditions</a>
          <a href="#" class="text-gray">Privacy &amp; Policy</a>
        </span>
      </div>
    </div>
  </footer>
  <!-- Footer END -->

</div>
<!-- Page Container END -->




@endsection
