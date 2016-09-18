<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('admin.login')}}">
        TaskHub
      </a>
      @if(Auth::check())
      <button type="button" class="close"  aria-label="Close"><span aria-hidden="true"><a href="{{route('admin.logout')}}">&times;</a></span></button>
      @endif
    </div>
  </div>
</nav>