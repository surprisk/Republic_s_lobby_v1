function copyClipboard() {
  /* Get the text field */
  var copyText = document.getElementById("copy");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  document.getElementById('copiedBarre').style.display= 'block';
  
  /* Close the copied text alert */
  setTimeout("document.getElementById('copiedBarre').style.display= 'none';", 10000);
}