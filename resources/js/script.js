document.addEventListener("DOMContentLoaded", function () {
  /** Sidenav */
  var elemsNav = document.querySelectorAll(".sidenav");
  var instances = M.Sidenav.init(elemsNav, {
    edge: "left",
  });

  /** Dropdown navbar */
  var elemsDrop = document.querySelectorAll(".dropdown-trigger");
  var instances = M.Dropdown.init(elemsDrop, {
    aligment: "left",
    container: "dropdown-navbar",
    coverTrigger: false,
    constrainWidth: false,
  });

  /** Alerts */
  const alerts = document.querySelectorAll(".js-alert");

  alerts.forEach(function (alert) {
    const closeButton = alert.querySelector(".js-alert-close");
    closeButton?.addEventListener("click", function () {
      alert.style.display = "none";
    });
    setTimeout(function () {
      alert.style.display = "none";
    }, 8000);
  });

  var elemsInput = document.querySelectorAll(".count-char");
  var instances = M.CharacterCounter.init(elemsInput);

  /** Modal crear tablón */
  var openModalButton = document.querySelectorAll(".modal");
  var instances = M.Modal.init(openModalButton, {
    opacity: 0.5,
    inDuration: 300,
    outDuration: 200,
    startingTop: "10%",
    dismissible: true,
    preventScrolling: true,
  });

  /** Tooltips info */
  var elemsTooltip = document.querySelectorAll(".tooltipped");
  var instances = M.Tooltip.init(elemsTooltip, {
    position: "right",
  });

  /** Selects */
  var elemsSelect = document.querySelectorAll("select");
  var instances = M.FormSelect.init(elemsSelect, {
    container: document.body,
  });

  /** Datepicker */
  var elemsDatepicker = document.querySelectorAll(".datepicker");
  var selectedDate = null;
  var currentDate = new Date();

  if (window.expirationDate && window.expirationDate !== "") {
    selectedDate = new Date(expirationDate);
  }

  var instances = M.Datepicker.init(elemsDatepicker, {
    defaultDate: selectedDate,
    setDefaultDate: true,
    minDate: currentDate,
    autoClose: true,
    firstDay: 1,
    i18n: {
      cancel: "Cancelar",
      done: "Aceptar",
      months: [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
      ],
      monthsShort: [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic",
      ],
      weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
      weekdaysAbbrev: ["D", "L", "M", "X", "J", "V", "S"],
    },
  });

  /** Intro.js */
  if (document.querySelector(".js-init-intro") && window.innerWidth > 1248) {
    let introBoards = introJs();
    introBoards.setOptions({
        nextLabel: "Siguiente",
        prevLabel: "Anterior",
        doneLabel: "Hecho",
        showBullets: false,
        dontShowAgain: true,
        dontShowAgainLabel: "No volver a mostrar",
        tooltipClass: "customTooltips",
        highlightClass: "customLayer",
        steps: [
          {
            element: document.querySelector(".js-first-step"),
            title: "Hola",
            intro: "¿Todavía no tienes tablones creados? 😱",
            position: "right",
          },
          {
            element: document.querySelector("#openModalButton"),
            title: "Crea tu primer tablón!",
            intro: "Haciendo click en este botón",
          },
        ],
      })
      introBoards.start();
  }

  if (document.querySelector(".js-init-intro-tasks") && window.innerWidth > 1248) {
    let introTasks = introJs();
    introTasks.setOptions({
        nextLabel: "Siguiente",
        prevLabel: "Anterior",
        doneLabel: "Hecho",
        showBullets: false,
        dontShowAgain: true,
        dontShowAgainLabel: "No volver a mostrar",
        tooltipClass: "customTooltips",
        highlightClass: "customLayer",
        steps: [
          {
            element: document.querySelector(".js-not-tasks"),
            title: "Hola de nuevo",
            intro: "¿Todavía no tienes tareas creadas? 😱",
            position: "right",
          },
          {
            element: document.querySelector(".js-create-tasks"),
            title: "Crea tu primera tarea!",
            intro:
              "Es muy sencillo, solo tienes que añadir el título y más tarde podrás añadir información extra.",
          },
        ],
      })
      introTasks.start();
  }

  if (document.querySelector(".js-init-intro-filters") && window.innerWidth > 1248) {
    let introFilters = introJs();
    introFilters.setOptions({
        nextLabel: "Siguiente",
        prevLabel: "Anterior",
        doneLabel: "Hecho",
        showBullets: false,
        dontShowAgain: true,
        dontShowAgainLabel: "No volver a mostrar",
        tooltipClass: "customTooltips",
        highlightClass: "customLayer",
        steps: [
          {
            element: document.querySelector(".js-filters-btn"),
            title: "Ya puedes filtrar tus tareas",
            intro: "Haz click aquí y podrás ver las tareas que estén a punto de vencer o que cumpleaños tienes pendientes. Entre otro filtros.",
            position: "left",
          },
        ],
      })
      introFilters.start();
  }

  /** Botón flotante */
  var elemOptionsCreate = document.querySelectorAll(".fixed-action-btn");
  var instances = M.FloatingActionButton.init(elemOptionsCreate, {
    direction: "top",
    hoverEnabled: false,
  });


  /** Pushpine materialize  */
  var pushpinDemoNavs = document.querySelectorAll(".pushpin");
  var initialized = false;

  function initPushpins() {
    pushpinDemoNavs.forEach(function (pushpinDemoNav) {
      var targetId = pushpinDemoNav.getAttribute("data-target");
      var target = document.getElementById(targetId);
      var topOffset = target.offsetTop;
      var bottomOffset =
        target.offsetTop + target.offsetHeight - pushpinDemoNav.offsetHeight;

      new M.Pushpin(pushpinDemoNav, {
        top: topOffset,
        bottom: bottomOffset,
      });
    });
  }

  function checkScrollPosition() {
    if (!initialized) {
      var lastPushpin = pushpinDemoNavs[pushpinDemoNavs.length - 1];
      if (lastPushpin) {
        var lastPushpinRect = lastPushpin.getBoundingClientRect();
        if (
          lastPushpinRect.top <= window.innerHeight &&
          lastPushpinRect.bottom >= 0
        ) {
          initPushpins();
          initialized = true;
        }
      }
    }
  }

  window.addEventListener("scroll", checkScrollPosition);
  checkScrollPosition();

  /** Filter tasks  */
  const dropdown = document.getElementById("dropdown-filter");

  dropdown?.addEventListener("click", function (event) {
    event.preventDefault();

    const filterButtons = Array.from(document.querySelectorAll(".js-filter-btn"));

    filterButtons.forEach((button) => {
      button.classList.remove("active");
    });

    switch (event.target.getAttribute("data-filter")) {
      case "high":
        filterTasksByPriority("high");
        break;
      case "expire_tomorrow":
        filterTasksByExpiry();
        break;
      case "not_expire":
        filterByNoExpiry();
        break;
      case "show_all":
        showAllTasks();
        break;
      case "type":
        filterTasksByType(event.target.getAttribute("data-type"));
        break;
      default:
        break;
    }

  });

  const tasks  = Array.from(document.querySelectorAll(".js-task-card"));

  function filterTasksByPriority(priority) {
    tasks.forEach((task) => {
      const priorityTask = task.getAttribute("data-priority");
      task.style.display = priorityTask === priority ? "block" : "none";
    });
  }

  function filterTasksByExpiry() {
    const currentDate  = new Date();

    tasks.forEach((task) => {
      const expiryDate = task.getAttribute("data-exp");
      const expirationDate = new Date(expiryDate);

      if (expiryDate && expirationDate <= getNextDay(currentDate )) {
        task.style.display = "block";
      } else {
        task.style.display = "none";
      }
    });
  }

  function getNextDay(date) {
    return new Date(date.getTime() + (24 * 60 * 60 * 1000));
  }

  function filterByNoExpiry() {
    tasks.forEach((task) => {
      const expiryDate = task.getAttribute("data-exp");

      if (!expiryDate) {
        task.style.display = "block";
      } else {
        task.style.display = "none";
      }
    });
  }

  function showAllTasks() {
    tasks.forEach((task) => {
      task.style.display = "block";
    });
  }

  function filterTasksByType(type) {
    tasks.forEach((task) => {
      const taskType = task.getAttribute("data-type");
      task.style.display = type === "show_all" || taskType === type ? "block" : "none";
    });
  }

  /** Scrollable: Drag and Drop */
  const listsTask = document.querySelectorAll('.js-column');
  const items = document.querySelectorAll('.js-task');
  let dragItem = null;

  items.forEach(item => {
    item.addEventListener('dragstart', dragStart);
    item.addEventListener('dragend', dragEnd);
  });

  listsTask.forEach(list => {
    list.addEventListener('dragover', dragOver);
    list.addEventListener('drop', dragDrop);
    new Sortable(list, {
      group: "shared",
      animation: 150,
      ghostClass: "transparent"
    });
  });

  function dragStart() {
    dragItem = this;
    setTimeout(() => this.className = 'invisible', 0);
  }

  function dragEnd() {
    this.className = 'item';
    dragItem = null;
  }

  function dragOver(e) {
    e.preventDefault();
  }

  function dragDrop() {
    this.append(dragItem);

    const newStatus = this.dataset.status;
    const taskId = dragItem.dataset.taskid;

    const url = "https://taskplannerpro.000webhostapp.com/task-planner/controllers/update_status.php";
    const data = {
      task_id: taskId,
      status: newStatus
    };

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) {
          console.log("Estado de la tarea actualizado correctamente.");
        } else {
          console.log("Error al actualizar el estado de la tarea.");
        }
      })
      .catch(error => {
        console.log("Error en la solicitud: " + error.message);
      });
  }
});

