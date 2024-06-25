window.addEventListener('load', function() {
    const headerHeight = document.querySelector('header').offsetHeight;
    document.body.style.paddingTop = headerHeight + 'px';
  });