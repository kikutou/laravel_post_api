@extends("layouts.app")

@section("title", "サイトの新規作成")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-6 col-ml-12">
      <div class="row top">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">サイトの新規作成</h3>
              <!-- form start -->
              <form action="{{route('post_site_add')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="nameinput" class="col-form-label">Name</label>
                  <input class="form-control" id="nameinput" type="text" name="name" value="{{old('name')}}">
                  @if($errors->has('name'))
                    <p>{{ $errors->first('name') }}</p>
                  @endif
                </div>
                <div class="form-group">
                    <label for="inputurl" class="">URL</label>
                    <input type="text" id="inputurl" class="form-control" value="{{old('url')}}" name="url">
                    @if($errors->has('url'))
                      <p>{{ $errors->first('url') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputpassword" class="">Password</label>
                    <input type="password" id="inputpassword" class="form-control" value="{{old('password')}}" name="password">
                    @if($errors->has('password'))
                      <p>{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <!-- button -->
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                      <input class="btn btn-rounded btn-primary mb-3" type="submit" value="Submit">
                    </div>
                    <div class="col-md-auto">
                    </div>
                    <div class="col col-lg-2">
                      <input type="reset" class="btn btn-rounded btn-danger mb-3" value="Reset">
                    </div>

                </div>
              </form>
              <!-- form end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
