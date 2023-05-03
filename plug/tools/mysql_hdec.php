<?php 
class mysql_hedec{

static function htmlentitydecode(){

"DELIMITER $$ 
    DROP FUNCTION IF EXISTS `HTML_UnEncode`$$ 
    CREATE FUNCTION `HTML_UnEncode`(X VARCHAR(255)) RETURNS VARCHAR(255) CHARSET latin1 DETERMINISTIC
    BEGIN 

    DECLARE TextString VARCHAR(255) ; 
    SET TextString = X ; 

    #quotation mark 
    IF INSTR( X , '&quot;' ) 
    THEN SET TextString = REPLACE(TextString, '&quot;','"') ; 
    END IF ; 

    #apostrophe  
    IF INSTR( X , '&apos;' ) 
    THEN SET TextString = REPLACE(TextString, '&apos;','"') ; 
    END IF ; 

    #ampersand 
    IF INSTR( X , '&amp;' ) 
    THEN SET TextString = REPLACE(TextString, '&amp;','&') ; 
    END IF ; 

    #less-than 
    IF INSTR( X , '&lt;' ) 
    THEN SET TextString = REPLACE(TextString, '&lt;','<') ; 
    END IF ; 

    #greater-than 
    IF INSTR( X , '&gt;' ) 
    THEN SET TextString = REPLACE(TextString, '&gt;','>') ; 
    END IF ; 

    #non-breaking space 
    IF INSTR( X , '&nbsp;' ) 
    THEN SET TextString = REPLACE(TextString, '&nbsp;',' ') ; 
    END IF ; 

    #inverted exclamation mark 
    IF INSTR( X , '&iexcl;' ) 
    THEN SET TextString = REPLACE(TextString, '&iexcl;','¡') ; 
    END IF ; 

    #cent 
    IF INSTR( X , '&cent;' ) 
    THEN SET TextString = REPLACE(TextString, '&cent;','¢') ; 
    END IF ; 

    #pound 
    IF INSTR( X , '&pound;' ) 
    THEN SET TextString = REPLACE(TextString, '&pound;','£') ; 
    END IF ; 

    #currency 
    IF INSTR( X , '&curren;' ) 
    THEN SET TextString = REPLACE(TextString, '&curren;','¤') ; 
    END IF ; 

    #yen 
    IF INSTR( X , '&yen;' ) 
    THEN SET TextString = REPLACE(TextString, '&yen;','¥') ; 
    END IF ; 

    #broken vertical bar 
    IF INSTR( X , '&brvbar;' ) 
    THEN SET TextString = REPLACE(TextString, '&brvbar;','¦') ; 
    END IF ; 

    #section 
    IF INSTR( X , '&sect;' ) 
    THEN SET TextString = REPLACE(TextString, '&sect;','§') ; 
    END IF ; 

    #spacing diaeresis 
    IF INSTR( X , '&uml;' ) 
    THEN SET TextString = REPLACE(TextString, '&uml;','¨') ; 
    END IF ; 

    #copyright 
    IF INSTR( X , '&copy;' ) 
    THEN SET TextString = REPLACE(TextString, '&copy;','©') ; 
    END IF ; 

    #feminine ordinal indicator 
    IF INSTR( X , '&ordf;' ) 
    THEN SET TextString = REPLACE(TextString, '&ordf;','ª') ; 
    END IF ; 

    #angle quotation mark (left) 
    IF INSTR( X , '&laquo;' ) 
    THEN SET TextString = REPLACE(TextString, '&laquo;','«') ; 
    END IF ; 

    #negation 
    IF INSTR( X , '&not;' ) 
    THEN SET TextString = REPLACE(TextString, '&not;','¬') ; 
    END IF ; 

    #soft hyphen 
    IF INSTR( X , '&shy;' ) 
    THEN SET TextString = REPLACE(TextString, '&shy;','­') ; 
    END IF ; 

    #registered trademark 
    IF INSTR( X , '&reg;' ) 
    THEN SET TextString = REPLACE(TextString, '&reg;','®') ; 
    END IF ; 

    #spacing macron 
    IF INSTR( X , '&macr;' ) 
    THEN SET TextString = REPLACE(TextString, '&macr;','¯') ; 
    END IF ; 

    #degree 
    IF INSTR( X , '&deg;' ) 
    THEN SET TextString = REPLACE(TextString, '&deg;','°') ; 
    END IF ; 

    #plus-or-minus  
    IF INSTR( X , '&plusmn;' ) 
    THEN SET TextString = REPLACE(TextString, '&plusmn;','±') ; 
    END IF ; 

    #superscript 2 
    IF INSTR( X , '&sup2;' ) 
    THEN SET TextString = REPLACE(TextString, '&sup2;','²') ; 
    END IF ; 

    #superscript 3 
    IF INSTR( X , '&sup3;' ) 
    THEN SET TextString = REPLACE(TextString, '&sup3;','³') ; 
    END IF ; 

    #spacing acute 
    IF INSTR( X , '&acute;' ) 
    THEN SET TextString = REPLACE(TextString, '&acute;','´') ; 
    END IF ; 

    #micro 
    IF INSTR( X , '&micro;' ) 
    THEN SET TextString = REPLACE(TextString, '&micro;','µ') ; 
    END IF ; 

    #paragraph 
    IF INSTR( X , '&para;' ) 
    THEN SET TextString = REPLACE(TextString, '&para;','¶') ; 
    END IF ; 

    #middle dot 
    IF INSTR( X , '&middot;' ) 
    THEN SET TextString = REPLACE(TextString, '&middot;','·') ; 
    END IF ; 

    #spacing cedilla 
    IF INSTR( X , '&cedil;' ) 
    THEN SET TextString = REPLACE(TextString, '&cedil;','¸') ; 
    END IF ; 

    #superscript 1 
    IF INSTR( X , '&sup1;' ) 
    THEN SET TextString = REPLACE(TextString, '&sup1;','¹') ; 
    END IF ; 

    #masculine ordinal indicator 
    IF INSTR( X , '&ordm;' ) 
    THEN SET TextString = REPLACE(TextString, '&ordm;','º') ; 
    END IF ; 

    #angle quotation mark (right) 
    IF INSTR( X , '&raquo;' ) 
    THEN SET TextString = REPLACE(TextString, '&raquo;','»') ; 
    END IF ; 

    #fraction 1/4 
    IF INSTR( X , '&frac14;' ) 
    THEN SET TextString = REPLACE(TextString, '&frac14;','¼') ; 
    END IF ; 

    #fraction 1/2 
    IF INSTR( X , '&frac12;' ) 
    THEN SET TextString = REPLACE(TextString, '&frac12;','½') ; 
    END IF ; 

    #fraction 3/4 
    IF INSTR( X , '&frac34;' ) 
    THEN SET TextString = REPLACE(TextString, '&frac34;','¾') ; 
    END IF ; 

    #inverted question mark 
    IF INSTR( X , '&iquest;' ) 
    THEN SET TextString = REPLACE(TextString, '&iquest;','¿') ; 
    END IF ; 

    #multiplication 
    IF INSTR( X , '&times;' ) 
    THEN SET TextString = REPLACE(TextString, '&times;','×') ; 
    END IF ; 

    #division 
    IF INSTR( X , '&divide;' ) 
    THEN SET TextString = REPLACE(TextString, '&divide;','÷') ; 
    END IF ; 

    #capital a, grave accent 
    IF INSTR( X , '&Agrave;' ) 
    THEN SET TextString = REPLACE(TextString, '&Agrave;','À') ; 
    END IF ; 

    #capital a, acute accent 
    IF INSTR( X , '&Aacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&Aacute;','Á') ; 
    END IF ; 

    #capital a, circumflex accent 
    IF INSTR( X , '&Acirc;' ) 
    THEN SET TextString = REPLACE(TextString, '&Acirc;','Â') ; 
    END IF ; 

    #capital a, tilde 
    IF INSTR( X , '&Atilde;' ) 
    THEN SET TextString = REPLACE(TextString, '&Atilde;','Ã') ; 
    END IF ; 

    #capital a, umlaut mark 
    IF INSTR( X , '&Auml;' ) 
    THEN SET TextString = REPLACE(TextString, '&Auml;','Ä') ; 
    END IF ; 

    #capital a, ring 
    IF INSTR( X , '&Aring;' ) 
    THEN SET TextString = REPLACE(TextString, '&Aring;','Å') ; 
    END IF ; 

    #capital ae 
    IF INSTR( X , '&AElig;' ) 
    THEN SET TextString = REPLACE(TextString, '&AElig;','Æ') ; 
    END IF ; 

    #capital c, cedilla 
    IF INSTR( X , '&Ccedil;' ) 
    THEN SET TextString = REPLACE(TextString, '&Ccedil;','Ç') ; 
    END IF ; 

    #capital e, grave accent 
    IF INSTR( X , '&Egrave;' ) 
    THEN SET TextString = REPLACE(TextString, '&Egrave;','È') ; 
    END IF ; 

    #capital e, acute accent 
    IF INSTR( X , '&Eacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&Eacute;','É') ; 
    END IF ; 

    #capital e, circumflex accent 
    IF INSTR( X , '&Ecirc;' ) 
    THEN SET TextString = REPLACE(TextString, '&Ecirc;','Ê') ; 
    END IF ; 

    #capital e, umlaut mark 
    IF INSTR( X , '&Euml;' ) 
    THEN SET TextString = REPLACE(TextString, '&Euml;','Ë') ; 
    END IF ; 

    #capital i, grave accent 
    IF INSTR( X , '&Igrave;' ) 
    THEN SET TextString = REPLACE(TextString, '&Igrave;','Ì') ; 
    END IF ; 

    #capital i, acute accent 
    IF INSTR( X , '&Iacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&Iacute;','Í') ; 
    END IF ; 

    #capital i, circumflex accent 
    IF INSTR( X , '&Icirc;' ) 
    THEN SET TextString = REPLACE(TextString, '&Icirc;','Î') ; 
    END IF ; 

    #capital i, umlaut mark 
    IF INSTR( X , '&Iuml;' ) 
    THEN SET TextString = REPLACE(TextString, '&Iuml;','Ï') ; 
    END IF ; 

    #capital eth, Icelandic 
    IF INSTR( X , '&ETH;' ) 
    THEN SET TextString = REPLACE(TextString, '&ETH;','Ð') ; 
    END IF ; 

    #capital n, tilde 
    IF INSTR( X , '&Ntilde;' ) 
    THEN SET TextString = REPLACE(TextString, '&Ntilde;','Ñ') ; 
    END IF ; 

    #capital o, grave accent 
    IF INSTR( X , '&Ograve;' ) 
    THEN SET TextString = REPLACE(TextString, '&Ograve;','Ò') ; 
    END IF ; 

    #capital o, acute accent 
    IF INSTR( X , '&Oacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&Oacute;','Ó') ; 
    END IF ; 

    #capital o, circumflex accent 
    IF INSTR( X , '&Ocirc;' ) 
    THEN SET TextString = REPLACE(TextString, '&Ocirc;','Ô') ; 
    END IF ; 

    #capital o, tilde 
    IF INSTR( X , '&Otilde;' ) 
    THEN SET TextString = REPLACE(TextString, '&Otilde;','Õ') ; 
    END IF ; 

    #capital o, umlaut mark 
    IF INSTR( X , '&Ouml;' ) 
    THEN SET TextString = REPLACE(TextString, '&Ouml;','Ö') ; 
    END IF ; 

    #capital o, slash 
    IF INSTR( X , '&Oslash;' ) 
    THEN SET TextString = REPLACE(TextString, '&Oslash;','Ø') ; 
    END IF ; 

    #capital u, grave accent 
    IF INSTR( X , '&Ugrave;' ) 
    THEN SET TextString = REPLACE(TextString, '&Ugrave;','Ù') ; 
    END IF ; 

    #capital u, acute accent 
    IF INSTR( X , '&Uacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&Uacute;','Ú') ; 
    END IF ; 

    #capital u, circumflex accent 
    IF INSTR( X , '&Ucirc;' ) 
    THEN SET TextString = REPLACE(TextString, '&Ucirc;','Û') ; 
    END IF ; 

    #capital u, umlaut mark 
    IF INSTR( X , '&Uuml;' ) 
    THEN SET TextString = REPLACE(TextString, '&Uuml;','Ü') ; 
    END IF ; 

    #capital y, acute accent 
    IF INSTR( X , '&Yacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&Yacute;','Ý') ; 
    END IF ; 

    #capital THORN, Icelandic 
    IF INSTR( X , '&THORN;' ) 
    THEN SET TextString = REPLACE(TextString, '&THORN;','Þ') ; 
    END IF ; 

    #small sharp s, German 
    IF INSTR( X , '&szlig;' ) 
    THEN SET TextString = REPLACE(TextString, '&szlig;','ß') ; 
    END IF ; 

    #small a, grave accent 
    IF INSTR( X , '&agrave;' ) 
    THEN SET TextString = REPLACE(TextString, '&agrave;','à') ; 
    END IF ; 

    #small a, acute accent 
    IF INSTR( X , '&aacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&aacute;','á') ; 
    END IF ; 

    #small a, circumflex accent 
    IF INSTR( X , '&acirc;' ) 
    THEN SET TextString = REPLACE(TextString, '&acirc;','â') ; 
    END IF ; 

    #small a, tilde 
    IF INSTR( X , '&atilde;' ) 
    THEN SET TextString = REPLACE(TextString, '&atilde;','ã') ; 
    END IF ; 

    #small a, umlaut mark 
    IF INSTR( X , '&auml;' ) 
    THEN SET TextString = REPLACE(TextString, '&auml;','ä') ; 
    END IF ; 

    #small a, ring 
    IF INSTR( X , '&aring;' ) 
    THEN SET TextString = REPLACE(TextString, '&aring;','å') ; 
    END IF ; 

    #small ae 
    IF INSTR( X , '&aelig;' ) 
    THEN SET TextString = REPLACE(TextString, '&aelig;','æ') ; 
    END IF ; 

    #small c, cedilla 
    IF INSTR( X , '&ccedil;' ) 
    THEN SET TextString = REPLACE(TextString, '&ccedil;','ç') ; 
    END IF ; 

    #small e, grave accent 
    IF INSTR( X , '&egrave;' ) 
    THEN SET TextString = REPLACE(TextString, '&egrave;','è') ; 
    END IF ; 

    #small e, acute accent 
    IF INSTR( X , '&eacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&eacute;','é') ; 
    END IF ; 

    #small e, circumflex accent 
    IF INSTR( X , '&ecirc;' ) 
    THEN SET TextString = REPLACE(TextString, '&ecirc;','ê') ; 
    END IF ; 

    #small e, umlaut mark 
    IF INSTR( X , '&euml;' ) 
    THEN SET TextString = REPLACE(TextString, '&euml;','ë') ; 
    END IF ; 

    #small i, grave accent 
    IF INSTR( X , '&igrave;' ) 
    THEN SET TextString = REPLACE(TextString, '&igrave;','ì') ; 
    END IF ; 

    #small i, acute accent 
    IF INSTR( X , '&iacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&iacute;','í') ; 
    END IF ; 

    #small i, circumflex accent 
    IF INSTR( X , '&icirc;' ) 
    THEN SET TextString = REPLACE(TextString, '&icirc;','î') ; 
    END IF ; 

    #small i, umlaut mark 
    IF INSTR( X , '&iuml;' ) 
    THEN SET TextString = REPLACE(TextString, '&iuml;','ï') ; 
    END IF ; 

    #small eth, Icelandic 
    IF INSTR( X , '&eth;' ) 
    THEN SET TextString = REPLACE(TextString, '&eth;','ð') ; 
    END IF ; 

    #small n, tilde 
    IF INSTR( X , '&ntilde;' ) 
    THEN SET TextString = REPLACE(TextString, '&ntilde;','ñ') ; 
    END IF ; 

    #small o, grave accent 
    IF INSTR( X , '&ograve;' ) 
    THEN SET TextString = REPLACE(TextString, '&ograve;','ò') ; 
    END IF ; 

    #small o, acute accent 
    IF INSTR( X , '&oacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&oacute;','ó') ; 
    END IF ; 

    #small o, circumflex accent 
    IF INSTR( X , '&ocirc;' ) 
    THEN SET TextString = REPLACE(TextString, '&ocirc;','ô') ; 
    END IF ; 

    #small o, tilde 
    IF INSTR( X , '&otilde;' ) 
    THEN SET TextString = REPLACE(TextString, '&otilde;','õ') ; 
    END IF ; 

    #small o, umlaut mark 
    IF INSTR( X , '&ouml;' ) 
    THEN SET TextString = REPLACE(TextString, '&ouml;','ö') ; 
    END IF ; 

    #small o, slash 
    IF INSTR( X , '&oslash;' ) 
    THEN SET TextString = REPLACE(TextString, '&oslash;','ø') ; 
    END IF ; 

    #small u, grave accent 
    IF INSTR( X , '&ugrave;' ) 
    THEN SET TextString = REPLACE(TextString, '&ugrave;','ù') ; 
    END IF ; 

    #small u, acute accent 
    IF INSTR( X , '&uacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&uacute;','ú') ; 
    END IF ; 

    #small u, circumflex accent 
    IF INSTR( X , '&ucirc;' ) 
    THEN SET TextString = REPLACE(TextString, '&ucirc;','û') ; 
    END IF ; 

    #small u, umlaut mark 
    IF INSTR( X , '&uuml;' ) 
    THEN SET TextString = REPLACE(TextString, '&uuml;','ü') ; 
    END IF ; 

    #small y, acute accent 
    IF INSTR( X , '&yacute;' ) 
    THEN SET TextString = REPLACE(TextString, '&yacute;','ý') ; 
    END IF ; 

    #small thorn, Icelandic 
    IF INSTR( X , '&thorn;' ) 
    THEN SET TextString = REPLACE(TextString, '&thorn;','þ') ; 
    END IF ; 

    #small y, umlaut mark 
    IF INSTR( X , '&yuml;' ) 
    THEN SET TextString = REPLACE(TextString, '&yuml;','ÿ') ; 
    END IF ; 

    RETURN TextString ; 

    END$$ 

    DELIMITER ;
"

sql::qr('SELECT HTML_UnEncode(txt) from '.ses('qda').'',1);

}

static function menu($p){
$ret=inputb('fto',$p,18,'directory');
$ret.=lj('popbt','fut_futf,call_fto_',picto('ok'));
return $ret;}

static function home($p){
$bt=self::menu($p); $ret='';
if($p)$ret=self::call($p);
return $bt.divd('fut',$ret);}
}
?>