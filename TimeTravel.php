<?php


class TimeTravel
{
    /**
     * @var DateTime
     */
    private $start;

    /**
     * @var DateTime
     */
    private $end;

    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getTravelInfo()
    {
        $intervalTravel = ($this->start)->diff($this->end);
        return $intervalTravel->format("Il y a %Y années, %M mois, %D jours, %H heures, %i minutes et %s secondes entre les deux dates.");
    }

    public function findDate(DateInterval $interval)
    {
        $pastDate = new DateTime("1985-12-31");
        $pastDate->sub($interval);
        return $pastDate->format('d m Y');
    }

    public function backToFutureStepByStep(DatePeriod $step)
    {
        $returnDateList = [];
        foreach ($step as $dateStep){
            $returnDateList[] = $dateStep->format("d M Y  -  H:i:s");
        }
        return $returnDateList;
    }

}