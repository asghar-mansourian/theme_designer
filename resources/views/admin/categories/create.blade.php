@extends('admin.master')
@push('styles')
    <link rel="stylesheet" href="{{url('css/admin/category.css')}}">
@endpush
@section('content')
  <div class="app-title">
            @component('admin.components.content_title', ['title' => 'dashboard'])
                <p>A free and open source Bootstrap 4 admin template</p>
            @endcomponent
            @component('admin.components.breadcrumbs')
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            @endcomponent
</div>
<div class="container" id="containerAdmin">
     <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Vertical Form</h3>
            <div class="tile-body">
              <form>
                <div class="form-group">
                  <label class="control-label">نام دسته بندی</label>
                  <input class="form-control" v-model="title" type="text" name="name" placeholder="نام دسته بندی">
                </div>
                <div class="form-group">
                  <label class="control-label">پوزیشن</label>
                  <input class="form-control" type="number" placeholder="پوزیشن دسته بندی را وارد کنید.">
                </div>
                <div class="form-group">
                  <label class="control-label">Slug</label>
                  <input type="text" v-model="slug" name="slug" class="form-control">
                </div>
                  <div class="form-group">
                      <label class="control-label">نوع</label>
                      <select name="type">
                          @foreach(config('enums.category_type') as $type)
                              <option value="{{$type}}">{{$type}}</option>
                              @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="control-label">اولویت</label>
                      <input type="number" name="priority" class="form-control">
                  </div>
                <div class="form-group ">
                  <label class="control-label">تصویر</label>
                  <input class="form-control col-xl-3" @change="url" name="img" type="file">
                    <img :src="src" class="col-xl-9" v-show="src">
                </div>
                  <div class="tile-footer">
                      <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>

                  </div>
              </form>
            </div>

          </div>
        </div>
 </div>
</div>
@endsection
@push('scripts')
<script src="{{ url('js/admin/vue.dev.js')}}"></script>
<script src="{{ url('js/admin/admin.js')}}"></script>
@endpush
