<?php
class dt{public object $tz; public object $dt; public object $dt2; public string $diff; public int $ts; public string $date; public string $fm;
function __construct($p='',$o=''){$this->tz($o); $this->dt($p);}
function tz($p=''){$this->tz=new DateTimeZone($p?$p:'Europe/Paris');}
function dt($p=''){$this->dt=new DateTimeImmutable($p,$this->tz);}
function dt2($p=''){$this->dt2=new DateTimeImmutable($p,$this->tz);}
function clone(){$this->dt2=clone $this->dt;}
function setts($p){$this->dt->setTimestamp($p);}
function format($p=''){if(!$p)$p='d-m-Y'; $this->date=$this->dt->format($p);}
function ts2date($p,$o=''){$this->setts($p?$p:ses::$dayx); $this->date=$this->dt->format($o);}
function dig($p='P7D'){$dig=new DateInterval($p); $this->dt2->sub($dig);}
function diff(){$this->diff=$this->dt->diff($this->dt2)->format($this->fm);}
function ts(){$this->ts=$this->dt->getTimestamp();}
function length($p){$r=['y'=>'years','m'=>'months','d'=>'days','h'=>'hours','i'=>'minutes','s'=>'seconds'];
$rb=str_split($p?$p:'ymdhis'); foreach($rb as $k=>$v)$rt[]='%'.$v.' '.$r[$v]; $this->fm=join(' ',$rt);}}
?>
