
 // grab clock hands
  const secondHand = document.querySelector('.second-hand');
  const minsHand = document.querySelector('.min-hand');
  const hourHand = document.querySelector('.hour-hand');

 function setDate() {
    const now = new Date(); //get time
    
   // get current second, minute and hour
    const seconds = now.getSeconds();
    const mins = now.getMinutes();
    const hours = now.getHours();
    
   // calculate the degree for one second, minute and hour
    const secondsDeg = ((seconds / 60) * 360) + 180;
    const minsDeg = ((mins / 60) * 360) + ((seconds/60)*6) +180;
    const hoursDegrees = ((hours / 12) * 360) + ((mins/60)*30) + 180;
   
   // rotate hands 
    secondHand.style.transform = `rotate(${secondsDeg}deg)`;
    minsHand.style.transform = `rotate(${minsDeg}deg)`;
    hourHand.style.transform = `rotate(${hoursDegrees}deg)`;
  }

  setInterval(setDate, 1000);

  setDate();