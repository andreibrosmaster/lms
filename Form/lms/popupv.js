var deleteDiv = document.getElementById('delete');
var display = 1;

function hideShow() {
  if (display == 1) {
    deleteDiv.style.display = 'block';
    display = 0;
  } else {
    deleteDiv.style.display = 'none';
    display = 1;
  }
}
