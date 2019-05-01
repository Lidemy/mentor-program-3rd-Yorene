const heightInMeter = 1.75;
const weightInKG = 50;
const BMI = weightInKG / (heightInMeter * heightInMeter);
let message = '';

console.log(BMI);

if (BMI < 18.5) {
  message = '體重過輕';
} else if (BMI < 24) {
  message = '正常範圍';
} else if (BMI < 27) {
  message = '過重';
} else if (BMI < 30) {
  message = '輕度肥胖';
} else if (BMI < 35) {
  message = '中度肥胖';
} else {
  message = '重度肥胖';
}

console.log(message);
