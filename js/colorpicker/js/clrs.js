
function clrs(){
	for(i=1;i<8;i++){
		$("#colorpickerField"+i).ColorPicker({
			onSubmit:
				function(hsb,hex,rgb,el){
					$(el).val(hex);
					$(el).ColorPickerHide();
					$("#colorpick"+i+" div").css("backgroundColor","#"+hex);
					SaveClr(10);},
			onBeforeShow: function(){ $(this).ColorPickerSetColor(this.value);},
			onShow: function(colpkr){ $(colpkr).fadeIn(200); return false;},
			onHide: function(colpkr){ $(colpkr).fadeOut(200); return false;}});
	}
}

(function($){var initLayout=function(){clrs()};
EYE.register(initLayout,"init");})(jQuery);

function SaveClr(nb){var clrs="/"; for(i=1;i<=nb;i++){
var va=document.getElementById("colorpickerField"+i).value; clrs+=va+"/";}
bjcall("clrreponse|sty,saveclr||"+clrs);
var x=setTimeout(Close("clrreponse"),3000);}