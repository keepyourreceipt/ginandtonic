<form role="search" method="get" id="search-form" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="form-group">
    <div class="input-group">
      <input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s">
      <div id="submit-search-form" class="input-group-addon"><i class="fa fa-search"></i></div>
    </div>
  </div>
</form>
