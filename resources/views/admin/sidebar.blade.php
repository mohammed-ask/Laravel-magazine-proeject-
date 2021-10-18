<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

        <li>
            <a href="{{url('/admin')}}"  class="<?= $pagetitle == 'Dashboard' ? 'active-link': '' ;?>"><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
        </li>

        <li>
            <a href="{{url('/admin/posts')}} " class="<?= $pagetitle == 'Posts' ? 'active-link': '' ;?>"><i class="fa fa-table "></i>Posts <span class="badge">Included</span></a>
        </li>
        <li >
            <a href="{{url('/admin/categories')}}" class="<?= $pagetitle == 'Categories' ? 'active-link': '' ;?>"><i class="fa fa-edit "></i>Catagories <span class="badge">Included</span></a>
        </li>

        <li>
            <a href="{{url('/admin/users')}}" class="<?= $pagetitle == 'Users' ? 'active-link': '' ;?>"><i class="fa fa-qrcode "></i>Users</a>
        </li>
       
    </ul>
                </div>

</nav>
<!-- /. NAV SIDE  -->