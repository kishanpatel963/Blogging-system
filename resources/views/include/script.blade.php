  <!-- Javascript -->       
  
  {!! Html::script('assets/plugins/jquery-3.3.1.min.js') !!}
  {!! Html::script('assets/plugins/popper.min.js') !!}
  {{-- {!! Html::script('assets/js/summernote-bs4.min.js') !!} --}}
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  {!! Html::script('assets/plugins/bootstrap/js/bootstrap.min.js') !!}

  {!! Html::script('assets/js/all.js') !!}
  
  <!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
  {!! Html::script('assets/js/demo/style-switcher.js') !!}
  {!! Html::script('assets/js/jquery.validate.min.js') !!}
  @yield('pagejs')