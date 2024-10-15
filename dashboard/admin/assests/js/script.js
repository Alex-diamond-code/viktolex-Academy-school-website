// preloader
const preloader = document.querySelector("#preloader");
if (preloader) {
  window.addEventListener("load", () => {
    preloader.remove();
  });
}

// code for result section
exam.addEventListener('keyup', () => {
  let first_test = document.getElementById('first_test').value;
  let second_test = document.getElementById('second_test').value;
  let exam = document.getElementById('exam').value;
  
  score_total = Number(first_test) + Number(second_test) + Number(exam);
  document.getElementById('total').value = score_total;

  if (score_total >= 80) {
    document.getElementById('grade').value = "A";
  }
  else if (score_total >= 70) {
    document.getElementById('grade').value = "B";
  }
  else if (score_total >= 50) {
    document.getElementById('grade').value = "C";
  }
  else if(score_total >= 40){
    document.getElementById('grade').value = "D";
  }
  else if(score_total >= 30){
    document.getElementById('grade').value = "E";
  }
  else if(score_total >= 0){
    document.getElementById('grade').value = "F";
  }

});
