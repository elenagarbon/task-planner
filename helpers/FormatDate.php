<?php
    function getFormattedDate($fecha) {
        $days = array("Dom","Lun","Mar","Mie","Jue","Vie","Sáb");
        $months = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $date = strtotime($fecha);

        if(!empty($date)) {
            $day = date("d", $date);
            $month = date("m", $date);
            $year = date("Y", $date);
            $day_of_week = date('w', $date);
            $name_of_day = $days[$day_of_week];
            return $name_of_day . " " . $day . ", " . $months[$month-1] . " " . $year;
        }

        return '';
    }

    function convertDateToDatabaseFormat($original_date) {
        $obj_date = DateTime::createFromFormat('M d, Y', $original_date);
        $date_format = $obj_date->format('Y-m-d');
        return $date_format;
    }
?>