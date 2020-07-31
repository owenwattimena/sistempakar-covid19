/**
 * App Time
 */

function appTime() {
    let el_time = document.querySelector('#time');
    let today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);
    el_time.innerHTML = `${h}:${m}:${s}`;
    setTimeout(appTime, 1000);
}
function checkTime(i) {
    if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
    return i;
}

/**
 * App Date
 */

function appDate() {
    let el_date = document.querySelector('#date');
    let today = new Date();
    let y = today.getFullYear();
    let m = today.getMonth();
    m = getMonthName(m);
    let d = today.getDate();
    console.log(d);
    d = checkTime(d);
    let d_name = getDayName(today.getDay());

    let appDateFormat = `${d_name}, ${d} ${m} ${y}`;
    el_date.innerHTML = appDateFormat;
}

function getDayName(i) {
    let dayName = [
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
    ];
    return dayName[i];
}

function getMonthName(i) {
    let months = {
        0: 'Januari',
        1: 'Februari',
        2: 'Maret',
        3: 'April',
        4: 'Mei',
        5: 'Juni',
        6: 'Juli',
        7: 'Agustus',
        8: 'September',
        9: 'Oktober',
        10: 'November',
        11: 'Desember',
    }
    return months[i];
}

window.onload = function () {
    appTime(); //App Time
}
appDate();
console.log('owen');