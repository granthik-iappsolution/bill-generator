@php
    $configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    @if(!isset($navbarFull))
        <div class="app-brand demo">
            <a href="{{url('/')}}" class="app-brand-link flex-row">
        <span class="app-brand-logo demo">
            <img src="{{asset('img.png')}}" alt="" width="45">
        </span>
                <span class="nav-link" style="font-family: 'Poppins', sans-serif; color:black; font-size: 15px; letter-spacing: -1px; margin-left: 8px;">CODIKSH</span>

            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

    @endif

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {!! (new \App\Http\Controllers\Admin\SideBarMenuController())->getSidebar() !!}
    </ul>

</aside>
@push('stackedScripts')
    <script>
        $(document).ready(function () {
            //Add active/menu-opne to the parent of current active element
            let a = $('a.menu-link.active');
            $(a[0]).parents().parent().parent().addClass('active open');
            $(a[0]).parents().parent().prev().addClass('active');

            //Remove empty route group
            $('ul.nav.nav-treeview').each(function () {
                if ($(this).find('li').length === 0) {
                    $(this).parent().remove();
                }
            });

            //Remove header which has not any routes/route group
            $('li.menu-header').each(function () {
                if (!$(this).next().hasClass('menu-item')) {
                    $(this).remove();
                }
            });
        });
    </script>
@endpush

