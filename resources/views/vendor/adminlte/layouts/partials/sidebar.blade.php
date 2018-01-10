<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::user()->tipo_usuario }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->

        {{Form::open(array('method' => 'post',
    'url' => ['busqueda'],
    'class' => 'sidebar-form'))}}
           <div class="input-group">

                {!! Form::text('busqueda', null, ['class' => 'form-control','placeholder'=>trans('adminlte_lang::message.search')]) !!}
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        {{ Form::close() }}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            @if(Auth::getUser()->tipo_usuario=="ADMIN"||
            Auth::getUser()->tipo_usuario=="EDITOR")
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>               <a href="{{ url('admin/perfiles_biblioteca') }}">                <i class='fa fa-link'></i> <span>{{ trans('perfiles_biblioteca.perfiles_menu') }}</span></a></li>
                    <li>               <a href="{{ url('admin/usuario') }}">                <i class='fa fa-link'></i> <span>{{ trans('usuario.menu_usuario') }}</span></a></li>
                    <li>               <a href="{{ url('admin/usuario_perfiles') }}">                <i class='fa fa-link'></i> <span>{{ trans('usuario_perfiles.menu_Perfusuario') }}</span></a></li>
                    <li>               <a href="{{ url('fileentry') }}">                <i class='fa fa-link'></i> <span>{{ trans('todo.subirarchivos') }}</span></a></li>
                    <li>               <a href="{{ url('admin/archivos_perfiles') }}">                <i class='fa fa-link'></i> <span>{{ trans('archivos_perfiles.menu_titulo') }}</span></a></li>
                </ul>
            </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
