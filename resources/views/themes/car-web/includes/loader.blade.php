<div class="maz-loader" id="demo-spinner" role="status" style="position: fixed; z-index: 1051; top: 50%; left: 50%; transform:translate(-100%, -50%); display: none; background:white; padding: 1rem; box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .1); border-radius:8px">
  <div id="maz-loading"></div>
  <span class="sr-only">Loading...</span>
</div>

<script>
    var animation = bodymovin.loadAnimation({
    container: document.getElementById('maz-loading'),
    renderer: 'svg',
    loop: true,
    rendererSettings: {
        progressiveLoad: true
    },
    autoplay: true,
    path: '{{ asset("car-web/animation/loading.json")}}'
});
</script>