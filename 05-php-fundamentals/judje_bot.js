(function judjeSubmitBot(){
    let interval = setInterval(() => {
        const alertElement = document.querySelector('div.alert.alert-warning');

        if (alertElement && alertElement.innerText) {
            const regex = /[0-9]+/g;
            const time = Number(alertElement.innerText.match(regex)[0]) + 1;
            
            if (time && time > 0) {
                clearInterval(interval);
                let countdownNumber = time;

                let countDownInterval = setInterval(() => {
                    console.log(countdownNumber--, 'seconds');
                    if (countdownNumber <= 0 ) clearInterval(countDownInterval);
                }, 1000);

                setTimeout(() => {
                    const submitBtn = document.querySelector('input.k-button.submision-submit-button');
                    submitBtn.click();
                }, time * 1000);
            }
        }
    }, 750);
})();