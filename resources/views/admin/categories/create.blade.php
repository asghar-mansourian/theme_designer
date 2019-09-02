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
<div class="container" id="container-category">
     <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">ایجاد دسته بندی</h3>
            <div class="tile-body">
              <form>
                <div class="form-group">
                  <label class="control-label">نام دسته بندی</label>
                  <input class="form-control" v-model="name" type="text"  placeholder="نام دسته بندی">
                </div>
                <div class="form-group">
                    <label for="my-select">زیر دسته</label>
                    <categories @selectedcategoryid="getCategoryId" />
                </div>
                  <div class="form-group">
                          <label for="my-select">نوع منو</label>
                          <select id="my-select" class="form-control"  v-model="type">
                               @foreach(config('enums.category_types') as $type)
                              <option value="{{$type}}">{{$type}}</option>
                              @endforeach
                          </select>
                      </div>
                <div class="form-group">
                    <label for="">موقعیت</label>
                    <select class="form-control" v-model="position">
                        @foreach (get_all_category_positions() as $position)
                            <option value="{{ $position['code']  }}">{{ $position['description'] }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">رشته اصلاق منحصربفرد</label>
                  <input type="text" v-model="slug" name="slug" class="form-control">
                </div>
                <div class="form-group ">
                  <label class="control-label">تصویر</label>
                  <input class="form-control col-xl-3" @change="url" name="img" type="file">
                    <img :src="src" class="col-xl-9" v-show="src">
                </div>
                  <div class="tile-footer">
                      <button class="btn btn-primary" type="button" @click="store"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                        ثبت دسته</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#">
                            <i class="fa fa-fw fa-lg fa-times-circle"></i>برگشت به لیست دسته بندی ها</a>

                  </div>
              </form>
            </div>


          </div>
        </div>
 </div>
</div>
@endsection
@push('scripts')
<script src="{{ mix('js/admin/app.js')}}"></script>
@endpush
