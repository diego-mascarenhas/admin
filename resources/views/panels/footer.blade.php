<!-- BEGIN: Footer-->
<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; 2023 <a href="https://revisionalpha.es"
          target="_blank">revision alpha</a> All rights reserved.
      </span>
      <span class="right hide-on-small-only">CMS+ v2</span>
    </div>
  </div>
</footer>

<!-- END: Footer-->