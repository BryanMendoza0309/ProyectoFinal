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
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Opciones del Administrador</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{route('InsertProveedor.index') }}"><i class='fa fa-plus-square'></i><span>Proveedor</span></a></li>
            <li><a href="{{route('InsertProducto.index')}}"><i class='fa fa-industry'></i> <span>Productos</span></a></li>
            <li><a href="{{route('Categoria.index')}}"><i class='fa fa-certificate'></i> <span>Categoria</span></a></li>
            <li><a href="{{route('TablaProductos.index')}}" ><i class='fa fa-cubes'></i> <span>Prodctos en Venta</span></a></li>
            </li>
                   <li><a href="{{route('vistaContacto.index')}}"><i class='fa fa-link'></i> <span>Vista Contacto</span></a></li>
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
