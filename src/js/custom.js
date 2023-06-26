getLocation();
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        errorMessage = "Geolocation is not supported by this browser.";
        showAlert(errorMessage);
    }
}

function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            errorMessage = "User denied for the location access.";
            showAlert(errorMessage);
            break;
        case error.POSITION_UNAVAILABLE:
            errorMessage = "Location information is unavailable.";
            showAlert(errorMessage);
            break;
        case error.TIMEOUT:
            errorMessage = "Request timed out.";
            showAlert(errorMessage);
            break;
        case error.UNKNOWN_ERROR:
            errorMessage = "An unknown error occurred.";
            showAlert(errorMessage);
            break;
    }
}

var alertDiv = document.getElementById('alertArea');
var errorMessage = "";

function showAlert($err){
    alertDiv.innerHTML = errorMessage;
    alertDiv.style.display = "block";
}

function showPosition(position) {

    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    document.getElementById('latitude').value = latitude;
    document.getElementById('longitude').value = longitude;

    console.log("Latitude: " + latitude + ", Longitude: " + longitude);
    
}

function refresh() {
    var form = document.getElementById('getweatherData');
    form.submit();
}

function changeUnit() {
    // Get button value
    var button = document.getElementById("unitChange");
    var buttonValue = button.value;
  
    // Get all temperature elements
    var temperatureElements = document.querySelectorAll(".temperature");
  
    // Iterate over temperature elements and convert units
    temperatureElements.forEach(function (element) {
      var temperature = parseFloat(element.textContent.match(/\d+(\.\d+)?/)[0]);
  
      if (buttonValue === "°F") {
        // Convert Celsius to Fahrenheit
        var temperatureF = (temperature * 9) / 5 + 32;
        element.textContent = element.textContent.replace(/\d+(\.\d+)?\s*°[CF]/, temperatureF.toFixed(2) + " °F");
      } else {
        // Convert Fahrenheit to Celsius
        var temperatureC = ((temperature - 32) * 5) / 9;
        element.textContent = element.textContent.replace(/\d+(\.\d+)?\s*°[CF]/, temperatureC.toFixed(2) + " °C");
      }
    });
  
    // Toggle button value
    button.value = buttonValue === "°F" ? "°C" : "°F";
  }