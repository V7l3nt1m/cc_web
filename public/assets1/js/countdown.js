/* ======================================
    CALCULATE THE REMAINING TiME
    ======================================== */
function getTimeRemaining(endtime) {
	const total = Date.parse(endtime) - Date.parse(new Date());
	const seconds = Math.floor((total / 1000) % 60);
	const minutes = Math.floor((total / 1000 / 60) % 60);
	const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
	const days = Math.floor(total / (1000 * 60 * 60 * 24));

	return {
		total,
		days,
		hours,
		minutes,
		seconds,
	};
}

/* ======================================
        INITIALIZING CLOCK TIMER
        ======================================== */
function initializeClock(id, endtime) {
	const clock = document.querySelector(id);
	const daysSpan = clock.querySelector('.day .num');
	const hoursSpan = clock.querySelector('.hour .num');
	const minutesSpan = clock.querySelector('.min .num');
	const secondsSpan = clock.querySelector('.sec .num');

	/* ======================================
            CALLBACK FUNCTION AFTER TIMER ENDS
            ======================================== */
	function updateClock() {
		const t = getTimeRemaining(endtime);
		daysSpan.textContent = t.days;
		hoursSpan.textContent = ('0' + t.hours).slice(-2);
		minutesSpan.textContent = ('0' + t.minutes).slice(-2);
		secondsSpan.textContent = ('0' + t.seconds).slice(-2);
	}

	// RUN CALLBACK FUNCTION
	updateClock();
	setInterval(updateClock, 1000);
}
