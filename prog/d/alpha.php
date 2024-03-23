<?php 
class alpha{
static $a='alpha';
static $cb='mdl';

//αβγδεζηθικλμνξοπρςστυφχψω

static function js(){return '';}

static function δ($π,$σ){
$φ=$π;
return $φ;}

static function γ($π,$σ,$ρ=[]){
$π=$ρ[0]??$π;//[$π,$σ]=prmp($π,$σ,$ρ);
$φ=self::δ($π,$σ);
return $φ;}

static function β($π,$σ){$ι='inp';
$☺=self::$cb.'_alpha,γ_'.$ι.'_3__'.$σ;
$φ=inputj($ι,$π,$☺);
$φ.=lj('',$☺,picto('ok')).' ';
return $φ;}

static function home($π,$σ){
$bt=self::β($π,$σ);
$φ=self::γ($π,$σ);
return $bt.divd(self::$cb,$φ);}
}
?>