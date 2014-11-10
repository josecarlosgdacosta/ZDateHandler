<?php

/**
 * Trait responsável por controlar as operações com data e hora.
 * @author José Carlos (josecarlosgdacosta@gmail.com)
 * @package application\utils
 * @since 29/07/2014
 * @version 0.1
 */
trait ZDateHandler {

    /**
     * Método que retorna o nome do mês por extenso.
     * @param $monthNumber: Número do mês.
     * bool|null|string
     */
    private function _getMonthName($monthNumber) {

        if (!filter_var($monthNumber, FILTER_VALIDATE_INT)) {

            return false;

        }

        $monthName = null;

        switch ($monthNumber) {

            case 1:
                $monthName = "Janeiro";
                break;

            case 2:
                $monthName = "Fevereiro";
                break;

            case 3:
                $monthName = "Março";
                break;

            case 4:
                $monthName = "Abril";
                break;

            case 5:
                $monthName = "Maio";
                break;

            case 6:
                $monthName = "Junho";
                break;

            case 7:
                $monthName = "Julho";
                break;

            case 8:
                $monthName = "Agosto";
                break;

            case 9:
                $monthName = "Setembro";
                break;

            case 10:
                $monthName = "Outubro";
                break;

            case 11:
                $monthName = "Novembro";
                break;

            case 12:
                $monthName = "Dezembro";
                break;

            default:
                return false;

        }

        return $monthName;

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

                $monthName = $this->getMonthName($dateTime->format(("m")));

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
