
<script src="{!! asset('js/all.js') !!}" type="text/javascript"></script>
<script>
    $('body').show();
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 2000);
</script>