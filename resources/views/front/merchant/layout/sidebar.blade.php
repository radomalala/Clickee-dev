<aside class="main-sidebar" style="margin-top: 19%;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <ul class="sidebar-menu">
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['']) }}">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Mon compte</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/product', 'fr/merchant/product/*']) }}">
                <a href="{!! route('product_merchant') !!}">
                    <i class="fa fa-files-o"></i> <span>Mes produits</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-qrcode"></i> <span>Codes promo</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-star-o"></i> <span>Promotion</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart"></i> <span>Statistiques</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Encaissement</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-power-off"></i> <span>Déconnexion</span>
                </a>
            </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>