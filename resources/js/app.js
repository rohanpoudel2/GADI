import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const ride_button = document.getElementById('ride-button');
const testRideForm = document.getElementById('test-ride-form');
const testRideFormCloseButton = document.getElementById('quit-form');

ride_button.addEventListener('click', () => {
  if (testRideForm.style.display === "none") {
    testRideForm.style.display = "block";
  } else {
    testRideForm.style.display = "none";
  }
})

testRideFormCloseButton.addEventListener('click', () => {
  testRideForm.style.display = "none"
})
