<?php

/**
 * Trait responsável por controlar as operações com data e hora.
 * @author José Carlos (josecarlosgdacosta@gmail.com)
 * @package ZDateHandler
 * @since 10/11/2014
 * @version 0.1
 */
class ZDateHandler {

    /**
     * Método que retorna o nome do mês por extenso.
     * @param $monthNumber: Número do mês.
     * bool|null|string
     */
    private function _getMonthName($monthNumber) {

        if (!filter_var($monthNumber, FILTER_VALIDATE_INT)) {

            return false;

        }

        $arrMonths = [
            1=>"Janeiro",
            2=>"Fevereiro",
            3=>"Março",
            4=>"Abril",
            5=>"Maio",
            6=>"Junho",
            7=>"Julho",
            8=>"Agosto",
            9=>"Setembro",
            10=>"Outubro",
            11=>"Novembro",
            12=>"Dezembro"
        ];

        if (!array_key_exists($monthNumber, $arrMonths)) {
            return false;
        }

        return $arrMonths[$monthNumber];

    }

    /**
     * Método que retorna a data atual.
     * @return string: Data atual no formato dd/mm/YYYY.
     * @throws \Exception
     */
    public function getCurrentDate($extensive=false) {

        try {

            $dateTime = new \DateTime();

            if ($extensive) {

                $monthName = $this->_getMonthName($dateTime->format(("m")));

                return $dateTime->format("d") . " de " . $monthName . " de " . $dateTime->format("Y");

            }

            return $dateTime->format("d/m/Y");

        } catch (\Exception $e) {

            throw new \Exception("Houve um erro ao obter a data atual: " . $e->getMessage());

        }

    }

    /**
     * Método que retorna o horário atual.
     * @return string: Horário no formato '00:00:00'.
     * @throws \Exception
     */
    public function getCurrentTime() {

        try {

            $dateTime = new \DateTime();
            return $dateTime->format("H:i:s");

        } catch (\Exception $e) {

            throw new \Exception("Houve um erro ao obter o horário atual: " . $e->getMessage());

        }

    }

    /**
     * Método que retorna a diferença entre duas datas.
     * @param $initDate: Data inicial no formato 'dd/mm/YYYY'.
     * @param $finalDate: Data final no formato 'dd/mm/YYYY'.
     * @param $diffType: Tipo da diferença. (Ex.: em anos, em meses, em dias)
     * @return bool|int|mixed
     * @throws \Exception
     */
    public function getDateInterval($initDate, $finalDate, $diffType) {

        try {

            $initDateTime = \DateTime::createFromFormat("d/m/Y", $initDate);
            $finalDateTime = \DateTime::createFromFormat("d/m/Y", $finalDate);

            $dateDiff = $initDateTime->diff($finalDateTime);

            switch ($diffType) {

                case "years":
                    return $dateDiff->y;

                case "months":
                    $totalMonths = ($dateDiff->y * 12) + $dateDiff->m;
                    return $totalMonths;

                case "days":
                    return $dateDiff->days;

                default:
                    return false;

            }

        } catch (\Exception $e) {

            throw new \Exception("Houve um erro ao manipular as datas: " . $e->getMessage());

        }

    }

}

?>
