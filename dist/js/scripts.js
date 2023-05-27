document.addEventListener("DOMContentLoaded",function(){var e=document.querySelectorAll(".sidenav"),e=(M.Sidenav.init(e,{edge:"left"}),document.querySelectorAll(".dropdown-trigger")),e=(M.Dropdown.init(e,{aligment:"left",container:"dropdown-navbar",coverTrigger:!1,constrainWidth:!1}),document.querySelectorAll(".js-alert").forEach(function(e){e.querySelector(".js-alert-close")?.addEventListener("click",function(){e.style.display="none"}),setTimeout(function(){e.style.display="none"},8e3)}),document.querySelectorAll(".count-char")),e=(M.CharacterCounter.init(e),document.querySelectorAll(".modal")),e=(M.Modal.init(e,{opacity:.5,inDuration:300,outDuration:200,startingTop:"10%",dismissible:!0,preventScrolling:!0}),document.querySelectorAll(".tooltipped")),e=(M.Tooltip.init(e,{position:"right"}),document.querySelectorAll("select")),e=(M.FormSelect.init(e,{container:document.body}),document.querySelectorAll(".datepicker")),t=null,o=new Date;window.expirationDate&&""!==window.expirationDate&&(t=new Date(expirationDate)),M.Datepicker.init(e,{defaultDate:t,setDefaultDate:!0,minDate:o,autoClose:!0,format:"yyyy-mm-dd",firstDay:1,i18n:{cancel:"Cancelar",done:"Aceptar",months:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],monthsShort:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],weekdaysShort:["Dom","Lun","Mar","Mie","Jue","Vie","Sab"],weekdaysAbbrev:["D","L","M","X","J","V","S"]}});document.querySelector(".js-init-intro")&&introJs().setOptions({nextLabel:"Siguiente",prevLabel:"Anterior",doneLabel:"Hecho",showBullets:!1,dontShowAgain:!0,dontShowAgainLabel:"No volver a mostrar",tooltipClass:"customTooltips",highlightClass:"customLayer",steps:[{element:document.querySelector(".js-first-step"),title:"Hola",intro:"¿Todavía no tienes tablones creados? 😱",position:"right"},{element:document.querySelector("#openModalButton"),title:"Crea tu primer tablón!",intro:"Haciendo click en este botón"}]}).start(),document.querySelector(".js-init-intro-tasks")&&introJs().setOptions({nextLabel:"Siguiente",prevLabel:"Anterior",doneLabel:"Hecho",showBullets:!1,dontShowAgain:!0,dontShowAgainLabel:"No volver a mostrar",tooltipClass:"customTooltips",highlightClass:"customLayer",steps:[{element:document.querySelector(".js-not-tasks"),title:"Hola de nuevo",intro:"¿Todavía no tienes tareas creadas? 😱",position:"right"},{element:document.querySelector(".js-create-tasks"),title:"Crea tu primera tarea!",intro:"Es muy sencillo, solo tienes que añadir el título y más tarde podrás añadir información extra."}]}).start()}),document.addEventListener("DOMContentLoaded",function(){var t=document.querySelectorAll(".pushpin"),o=!1;function e(){var e;o||(e=t[t.length-1])&&(e=e.getBoundingClientRect()).top<=window.innerHeight&&0<=e.bottom&&(t.forEach(function(e){var t=e.getAttribute("data-target"),t=document.getElementById(t),o=t.offsetTop,t=t.offsetTop+t.offsetHeight-e.offsetHeight;new M.Pushpin(e,{top:o,bottom:t})}),o=!0)}window.addEventListener("scroll",e),e(),document.getElementById("dropdown-filter")?.addEventListener("click",function(e){var o;if(e.preventDefault(),e.target.hasAttribute("data-filter"))switch(e.target.getAttribute("data-filter")){case"high":o="high",Array.from(document.querySelectorAll(".js-task-card")).map(e=>{var t=e.getAttribute("data-priority");console.log(t),e.style.display=t===o?"block":"none"}),console.log(e.target),e.target.classList.add("active");break;case"expire_tomorrow":var t=document.getElementsByClassName("tarea");for(let e=0;e<t.length;e++){var n=t[e],r=n.getAttribute("data-fecha-caducidad"),i=new Date;null!==r&&(r=new Date(r),n.style.display=r<i?"block":"none")}}})});