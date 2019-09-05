<?php

if (!function_exists('getCurrentDay')) {
    /**
     * Return week day
     *
     * @param string $date - YYYY-MM-DD
     * @return String
     */
    function getWeekDay($date = 'now') : String
    {
        # PHP Standard
        # 0 — Sunday - Domingo
        # 1 — Monday - Lunes
        # 2 — Tuesday - Martes
        # 3 — Wednesday - Miercoles
        # 4 — Thursday - Jueves
        # 5 — Friday - Viernes
        # 6 — Saturday - Sabado

        # Oasis Standar
        # 0 - Lunes
        # 1 - Martes
        # 2 - Miercoles
        # 3 - Jueves
        # 4 - Viernes
        # 5 - Sabado
        # 6 - Domingo
        $weekDay = (int) (new DateTime($date))->format('w');
        return  (String) ($weekDay > 0 ? $weekDay - 1 : 6);
    }
}
