<footer class="footer">
  <div class="container-fluid">
    <nav class="float-left">
      <ul>
        <li>
          <a href="{{url('/')}}">
              {{ __('LADYLIKE CLOTHES') }}
          </a>
        </li>
        <li>
          <a href="{{url('/about-us')}}">
              {{ __('About Us') }}
          </a>
        </li>
        <li>
          <a href="{{url('/contact-us')}}">
              {{ __('Contact Us') }}
          </a>
        </li>
        <li>
          <a href="{{url('/privacy-policy')}}">
              {{ __('Privacy and Policy') }}
          </a>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>| All right reserved by <a href="{{url('/')}}" target="_blank" rel="noopener noreferrer">LADYLIKE CLOTHES.</a> 
    </div>
  </div>
</footer>