<div class="main-nav title-bar " data-responsive-toggle="example-menu" data-hide-for="medium">
  <img class="logo-responsive" width="50" src="https://octodex.github.com/images/octocat-de-los-muertos.jpg" />
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title"></div>
</div>


<div class="main-nav top-bar" id="example-menu">
  <div class="main-nav top-bar-left">
    <ul class=" main-nav dropdown menu" data-dropdown-menu>

      <li><img class="logo show-for-small" width="100" src="https://octodex.github.com/images/octocat-de-los-muertos.jpg" /></li>
      <li class="<?php echo ( $selected_tab == 'index' ) ? 'active':''; ?>"><a class="button" href="<?php echo site_url('test/index'); ?>">Home</a></li>
      <li class="<?php echo ( $selected_tab == 'other' ) ? 'active':''; ?>"><a class="button" href="<?php echo site_url('test/other'); ?>">Other</a></li>
    </ul>
  </div>
  <button class="main-nav button top-bar-right " type="button" data-toggle="example-dropdown2">Options<i></i></button>
  <div class="dropdown-pane" id="example-dropdown2" data-dropdown>
    <ul class="main-nav vertical menu box_option center">
      <li class="profile">
        <span class="clearfix">
          <?php echo $user_name; ?>
        </span>
      </li>
      <li class="box_option out">
        <a class="tiny secondary hollow button" href="<?php echo site_url('users/logout'); ?>">Logout</a></li>
    </ul>
  </div>
</div>