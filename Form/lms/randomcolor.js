// Function to generate a random color
function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }
  
  // Get all elements with the class 'course-box'
  const courseBoxes = document.querySelectorAll('.course-box');
  
  // Apply a random color to each course box
  courseBoxes.forEach(function(box) {
    const randomColor = getRandomColor();
    box.style.backgroundColor = randomColor;
  });
  