<!-- -------------- Sidebar - Author -------------- -->
<!--<div class="sidebar-widget author-widget">
    <div class="media">
        <a href="/profile" class="media-left">
            @if(isset(Auth::user()->employee->photo))

              <img src="{{asset('photos/'.Auth::user()->employee->photo)}}" width="40px" height="30px" class="img-responsive">
             <img src="/assets/img/HRMS.png" width="40px" height="30px" class="img-responsive">
            @else
                <img src="/assets/img/avatars/profile_pic.png" class="img-responsive">
            @endif

        </a>

        <div class="media-body">
            <div class="media-author"><a href="/profile">{{Auth::user()->name}}</a></div>
        </div>
    </div>
</div>-->

<!-- -------------- Sidebar Menu  -------------- -->

<div id="sidebar-menu" class="show">
    <ul id="side-menu">
        <li class="menuitem-active">
            <a href="{{route('dashboard')}}" class="active">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                <span> Dashboard </span><span class="menu-arrow"></span>
            </a>
        </li>             
        @if(\Auth::user()->isAdm())
        <li>
            <a href="#zone" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                <i class="fe-globe"></i>
                <span> Zones  </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="zone" style="">
                <ul class="nav-second-level">
                    <li> <a href="/zone-list">Zones list</a></li>                   
                    <li> <a href="/add-zone">Add list</a> </li>    
                </ul>
            </div>
        </li>
      
        <li>
            <a href="#city" data-bs-toggle="collapse">
                <i class="fe-map-pin"></i>
                <span> Cities </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="city">
                <ul class="nav-second-level">
                    <li> <a href="/city-list">Cities list</a> </li>
                    <li> <a href="/add-city">Add cities</a> </li>

                </ul>
            </div>
        </li>
        <li>
            <a href="#unit" data-bs-toggle="collapse">
                <i class="fe-map-pin"></i>
                <span> Units </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="unit">
                <ul class="nav-second-level">
                    <li><a href="/unit-list">unit list</a></li>
                    <li> <a href="/add-unit">Add unit</a></li>
                </ul>
            </div>
        </li>
        
        <li>
            <a href="#manager" data-bs-toggle="collapse">
                <i class="fe-user"></i>
                <span>Managers </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="manager">
                <ul class="nav-second-level">                   
                    <li>  <a href="{{route('emp-list')}}">Managers list</a></li>
                    <li><a href="{{route('add-emp')}}">Add Managers</a> </li>
                </ul>
            </div>
        </li>
        @endif
        @if(\Auth::user()->isManager() || \Auth::user()->isAdm())
        <li>
            <a href="#user" data-bs-toggle="collapse">
                <i class="fe-users"></i>
                <span>Employees</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="user">
                <ul class="nav-second-level">                   
                    <li> <a href="{{route('user-list')}}">Employees list</a> </li>
                    <li><a href="{{route('add-user')}}">Add Employees</a></li>
                </ul>
            </div>
        </li>
        @endif

        @if(\Auth::user()->isAdm())
        <li>
            <a href="#admin" data-bs-toggle="collapse">
                <i class="fe-database"></i> <span> Admin</span><span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="admin">
                <ul class="nav-second-level">            
                    <li> <a href="{{route('admin-list')}}">Admin list</a> </li>
                    <li> <a href="{{route('add-admin')}}">Add Admin</a> </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#roleinfo" data-bs-toggle="collapse">
                <i class="fe-crop"></i>
                <span> Role </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="roleinfo">
                <ul class="nav-second-level">                  
                    <li> <a href="{{route('role-list')}}">Role Listings</a></li>
                    <li> <a href="{{route('add-role')}}">Add Role</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#siteinfo" data-bs-toggle="collapse">
                <i class="fe-settings"></i>
                <span> Setting </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="siteinfo">
                <ul class="nav-second-level">
                    <li> <a href="/view-siteinfo/1">Site Information</a></li>

                </ul>
            </div>
        </li>
       @endif

       @if(\Auth::user()->isHR())
        <li>
            <a href="#user" data-bs-toggle="collapse">
                <i class="fe-users"></i>
                <span>Check Quality </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="user">
                <ul class="nav-second-level">                   
                    <li> <a href="{{route('report-listing')}}">Check Quality list</a> </li>
                   
                </ul>
            </div>
        </li>
        @endif

        <li> <a href="/logout"> <i class="fe-log-out"></i> <span> Logout </span> </a> </li>

    </ul>

</div>

 <!-- 
<ul class="nav sidebar-menu scrollable">
    <li class="active">
        <a  href="{{route('dashboard')}}">
            <span class="fa fa-dashboard"></span>
            <span class="sidebar-title">Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">User</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-employee')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add user </a>
                </li>
                <li>
                    <a href="{{route('employee-manager')}}">
                        <span class="glyphicon glyphicon-tags"></span> user Listing </a>
                </li>
                <li>
                    <a href="{{route('upload-emp')}}">
                        <span class="glyphicon glyphicon-tags"></span> Upload </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Managers</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-employee')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add  Managers  </a>
                </li>
                <li>
                    <a href="{{route('employee-manager')}}">
                        <span class="glyphicon glyphicon-tags"></span>  Managers  Listing </a>
                </li>
               
            </ul>
        </li>
        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">User</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-employee')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add user </a>
                </li>
                <li>
                    <a href="{{route('employee-manager')}}">
                        <span class="glyphicon glyphicon-tags"></span> user Listing </a>
                </li>
               
            </ul>
        </li>
        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-user"></span>
                <span class="sidebar-title"> Admin</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-employee')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add  Admin </a>
                </li>
                <li>
                    <a href="{{route('employee-manager')}}">
                        <span class="glyphicon glyphicon-tags"></span>  Admin Listing </a>
                </li>
               
            </ul>
        </li>
        @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
          <li>
                <a class="accordion-toggle" href="/dashboard">
                    <span class="fa fa-user"></span>
                    <span class="sidebar-title">Clients</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{route('add-client')}}">
                            <span class="glyphicon glyphicon-tags"></span> Add Client </a>
                    </li>

                    <li>
                        <a href="{{route('list-client')}}">
                            <span class="glyphicon glyphicon-tags"></span> List Client </a>
                    </li>
                </ul>
            </li>
        @endif

      <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Projects</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-project')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add Project </a>
                </li>

                <li>
                    <a href="{{route('list-project')}}">
                        <span class="glyphicon glyphicon-tags"></span> List Project</a>
                </li>

                <li>
                    <a href="{{route('assign-project')}}">
                        <span class="glyphicon glyphicon-tags"></span> Assign Project</a>
                </li>

                <li>
                    <a href="{{route('project-assignment-listing')}}">
                        <span class="glyphicon glyphicon-tags"></span> Project Assignment Listing</a>
                </li>
            </ul>
        </li>-->

        <!--<li>

            <a href="/bank-account-details">
                <span class="fa fa-bank"></span>
                <span class="sidebar-title">Bank Account</span>

            </a>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-group"></span>
                <span class="sidebar-title">Teams</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-team')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Team </a>
                </li>
                <li>
                    <a href="{{route('team-listing')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Team Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-graduation-cap"></span>
                <span class="sidebar-title">Roles</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-role')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Role </a>
                </li>
                <li>
                    <a href="{{route('role-list')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Role Listings </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa fa-laptop"></span>
                <span class="sidebar-title">Assets</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-asset')}}">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Add Asset </a>
                </li>
                <li>
                    <a href="{{route('asset-listing')}}">
                        <span class="glyphicon glyphicon-calendar"></span> Asset Listings </a>
                </li>
                <li>
                    <a href="{{route('assign-asset')}}">
                        <span class="fa fa-desktop"></span> Assign Asset </a>
                </li>
                <li>
                    <a href="{{route('assignment-listing')}}">
                        <span class="fa fa-clipboard"></span> Assignment Listings </a>
                </li>
            </ul>
        </li>
    @endif
  <li>
        <a class="accordion-toggle" href="/dashboard">
            <span class="fa fa-envelope"></span>
            <span class="sidebar-title">Leaves</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{route('apply-leave')}}">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Apply Leave </a>
            </li>
            <li>
                <a href="{{route('my-leave-list')}}">
                    <span class="glyphicon glyphicon-calendar"></span> My Leave List </a>
            </li>

            @if(\Auth::user()->isHR())
                <li>
                    <a href="{{route('add-leave-type')}}">
                        <span class="fa fa-desktop"></span> Add Leave Type </a>
                </li>
                <li>
                    <a href="{{route('leave-type-listing')}}">
                        <span class="fa fa-clipboard"></span> Leave Type Listings </a>
                </li>
            @endif
            @if(Auth::user()->isHR() || Auth::user()->isCoordinator())
                <li>
                    <a href="{{route('total-leave-list')}}">
                        <span class="fa fa-clipboard"></span> Total Leave Listings </a>
                </li>
            @endif
        </ul>
    </li>

    @if(Auth::user()->isHR())
        <!--<li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-arrow-circle-o-up"></span>
                <span class="sidebar-title">Promotions</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/promotion">
                        <span class="glyphicon glyphicon-book"></span> Promote </a>
                </li>
                <li>
                    <a href="/show-promotion">
                        <span class="glyphicon glyphicon-modal-window"></span> Promotion Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-money"></span>
                <span class="sidebar-title">Expenses</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-expense')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Expense </a>
                </li>
                <li>
                    <a href="{{route('expense-list')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Expense Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa fa-trophy"></span>
                <span class="sidebar-title">Awards</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/add-award">
                        <span class="fa fa-adn"></span> Add Award </a>
                </li>
                <li>
                    <a href="/award-listing">
                        <span class="glyphicon glyphicon-calendar"></span> Award Listings </a>
                </li>
                <li>
                    <a href="/assign-award">
                        <span class="fa fa-desktop"></span> Awardees </a>
                </li>
                <li>
                    <a href="/awardees-listing">
                        <span class="fa fa-clipboard"></span> Awardees Listings </a>
                </li>
            </ul>
        </li>
    @endif


    <!--<li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa fa-gavel"></span>
            <span class="sidebar-title">Trainings</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            @if(\Auth::user()->notAnalyst())
                <li>
                    <a href="/add-training-program">
                        <span class="fa fa-adn"></span> Add Training Program </a>
                </li>
            @endif
            <li>
                <a href="/show-training-program">
                    <span class="glyphicon glyphicon-calendar"></span> Program Listings </a>
            </li>
            @if(\Auth::user()->notAnalyst())
                <li>
                    <a href="/add-training-invite">
                        <span class="fa fa-desktop"></span> Training Invite </a>
                </li>
            @endif
            <li>
                <a href="/show-training-invite">
                    <span class="fa fa-clipboard"></span> Invitation Listings </a>
            </li>
        </ul>
    </li>
    @if(Auth::user()->isHR())
       <!-- <li>
            <a class="accordion-toggle" href="#">
                <span class="fa fa-clock-o"></span>
                <span class="sidebar-title"> Attendance </span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('attendance-upload')}}">
                        <span class="glyphicon glyphicon-book"></span> Upload Sheets</a>
                </li>

            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="#">
                <span class="fa fa-tree"></span>
                <span class="sidebar-title">Holiday</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/add-holidays">
                        <span class="glyphicon glyphicon-book"></span> Add Holiday </a>
                </li>
                <li>
                    <a href="/holiday-listing">
                        <span class="glyphicon glyphicon-modal-window"></span> Holiday Listings </a>
                </li>
            </ul>
        </li>

    @endif

    <!--{{--<li class="sidebar-label pt30"> Extras</li>--}}
    <li>
        <a href="/create-meeting">
            <span class="fa fa-calendar-o"></span>
            <span class="sidebar-title"> Meeting  &nbsp Invitation </span>
        </a>
    </li>

    @if(Auth::user()->isCoordinator() ||  Auth::user()->isHR())
        <li>
            <a href="/create-event">
                <span class="fa fa-calendar-o"></span>
                <span class="sidebar-title"> Event  &nbsp Invitation </span>
            </a>
        </li>
    @endif
    <li>

        <a href="/download-forms">
            <span class="fa fa-book"></span>
            <span class="sidebar-title">Download Forms</span>

        </a>
    </li>

    <li>
        <a href="/hr-policy">
            <span class="fa fa-gavel"></span>
            <span class="sidebar-title"> Company Policy </span>
        </a>
    </li>
    <p> &nbsp; </p>
</ul>-->
<!-- -------------- /Sidebar Menu  -------------- -->