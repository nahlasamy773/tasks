<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> Cars Store</a>
    </div>
    <ul class="nav navbar-nav">
      
      <li class="active"><a href="{{ route('cars')}}"> Home </a></li>

      <li><a href="{{ route('createCar')}}">Insert Car</a></li>
      <li><a href="{{ route('trashed')}}">Trashed</a></li>
      <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a> </li>
      <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">عربي</a> </li>
    </ul>
  </div>
</nav>

