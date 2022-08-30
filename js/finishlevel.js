const fill_input = document.querySelector('#player_answer');
const question = document.querySelector('.question');
const validation = document.querySelector('.validation');
const submitbtn = document.querySelector('.play-submit');

if(question.innerText == "Good Job, You Completed the Hunt. You're Done."){
    fill_input.remove();
    submitbtn.remove();
    validation.innerText = "Congratulations! You Completed the Hunt.";
}

// //Close Play Btn
// var end_date = new Date("August 10, 2022 23:59:59").getTime();
// var count_down_date = new Date("August 8, 2022 23:59:59").getTime();
// var x = function(){
//     var now = new Date().getTime();
//     var difference = count_down_date - now;
//     var end_difference = count_down_date - end_date;

//     if (difference < 0){
//         clearInterval(x);
//         document.getElementById('countdown'.innerText = 'THE HUNT BEGINS');
//     }else{
//         fill_input.remove();
//         document.querySelector('.answer').remove();
//         document.querySelector('.image').remove();
//         validation.innerText = "The Hunt is Yet to Begin!";
//         question.innerText = "Have Patience Hunters!";
//         submitbtn.remove();
//     }
//     // if (end_difference > 0){
//     //     document.querySelector('.image').remove();
//     //     submitbtn.remove();
//     //     fill_input.remove();
//     //     validation.innerText = "The Hunt Is Over, ";u
//     //     question.innerText = "The Hunt for BetaTest has ended, go home weary traveller. We shall see you next year. ";
//     // }
// };

// x();