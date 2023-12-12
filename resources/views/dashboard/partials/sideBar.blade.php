<input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <div class="left_area">
        <h3><span>Extrovers</span></h3>
      </div>
    </header>
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="{{ URL::to('img/profile.jpeg') }}" class="profile_image" alt="">
        <h4>Arifin</h4>
      </div>
      <li class="{{ set_active(['home']) }}"> <a href="{{ route('home') }}"><i class="fa fa-home" style="color: #0066FF;"></i> <span>Dashboard</span></a> </li>
      <li class="{{ set_active(['assignment']) }}"> <a href="{{ route('assignment') }}"><i class="fa fa-inbox" style="color: #0066FF;"></i> <span>Assignment</span></a> </li>
      <li class="{{ set_active(['information']) }}"> <a href="{{ route('information') }}"><i class="fa fa-envelope" style="color: #0066FF;"></i> <span>Information</span></a> </li>
      <li class="{{ set_active(['team']) }}"> <a href="{{ route('team') }}"><i class="fa fa-users" style="color: #0066FF;"></i> <span>Teams</span></a> </li>
      <li class="{{ set_active(['profile']) }}"> <a href="{{ route('profile') }}"><i class="fa fa-user" style="color: #0066FF;"></i> <span>Profile</span></a> </li>

      <li class="{{ set_active(['logout']) }}"> <a href="{{ route('logout') }}"><i class="fa fa-arrow-left" style="color: #FF0000;"></i> <span style="color: #FF0000;">Logout</span></a> </li>
    </div>
    <!--sidebar end-->

</div>
