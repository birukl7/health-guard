//The lessthan button next to health guard logo.
const navToggleBtn = document.querySelector('.nav-toggle-js');

const navToggleBtnIcon = document.querySelector('.nav-toggle-js i')

const navUls = document.querySelectorAll('nav ul a span')

const headerJs = document.querySelector('.header-js')


//The Guard logo name
const guardText = document.querySelector('.guard-js')

 navToggleBtn.addEventListener('click', ()=>{
   guardText.classList.toggle('hidden')
   navToggleBtnIcon.classList.toggle('fa-less-than')
   navToggleBtnIcon.classList.toggle('fa-greater-than')
   navUls.forEach((navUl)=>{
      navUl.classList.toggle('hidden');
   })
   headerJs.classList.toggle('w-80')
  //  headerJs.classList.toggle('w-auto')
 })