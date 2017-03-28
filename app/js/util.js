var addClassName = function (element, classNameValue) {
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

var formatDecimals = function (num) {
  num = (parseInt(num) === parseFloat(num)) ? num + '.0' : num + '';
  return num;
}
