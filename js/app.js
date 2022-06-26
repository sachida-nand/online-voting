const navtoggle = ()=>{
    const nav = document.querySelector('.nav-links');
    const burger = document.querySelector('.burger');
 
 
    burger.addEventListener("click",()=>{
        nav.classList.toggle('active');
        burger.classList.toggle('active');
    })
 }
 navtoggle();