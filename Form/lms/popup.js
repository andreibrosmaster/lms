var deleteDiv = document.getElementById('delete');
var updateDiv = document.getElementById('update');
var display = 1;

function hideShow() {
  if (display == 1) {
    deleteDiv.style.display = 'block';
    updateDiv.style.display = 'none';
    display = 0;
  } else {
    deleteDiv.style.display = 'none';
    updateDiv.style.display = 'block';
    display = 1;
  }
}
