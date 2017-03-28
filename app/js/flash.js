// referred to http://www.allinthemind.biz/markup/javascript/javascriptflash_player.html. thanks!

// version:
//  -1 => not installed
//   0 => legacy version
// >=7 => ordinary version
function getFlashPlayerVersion() {
  var version = -1;

  if (navigator.plugins && navigator.mimeTypes["application/x-shockwave-flash"]) {
    var plugin = navigator.plugins["Shockwave Flash"] || navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin;
    if (plugin) {
      version = parseFloat(plugin.description.match(/\d+\.\d+/));
    }
  }
  else {
    var axo = null;

    try {
      axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7").GetVariable("$version").match(/([0-9]+)/);
    }
    catch (err) {
      try {
        axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash").GetVariable("$version").match(/([0-9]+)/);
      }
      catch (err) {
        // flash player is not installed
      }
    }

    if (axo) {
      version = parseFloat(axo[0]);
    }
  }

  // flash version is legacy
  // difficult to determine
  if (version > 0 && version < 7) {
    version = 0;
  }

  return version;
}

(function() {
  var flash   = document.querySelector("#flash");
  var version = getFlashPlayerVersion();
  var msg     = null;

  switch (version) {
    case -1: msg = "Not installed";                       addClassName(flash, "grey");  break;
    case  0: msg = "Legacy version (less than 7)";                                      break;
    default: msg = "Version " + formatDecimals(version);                                break;
  }

  flash.textContent = msg;
}());
