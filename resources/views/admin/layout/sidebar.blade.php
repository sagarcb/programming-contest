<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{route('profile.edit')}}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-exclamation-triangle"></i>
                        <p>
                            Notices
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('notices')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Notices List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('notices.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Notice</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-trophy"></i>
                        <p>
                            Contests
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('contests')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contests List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contest.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Contest</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Teams
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('teams')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Teams List</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    $(function() {
        // Get the current URL path
        var currentUrl = window.location.pathname;

        // Loop through each sidebar link
        $('.nav-sidebar .nav-link').each(function() {
            // Get the href attribute of the link
            try {
                var linkUrl = $(this).prop('href'); // Use prop() to get the full href
                var linkPath = new URL(linkUrl).pathname; // Extract the path from the full URL

                // Check if the current URL matches the sidebar link
                if (currentUrl === linkPath) {
                    // Add the "active" class to the parent li element
                    $(this).closest('.nav-treeview').parent().addClass('menu-open')
                    $(this).addClass('active');
                }
            }catch (e) {
            }

        });
    });
</script>
