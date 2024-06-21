// updateTime.js
var timestamp = new Date().getTime() / 1000;

function updateTime() {
    var date = new Date(timestamp * 1000); // Convert to milliseconds
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    var dayName = days[date.getDay()];
    var day = date.getDate();
    var monthName = months[date.getMonth()];
    var year = date.getFullYear();

    var hours = date.getHours() % 12 || 12; // Convert to 12-hour format
    var minutes = String(date.getMinutes()).padStart(2, '0');
    var seconds = String(date.getSeconds()).padStart(2, '0');
    var ampm = date.getHours() >= 12 ? 'PM' : 'AM';

    var formattedTime = `${hours}:${minutes}:${seconds} ${ampm}`;
    var formattedDate = `${dayName} ${day} ${monthName}, ${year}`;

    document.getElementById('date').innerHTML = formattedDate;
    document.getElementById('time').innerHTML = formattedTime;
    timestamp++;
}

document.addEventListener('DOMContentLoaded', function() {
    setInterval(updateTime, 1000);
    updateTime(); // Initial call to set the time immediately
});
