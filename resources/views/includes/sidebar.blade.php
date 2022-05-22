@section('sidebar-style')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel='stylesheet' href="{{asset('https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css')}}">
    <script src="{{asset('https://kit.fontawesome.com/a076d05399.js')}}" crossorigin="anonymous"></script>
@show
@section('sidebar')

    <div class="sidebar close">
        <div class="logo-details">
            <i class="bx"></i>
            <span class="logo_name">Ghyari</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{route('showAdminIndex')}}">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{route('showAdminIndex')}}">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{route('showAdminItems')}}">
                        <i class="bx bx-collection"></i>
                        <span class="link_name">All Items</span>
                    </a>
                    <i class="bx bxs-chevron-down arrow"></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{route('showAdminItems')}}">All Items</a></li>
                    <li><a href="{{route('showAddItem')}}">Add Items</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{route('showAdminOrders')}}">
                        <i class="bx bx-book-alt"></i>
                        <span class="link_name">All Orders</span>
                    </a>
                    <i class="bx bxs-chevron-down arrow"></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{route('showAdminOrders')}}">All Orders</a></li>
                    {{-- <li><a href="{{route('showAddItem')}}">Sent Orders</a></li> --}}
                </ul>
            </li>
            <li>
                <a href="{{route('showDisableAccount')}}">
                    <i class="bx bx-pie-chart-alt-2"></i>
                    <span class="link_name">Users Accounts</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{route('showDisableAccount')}}">Users Accounts</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('showNotification')}}">
                    <i class='bx bx-compass' ></i>
                    <span class="link_name">Send Notification</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{route('showNotification')}}">Send Notification</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('showEditAdminInformation')}}">
                    <i class="bx bx-history"></i>
                    <span class="link_name">Profile</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{route('showEditAdminInformation')}}">Profile</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../image/ghyari.png" />
                    </div>
                    <div class="name-job">
                        <div class="profile_name">Usename</div>
                        <div class="job">Admin</div>
                    </div>
                    <a href="{{route('logout')}}"><i class="bx bx-log-out"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class="bx bx-menu"></i>
            <span class="text"> Sidebar</span>
        </div>
    </section>

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>

@show
