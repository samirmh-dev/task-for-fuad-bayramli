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
          <h2 class="header-title">Posts</h2>

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
                        <input class="form-control" type="text" id="search" name="q" placeholder="Axtarın...">
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
            <div class="form-group col-md-3">
              <button type="button" onclick="deletePosts();"class="form-control btn-gradient-danger text-white">Seçilmişləri Sil</button>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>
                    <div class="col-md-9 checkbox">
                      <input type="checkbox" id="options" name="checkbox" class="form-control">
                      <label for="options"></label>
                    </div>
                  </th>
                  <th scope="col">#</th>
                  <th>Title</th>
                  <th>User</th>
                  <th>Category</th>
                  <th>Public</th>
                  <th>Status</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @if($posts)
                  @foreach($posts as $key => $post)
                    <tr id="tr_{{$post->id}}">
                      <td>
                        <div class="col-md-9 checkbox">
                          <input type="checkbox" id="c_{{$post->id}}"  class="form-control checkBoxes" value="{{$post->id}}">
                          <label for="c_{{$post->id}}"></label>
                        </div>
                      </td>
                      <th scope="row">{{$post->id}}</th>
                      <td><a href="{{ url('/post').'/'.$post->id }}" target="_blank">{{$post->title}}</a></td>
                      <td><a href="{{ !empty($post->user->name) ? url('/user').'/'.$post->user->id.'/posts' : url('#') }}">
                        {{$post->user->name ?? '-'}}
                      </a>
                    </td>
                    <td><a href="{{url('/').'/'.$post->category->slug.'/posts'}}">
                      {{ $post->category->name }}
                    </a>
                  </td>
                  <td>@if($post->public==1) Everyone @else Only Registered Users @endif</td>
                  <td><button class="btn @if($post->status==1)
                    btn-gradient-success
                  @elseif($post->status==2)
                    btn-gradient-warning
                  @else btn-gradient-danger @endif" id="status_{{$post->id}}" onclick="changeStatus({{ $post->id }})">
                    @if($post->status==1) Aktiv @elseif($post->status==2) Təsdiq gözləyir @else Deaktiv @endif
                    </button>
                  </td>
                  <td>{{$post->created_at->diffForhumans()}}</td>
                  <td>{{$post->updated_at->diffForhumans()}}</td>
                  <td><a href="{{ route('admin.posts.edit', $post->id) }}"><i class="fa fa-eye"></i></a>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminPostController@destroy', $post->id],'id' => 'data-item-form'.$post->id]) !!}
                    <div class="form-group">
                      <a href="javascript:void(0)" onclick="removeItem({{ $post->id }})"><i class="fa fa-trash"></i></a>
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
            @if($posts->total() == 0)
               0
            @else
              {{($posts->currentpage()-1)*$posts->perpage()+1}}
            @endif
             to {{(($posts->currentpage()-1)*$posts->perpage())+$posts->count()}} of {{$posts->total()}}
          </div>
          <div class="col-sm-6">
            {{$posts->render()}}
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

  <script>
  $(document).ready(function(){
    $("#options").click(function(){
      if(this.checked){
        $(".checkBoxes").each(function(){
          this.checked = true;
        });
      }else{
        $(".checkBoxes").each(function(){
          this.checked = false;
        });
      }
    })
  })

  function deletePosts(){
    var posts = [];
    $(".checkBoxes").each(function(){
      if(this.checked){
        var post_id= $(this).val();
        posts.push(post_id);
      }
    });

    if(posts === undefined || posts.length == 0){
      alert("Zəhmət olmasa seçin");
    }else{
      if (confirm('Silinsin?')){
        $.ajax({
          url:'{{ url('/delete/posts')}}',
          method:'POST',
          data: {s_id: posts,
            "_token": "{{ csrf_token() }}"
          },
          success:function(response){
            if(response == "success"){
              $.each(posts, function( index, value ) {
                $("#tr_"+value).fadeOut();
              });
            }else{
              alert("Silinmədi!")
            }
          }
        });
      } //confirm end
    }
  }
  </script>
  <script>
  function changeStatus(id){
    $.ajax({
      type: 'GET',
      url: '{{ url('/admin/posts/status') }}/'+id,
      dataType: 'json',
      success: function (data) {
        if (data.status == 1) {
          $('#status_'+data.id).text(
            'Aktiv'
          ).attr('class', 'btn btn-success');
        }else {
          $('#status_'+data.id).text(
            'Deaktiv'
          ).attr('class', 'btn btn-danger');
        };
      }
    });
  }
  </script>
@endsection
