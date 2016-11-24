
  <body>
    <img id="editableImage" src="<?php echo($_GET['file']); ?>" height="400px" alt="Freshalicious"></p>

    <p><button id="buttonEditImage">Edit image!</button></p>

    <div id="PaintWebTarget"></div>
<!--[if lte IE 8]>
    <p>Please note that this application does not work in Internet Explorer 
    8. Please try this in Internet Explorer 9, or use any other modern web 
       browser: <a href="http://www.google.com/chrome">Chrome</a>, <a 
         href="http://www.mozilla.com">Firefox</a>, <a 
         href="http://www.apple.com/safari">Safari</a>, <a 
         href="http://www.opera.com">Opera</a> or <a 
         href="http://www.konqueror.org">Konqueror</a>.</p>
    <![endif]-->

    <script type="text/javascript" src="paintweb.js"></script>

    <script type="text/javascript"><!--
(function () {
  // Function called when the user clicks the "Edit image" button.
  function pwStart () {
    document.body.insertBefore(loadp, btn.parentNode);

    timeStart = (new Date()).getTime();
    pw.init(pwInit);
  };

  // Function called when the PaintWeb application fires the "appInit" event.
  function pwInit (ev) {
    var initTime = (new Date()).getTime() - timeStart,
        str = 'Demo: Yay, PaintWeb loaded in ' + initTime + ' ms! ' +
              pw.toString();

    document.body.removeChild(loadp);

    if (ev.state === PaintWeb.INIT_ERROR) {
      alert('Demo: PaintWeb initialization failed.');
      return;

    } else if (ev.state === PaintWeb.INIT_DONE) {
      if (window.console && console.log) {
        console.log(str);
      } else if (window.opera) {
        opera.postError(str);
      }

    } else {
      alert('Demo: Unrecognized PaintWeb initialization state ' + ev.state);

      return;
    }

    img.style.display = 'none';
    btn.style.display = 'none';
  };

  var img    = document.getElementById('editableImage'),
      btn    = document.getElementById('buttonEditImage'),
      target = document.getElementById('PaintWebTarget'),
      loadp  = document.createElement('p'),
      timeStart = null,

      // Create a PaintWeb instance.
      pw = new PaintWeb();

  pw.config.guiPlaceholder = target;
  pw.config.imageLoad      = img;
  pw.config.configFile     = 'config-example.json';
  loadp.appendChild(document.createTextNode('Loading, please wait...'));

  if (btn.addEventListener) {
    btn.addEventListener('click', pwStart, false);
  } else if (btn.attachEvent) {
    btn.attachEvent('onclick', pwStart);
  } else {
    btn.onclick = pwStart;
  }
})();
    --></script>
  </body>
  <!-- vim:set spell spl=en fo=tcroqwanl1 tw=80 ts=2 sw=2 sts=2 sta et ai cin fenc=utf-8 ff=unix: -->
</html>
