function changeDropdownText(elementId, text, inputId, bdId) {
  var element = document.getElementById(elementId);
  element.innerText = text;

  var input = document.getElementById(inputId);
  input.value = bdId;
}
