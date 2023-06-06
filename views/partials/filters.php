<div id="dropdown-filter" class="fixed-action-btn click-to-toggle <?php if (count($tasks) <=1 ) echo "js-init-intro-filters"; ?>">
    <a class="btn btn-floating btn-large waves-effect waves-light js-filters-btn">
        <i class="large material-icons">filter_list</i>
    </a>
    <ul>
        <li><a href="#!" class="btn-floating fab-tip js-filter-btn" data-filter="not_expire">Sin fecha de vencimiento</a></li>
        <li><a href="#!" class="btn-floating fab-tip js-filter-btn" data-filter="expire_tomorrow">Vence al día siguiente</a></li>
        <li><a href="#!" class="btn-floating fab-tip js-filter-btn" data-filter="high">Prioridad alta</a></li>
        <li><a href="#!" class="btn-floating fab-tip js-filter-btn" data-filter="type" data-type="payment">Pagos pendientes</a></li>
        <li><a href="#!" class="btn-floating fab-tip js-filter-btn" data-filter="type" data-type="birthday">Cumpleaños</a></li>
        <li><a href="#!" class="btn-floating fab-tip js-filter-btn" data-filter="type" data-type="student">Estudios</a></li>
        <li><a href="#!" class="btn-floating fab-tip js-filter-btn" data-filter="type" data-type="work">Trabajo</a></li>
        <li><a href="#!" class="btn-floating fab-tip js-filter-btn" data-filter="type" data-type="house">Casa</a></li>
        <li><a href="#!" class="btn-floating fab-tip js-filter-btn" data-filter="type" data-type="other">Otros</a></li>
        <li><a href="#!" class="btn-floating fab-tip js-filter-btn" data-filter="show_all">Mostrar todas</a></li>
    </ul>
</div>
