  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
              src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
          <div>
          <p class="app-sidebar__user-name">{{ auth()->user()->name}}</p>
              <p class="app-sidebar__user-designation">{{ auth()->user()->name}}</p>
          </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item active" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span
                      class="app-menu__label">داشبورد</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                      class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">مدیریت دسته بندی</span><i
                      class="treeview-indicator fa fa-angle-left"></i></a>
              <ul class="treeview-menu">
                  <li><a class="treeview-item" href="{{route('admin.categories.index')}}"><i class="icon fa fa-plus"></i>
                          ایجاد </a></li>
                  <li><a class="treeview-item" href="{{route('admin.categories.create')}}"
                          rel="noopener"><i class="icon fa fa-list-alt"></i>لیست</a></li>
                    </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                      class="app-menu__icon icon fa fa-newspaper-o"></i><span class="app-menu__label">مدیریت وبلاگ</span><i
                      class="treeview-indicator fa fa-angle-left"></i></a>
              <ul class="treeview-menu">
                  <li><a class="treeview-item" href="{{route('admin.blogs.create')}}"><i class="icon fa fa-plus"></i>
                          ایجاد</a></li>
                  <li><a class="treeview-item" href="{{route('admin.blogs.index')}}"><i class="icon fa fa-list-alt"></i>
                          لیست</a></li>
              </ul>
          </li>
          </li>
      </ul>
  </aside>
