var sum=0;

function hidenav(){
   document.getElementById("nav").style.display = "none";   
}

function showone(){
    document.getElementById("one").style.display = "block";
    document.getElementById("two").style.display = "none";
    document.getElementById("three").style.display = "none";
    document.getElementById("four").style.display = "none";
    document.getElementById("five").style.display = "none";
    document.getElementById("submit").style.display = "none";
    document.getElementById("result").style.display = "none";
}
function showtwo(){
    document.getElementById("one").style.display = "none";
    document.getElementById("two").style.display = "block";
    document.getElementById("three").style.display = "none";
    document.getElementById("four").style.display = "none";
    document.getElementById("five").style.display = "none";
    document.getElementById("submit").style.display = "none";
    document.getElementById("result").style.display = "none";
}
function showthree(){
    document.getElementById("one").style.display = "none";
    document.getElementById("two").style.display = "none";
    document.getElementById("three").style.display = "block";
    document.getElementById("four").style.display = "none";
    document.getElementById("five").style.display = "none";
    document.getElementById("submit").style.display = "none";
    document.getElementById("result").style.display = "none";
}
function showfour(){
    document.getElementById("one").style.display = "none";
    document.getElementById("two").style.display = "none";
    document.getElementById("three").style.display = "none";
    document.getElementById("four").style.display = "block";
    document.getElementById("five").style.display = "none";
    document.getElementById("submit").style.display = "none";
    document.getElementById("result").style.display = "none";
}
function showfive(){
    document.getElementById("one").style.display = "none";
    document.getElementById("two").style.display = "none";
    document.getElementById("three").style.display = "none";
    document.getElementById("four").style.display = "none";
    document.getElementById("five").style.display = "block";
    document.getElementById("submit").style.display = "none";
    document.getElementById("result").style.display = "none";
}
function showsubmit(){
   document.getElementById("one").style.display = "none";
   document.getElementById("two").style.display = "none";
   document.getElementById("three").style.display = "none";
   document.getElementById("four").style.display = "none";
   document.getElementById("five").style.display = "none";
   document.getElementById("submit").style.display = "block";
   document.getElementById("result").style.display = "none";
}

function showresult(){
   document.getElementById("one").style.display = "none";
   document.getElementById("two").style.display = "none";
   document.getElementById("three").style.display = "none";
   document.getElementById("four").style.display = "none";
   document.getElementById("five").style.display = "none";
   document.getElementById("submit").style.display = "none";
   document.getElementById("result").style.display = "block";
}

function qone() {
    var radios = document.getElementsByName("qone");
    var i = 0, len = radios.length;
    var checked = false;
    var userAnswer;
    
    for( ; i < len; i++ ) {
       if(radios[i].checked) {
         checked = true;
         userAnswer = radios[i].value;
       }
    } 
    // if user click submit button without selecting any option, alert box should be say "please select choice answer".
    if(!checked) {
      alert("please select choice answer");
      return;
    }
    // Correct answer
    if(userAnswer === "Radians") {
       sum=sum+1;
    }
    // incorrect answer
    else {
       sum+=0;
    }
}
function qtwo() {
    var radios = document.getElementsByName("qtwo");
    var i = 0, len = radios.length;
    var checked = false;
    var userAnswer;
    
    for( ; i < len; i++ ) {
       if(radios[i].checked) {
         checked = true;
         userAnswer = radios[i].value;
       }
    } 
    // if user click submit button without selecting any option, alert box should be say "please select choice answer".
    if(!checked) {
      alert("please select choice answer");
      return;
    }
    // Correct answer
    if(userAnswer === "5 and 4") {
        sum=sum+1;
    }
    // incorrect answer
    else {
       sum+=0;
    }
}
function qthree() {
    var radios = document.getElementsByName("qthree");
    var i = 0, len = radios.length;
    var checked = false;
    var userAnswer;
    
    for( ; i < len; i++ ) {
       if(radios[i].checked) {
         checked = true;
         userAnswer = radios[i].value;
       }
    } 
    // if user click submit button without selecting any option, alert box should be say "please select choice answer".
    if(!checked) {
      alert("please select choice answer");
      return;
    }
    // Correct answer
    if(userAnswer === "4.7 and 3.41") {
        sum=sum+1;
    }
    // incorrect answer
    else {
       sum+=0;
    }
}
function qfour() {
    var radios = document.getElementsByName("qfour");
    var i = 0, len = radios.length;
    var checked = false;
    var userAnswer;
    
    for( ; i < len; i++ ) {
       if(radios[i].checked) {
         checked = true;
         userAnswer = radios[i].value;
       }
    } 
    // if user click submit button without selecting any option, alert box should be say "please select choice answer".
    if(!checked) {
      alert("please select choice answer");
      return;
    }
    // Correct answer
    if(userAnswer === "math.pi") {
        sum=sum+1;
    }
    // incorrect answer
    else {
       sum+=0;
    }
}

function qfive() {
    var radios = document.getElementsByName("qfive");
    var i = 0, len = radios.length;
    var checked = false;
    var userAnswer;
    
    for( ; i < len; i++ ) {
       if(radios[i].checked) {
         checked = true;
         userAnswer = radios[i].value;
       }
    } 
    // if user click submit button without selecting any option, alert box should be say "please select choice answer".
    if(!checked) {
      alert("please select choice answer");
      return;
    }
    // Correct answer
    if(userAnswer === "27") {
        sum=sum+1;
    }
    // incorrect answer
    else {
       sum+=0;
    }
}

function result(){
    var a = document.getElementById("score");
    a.innerHTML="Your Score Is " + sum + " Out Of 5";
    var b = document.getElementById("b");
    b.value=sum;
}