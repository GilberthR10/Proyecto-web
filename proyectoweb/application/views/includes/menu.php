 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url("home/")?>">Sg clientes 1-0</a>
            </div>
            <!-- /.navbar-header -->
  <ul class="nav navbar-top-links navbar-right">
      
   <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
    <?php if (isset($nombreusuario)) {?>
    
                    <ul class="dropdown-menu dropdown-user">
                        <li><?php if (isset($nombreusuario)) echo $nombreusuario;?>
                        </li>
                        <li><a href="<?php echo site_url("usuarios/modificar/".$idusuario)?>"><i class="fa fa-user fa-fw"></i> Editar perfil</a>
                        </li>
                           <li class="divider"></li>
                        <li><a href="<?php echo site_url("salir/")?>"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
        <?php } ?>     
                    <!-- /.dropdown-user -->
                </li>
      
      
      
            </ul>
     
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo site_url("home/")?>"><i class="fa fa-dashboard fa-fw"></i> Principal</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Maestros<span class="fa arrow"></span></a>
                            
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("usuarios/")?>">Usuarios</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("clientes/")?>">Clientes</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("productos/")?>">Productos</a>
                                    
                                </li>
                                <li>
                                    <a href="<?php echo site_url("categorias/")?>">Categorias de Productos</a>
                                    
                                </li>
                                <li>
                                    <a href="<?php echo site_url("proveedores/")?>">Proveedores</a>
                                    
                                </li>
                                
                                 <li>
                                    <a href="<?php echo site_url("preguntas/")?>">Preguntas Frecuentes</a>
                                    
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                     
                        <li>
                            <a href="<?php echo site_url("pedidos/")?>"><i class="fa fa-edit fa-fw"></i> Pedidos</a>
                        </li>

                         <li>
                            <a href="<?php echo site_url("soporte/")?>"><i class="fa fa-bar-chart-o fa-fw"></i>Soportes de usuarios</a>
                        </li>
                     
                    </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
      