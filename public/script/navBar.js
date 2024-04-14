const _navToggleBtn = document.querySelector('.nav-toggle-js');

const navToggleBtnIcon = document.querySelector('.nav-toggle-js i')

const navUls = document.querySelectorAll('nav ul a span')

const headerJs = document.querySelector('.header-js')

const logoJs = document.querySelector('.js-logo')
const bodyMain = document.querySelector('.js-main-container')
const hamburger = document.querySelector('#hamburger');
const navBar = document.querySelector('#nav-bar');

let isToggled = false;

bodyMain.addEventListener('click', ()=>{
   hamburger.classList.add('h-1')
   hamburger.classList.remove('h-0')
   hamburger.classList.remove('after:rotate-45')
   hamburger.classList.remove('after:-translate-y-2')
   hamburger.classList.remove('before:-rotate-45')
   hamburger.classList.remove('before:translate-y-3')

   // navBar.classList.toggle('p-5');
   navBar.classList.remove('left-0')
   navBar.classList.add('left-full')
})

//The Guard logo name
const guardText = document.querySelector('.guard-js')

 _navToggleBtn.addEventListener('click', ()=>{
   guardText.classList.toggle('hidden')
   navToggleBtnIcon.classList.toggle('fa-less-than')
   navToggleBtnIcon.classList.toggle('fa-greater-than')
   logoJs.classList.toggle('w-60')
   logoJs.classList.toggle('w-auto')
   navUls.forEach((navUl)=>{
      navUl.classList.toggle('hidden');
   })
   headerJs.classList.toggle('w-full')
   headerJs.classList.toggle('md:w-80')
   bodyMain.classList.toggle('pl-custom-5')
   bodyMain.classList.toggle('pl-custom-6')
   if(!isToggled){
      bodyMain.style.paddingLeft = '114px';
      // bodyMain.classList.remove('pl-custom-5');
      // bodyMain.classList.add('pl-custom-6');
      isToggled = !isToggled;
   } else{
      bodyMain.style.paddingLeft = '310px';
      // bodyMain.classList.remove('pl-custom-6');
      // bodyMain.classList.add('pl-custom-5');
      isToggled = !isToggled;
   }
  //  headerJs.classList.toggle('w-auto')
 })
 

 const toggleMobileNav = () => {
   hamburger.classList.toggle('h-1')
   hamburger.classList.toggle('h-0')
   hamburger.classList.toggle('after:rotate-45')
   hamburger.classList.toggle('after:-translate-y-2')
   hamburger.classList.toggle('before:-rotate-45')
   hamburger.classList.toggle('before:translate-y-3')

   // navBar.classList.toggle('p-5');
   navBar.classList.toggle('left-0')
   navBar.classList.toggle('left-full')
   // navBar.classList.toggle('w-80');
   // navBar.classList.toggle('w-0');
 };


//  const generalNavs = document.querySelectorAll('#general-nav a');
//  console.log(generalNavs)

//  generalNavs.forEach((generalNav)=>{
//    generalNav.addEventListener('click',(e)=>{
//       generalNavs.forEach((generalNavig)=>{
//          console.log(generalNavig)
//          generalNavig.classList.remove('bg-custom-vlgray')
//       })
//       e.target.classList.add('bg-custom-vlgray')
//    })
//  })