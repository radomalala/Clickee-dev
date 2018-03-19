<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <ul class="sidebar-menu">
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/dashboard','fr/merchant/dashboard/*']) }}">
                <a href="{!! URL::to('/fr/merchant/dashboard') !!}">
                    <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            @foreach(Auth::user()->store as $index=>$stor)
            <li class="treeview {{ set_active(['fr/store','fr/store/*']) }}">
                <a href="{!! URL::to('/fr/store/'.$stor->store_id.'/edit') !!}">
                    <i class="fa fa-user"></i> <span>Mon compte</span>
                </a>
            </li>
            @endforeach
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/product', 'fr/merchant/product/*']) }}">
                <a href="{!! route('product_merchant') !!}">
                    <i class="fa fa-files-o"></i> <span>Mes produits</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/code_promo', 'fr/merchant/code_promo/*']) }}">
                <a href="{!! URL::to('/fr/merchant/code_promo') !!}">
                    <i class="fa fa-qrcode"></i> <span>Codes promo</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/promotion', 'fr/merchant/promotion/*']) }}">
                <a href="{!! URL::to('/fr/merchant/promotion') !!}">
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
            <li class="treeview {{ set_active(['fr/merchant/encasement', 'fr/merchant/customer/*', 'fr/merchant/customer']) }}">
                <a href="{!! route('encasement') !!}">
                    <i class="fa fa-money"></i> <span>Encaissement</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview">
                <a href="{!! url(LaravelLocalization::getCurrentLocale().'/logout') !!}">
                    <i class="fa fa-power-off"></i> <span>Déconnexion</span>
                </a>
            </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>