// referred to https://github.com/diafygi/webrtc-ips. thanks!
function getIPs(callback) {
  var ip_dups = {};
  var RTCPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
  var useWebKit = !!window.webkitRTCPeerConnection;

  if (!RTCPeerConnection) {
    var win = iframe.contentWindow;
    RTCPeerConnection = win.RTCPeerConnection || win.mozRTCPeerConnection || win.webkitRTCPeerConnection;
    useWebKit = !!win.webkitRTCPeerConnection;
  }

  var mediaConstraints = {
    optional: [{RtpDataChannels: true}]
  };
  var servers = {iceServers: [{urls: "stun:stun.services.mozilla.com"}]};
  var pc = new RTCPeerConnection(servers, mediaConstraints);

  function handleCandidate(candidate) {
    var ip_regex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/
    var ip_addr = ip_regex.exec(candidate)[1];

    if (ip_dups[ip_addr] === undefined) {
      callback(ip_addr);
    }
    ip_dups[ip_addr] = true;
  }

  pc.onicecandidate = function(ice) {
    if (ice.candidate) {
      handleCandidate(ice.candidate.candidate);
    }
  };
  pc.createDataChannel("");
  pc.createOffer(function(result) {
    pc.setLocalDescription(result, function(){}, function(){});
  }, function(){});

  setTimeout(function() {
    var lines = pc.localDescription.sdp.split('\n');
    lines.forEach(function(line) {
      if (line.indexOf('a=candidate:') === 0) {
        handleCandidate(line);
      }
    });
  }, 1000);
}

var addClassName = function(element, classNameValue) {
  if (!element || typeof element.className === 'undefined' || typeof classNameValue !== 'string') {
    return;
  }

  if (element.classList) {
    element.classList.add(classNameValue);
  }
  else {
    var classNames = element.className.replace(/^\s+|\s+$/g, '').split(' ');

    if (classNames.toString() === '') {
      classNames = [];
    }

    if (inArray(classNameValue, className) > -1) {
      return;
    }

    classNames.push(classNameValue);
    element.className = classNames.join(' ');
  }

  return element;
}

try {
  getIPs(function(ip) {
    var localIP = document.getElementById('local-ip-val');

    if (ip.match(/^(192\.168\.|169\.254\.|10\.|172\.(1[6-9]|2\d|3[01]))/)) {
      localIP.textContent = ip;
    }
    else {
      localIP.textContent = "Unknown";
    }
  });
}
catch (e) {
  var localIP = document.getElementById('local-ip-val');

  localIP.textContent = "Unknown";
  addClassName(localIP, 'grey');
}
