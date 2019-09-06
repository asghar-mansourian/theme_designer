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
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>پوزیشن</th>
                            <th>رشته ی الصاق</th>
                            <th>نوع</th>
                            <th>اولویت</th>
                            <th>تصویر</th>
                        </tr>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{position_fetch($category->position)}}</td>
                            <td>{{$category->slug}}</td>

                            <td>{{$category->type}}</td>
                            <td>
                            </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
            </div>
          </div>
        </div>
 </div>
</div>
@endsection
@push('scripts')
<script src="{{ mix('js/admin/app.js')}}"></script>
@endpush
