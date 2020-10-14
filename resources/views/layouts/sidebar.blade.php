<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a  href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">COMPONENTES</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#link" class="collapsed" aria-expanded="false">
                        <i class="fas fa-user-tie"></i>
                        <p>Usuarios</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="link" style="">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('user.index') }}">
                                    <span class="sub-item">Lista de Usuarios</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#sucursal" class="collapsed" aria-expanded="false">
                        <i class="fas fa-store-alt"></i>
                        <p>Sucursales</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sucursal" style="">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('sucursal.index') }}">
                                    <span class="sub-item">Lista de Sucursales</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
