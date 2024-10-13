// let data = {
//     "id-user": '',
//     "server-user": '',
//     "phone-number": '',
//       // payment: '',
//   };
  
//   const inputs = document.querySelectorAll("#shipping-detail input[data-input]");
  
//   for (let index = 0; index < inputs.length; index++) {
//     const input = inputs[index];
  
//     input.addEventListener("change", function (event) {
//       data[event.target.id] = event.target.value;
  
//       check();
//     });
//     // console.log(input);
//   };
  
//   // const buttons = document.querySelectorAll('#shipping-detail button[data-name]');
  
//   // buttons.forEach(element => {
//   //   element.addEventListener('click', function () {
//   //     const value = this.attributes['data-value'].value;
//   //     const name = this.attributes['data-name'].value;
  
//   //     data[name] = value;
//   //     check();
//   //   });
//   //   // console.log(element);
//   // });
  
//   function check() {
//     console.log(data);
//     const find = Object.values(data).filter((item) => item === "");
  
//     if (find.length == 0) {
//       document.querySelector(
//         "#shipping-detail button[type='submit']"
//       ).disabled = false;
//     }
//   };
  
  
let data = {
  "id-user": '',
  "server-user": '',
  "phone-number": '',
  // "topup-value": '',

};

const inputs = document.querySelectorAll("#shipping-detail input[data-input]");

for (let index = 0; index < inputs.length; index++) {
  const input = inputs[index];

  input.addEventListener("change", function(event) {
      data[event.target.id] = event.target.value;

      check();
  });
  // console.log(input);
};

// const datatopup = document.querySelectorAll('#topup');

// datatopup.forEach(topupItem => {
//     topupItem.addEventListener("change", function(event) {
//         data[event.target.id] = event.target.value; 
//         check();
//     });

// });


function check() {
  console.log(data);
  const find = Object.values(data).filter((item) => item === "");

  const button = document.querySelector("#shipping-detail button[type='submit']");

  if (find.length == 0) {
      button.disabled = false;
      button.classList.add('pointer', 'bg-blue-500'); 
      button.classList.remove( 'bg-slate-800');// Add the classes
  } else {
      button.disabled = true;
      button.classList.remove('pointer', 'bg-blue-500');
      button.classList.add( 'bg-slate-800'); // Remove the classes when disabled
  }
};