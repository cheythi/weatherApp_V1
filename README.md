# Weather Application

This is a PHP application implemented using the CodeIgniter framework, designed to provide users with real-time weather information based on their current location. By leveraging the open-source OpenWeather API, this website retrieves weather data and displays it to the user in an intuitive and user-friendly manner.

## Features

- **Geolocation**: The application utilizes the user's current geolocation to identify their location automatically.
- **Weather Information**: Using the OpenWeather API, the application fetches weather data for the user's location, including temperature, weather conditions, wind speed, humidity, and more.
- **Responsive Design**: The frontend of the application is developed using the Bootstrap framework, ensuring a visually appealing and mobile-friendly experience for users.	
- **Unit Conversion**: Users have the option to view temperature information in either Celsius or Fahrenheit. The application provides a convenient button to toggle between the two units.

## Application Workflow

1. Upon visiting the website, the application retrieves the user's current geolocation.
2. Using the obtained coordinates, the application sends a request to the OpenWeather API.
3. The API responds with a JSON object containing weather information for the user's location.
4. The application extracts the relevant data from the API response, including temperature, weather description, wind speed, etc.
5. This information is dynamically displayed to the user on the webpage, providing an up-to-date overview of the weather conditions.
6. The user can easily switch between Celsius and Fahrenheit units by clicking the unit conversion button.
7. The application handles exceptions and errors gracefully, ensuring a smooth user experience even in adverse situations.

## API Response Example

The API response used by the application to display weather information is in the following JSON format:

```json
{
  "coord": {
    "lon": 79.8612,
    "lat": 6.9271
  },
  "weather": [
    {
      "id": 500,
      "main": "Rain",
      "description": "light rain",
      "icon": "10n"
    }
  ],
  "base": "stations",
  "main": {
    "temp": 26.99,
    "feels_like": 30.4,
    "temp_min": 26.99,
    "temp_max": 26.99,
    "pressure": 1012,
    "humidity": 87,
    "sea_level": 1012,
    "grnd_level": 1010
  },
  "visibility": 9295,
  "wind": {
    "speed": 5.45,
    "deg": 276,
    "gust": 7.23
  },
  "rain": {
    "1h": 0.73
  },
  "clouds": {
    "all": 81
  },
  "dt": 1687883019,
  "sys": {
    "type": 1,
    "id": 9098,
    "country": "LK",
    "sunrise": 1687825663,
    "sunset": 1687870743
  },
  "timezone": 19800,
  "id": 1248991,
  "name": "Colombo",
  "cod": 200
}
```

## Screenshots

Here are some screenshots of the Weather Application in action:

1. **Weather Information**:
![image](https://github.com/cheythi/weatherApp_V1/assets/50759110/a517757b-a403-4acb-972f-979e025b4ee3)

3. **Unit Conversion**:
   
   	 ![image](https://github.com/cheythi/weatherApp_V1/assets/50759110/ab9c3408-a352-459e-a9ca-7aae8419d1fb)
	 ![image](https://github.com/cheythi/weatherApp_V1/assets/50759110/83e9e31a-74ad-4c50-b98c-6a8f88e1deae)

5. **Error Handling**:
   ![image](https://github.com/cheythi/weatherApp_V1/assets/50759110/636079c1-3168-4fd0-beec-b282f4752065)


# How to run this in your local computer

## Prerequisites

Before you begin, ensure that you have the following software installed:

1. XAMPP: Download and install XAMPP, which includes Apache, MySQL, and PHP. You can download it from the [XAMPP website](https://www.apachefriends.org/index.html) and follow the installation instructions specific to your operating system.

## Installation Steps

1. Download the CodeIgniter project: 
   - Visit the project repository on GitHub and click on the "Download" button. Save the ZIP file to your local machine.
   - Extract the downloaded ZIP file to the `htdocs` folder in your XAMPP installation directory. This folder is typically located at `C:\xampp\htdocs` on Windows or `/opt/lampp/htdocs` on Linux.

2. Start XAMPP:
   - Launch the XAMPP control panel.
   - Start the Apache and MySQL services by clicking the "Start" button next to each of them. If they are already running, you don't need to start them again.

3. Access the CodeIgniter application:
   - Open a web browser and go to `http://localhost/<project-folder>/` in the address bar. Replace `<project-folder>` with the name of the folder you extracted from the ZIP file.
   - The CodeIgniter application should now be running, and you can explore the weather information based on your current location.
