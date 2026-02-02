//utils

var slctd=false;

function setSelectionRange(input,selectionStart,selectionEnd){
if(input.setSelectionRange){input.focus();
	input.setSelectionRange(selectionStart,selectionEnd);}
else if(input.createTextRange){
	var range=input.createTextRange();
	range.collapse(true);
	range.moveEnd('character',selectionEnd);
	range.moveStart('character',selectionStart);
	range.select();}}

function storeCaret(textEl){//insert at Caret position
if(textEl.createTextRange)textEl.caretPos=document.selection.createRange().duplicate();}

function findfunc(e,o){var t=e.innerHTML;//codev
var st=e.selectionStart; var end=e.selectionEnd; var lgth=e.textLength;
var p=(e.value).substring(st,end); if(st==end)return;
ajaxcall('results','codeview,findfunc',[p],[],'21');}
//ajaxcall('results','coremap,coremap',[p],[],'14');

function detctfunc(e){var t=e.innerHTML;
var t=strreplace('&amp;','&',t);var t=strreplace('&lt;','<',t);var t=strreplace('&gt;','>',t);
var st=e.selectionStart; var one=t.substring(0,st); var two=t.substr(st);
var ptr=[' ','=','(',')',"'",'"','.','[',']','&','|','-','+','/','*',',','{','}'];
var first=0; var last=two.length; var f2=[]; var l2=[];
for(i=0;i<ptr.length;i++){
	var f2=one.lastIndexOf(ptr[i]); if(f2>first)var first=f2;
	var l2=two.indexOf(ptr[i]); if(l2!=-1 && l2<last)var last=l2;}
var pa=one.substr(first); var pb=two.substring(0,last); var p=pa+pb;
//alert(char+' - '+first+' - '+pa); //alert(char+' - '+last+' - '+pb);
var p=(e.value).substring(first+1,st+last); jumphtml('results',p);}
//ajaxcall('results','dev,findev',[p],[],'');

//slctdropmenu
function callSaveJ(tg,e,restore){
SaveJ(tg+e.options[e.selectedIndex].value);
if(restore)e.selectedIndex=0;}

function embedslct(opn,clo,id,act,acm){var id=id?id:'txtarea';
var txtarea=getbyid(id); txtarea.focus();
donotinsert=false; slctd=false;
if(txtarea.selectionEnd && (txtarea.selectionEnd-txtarea.selectionStart>0)){
	slctd=mozWrap(opn,clo,id,act,acm); return slctd;}}
//else insert(opn+clo,id);

//from http://www.massless.org/mozedit/
function mozWrap(opn,clo,id,action,acm){var id=id?id:'txtarea';
var s1=''; var s2=''; var s3='';
var txtarea=getbyid(id); var vl=1;//
if(typeof txtarea.value==='undefined')var vl=0;
var selLength=txtarea.textLength;
var selStart=txtarea.selectionStart;
var selEnd=txtarea.selectionEnd;
var selTop=txtarea.scrollTop;
if(selEnd==1||selEnd==2)selEnd=selLength;
if(vl)var truend=(txtarea.value).substring(selEnd-1,selEnd);
if(action=='del')truend='';
if(selEnd-selStart>0 && truend==' '){selEnd=selEnd-1; truend=(txtarea.value).substring(selEnd-1,selEnd);}
if(selEnd-selStart>0 && truend=="\n"){selEnd=selEnd-1; truend=(txtarea.value).substring(selEnd-2,selEnd);}
if(vl)var s1=(txtarea.value).substring(0,selStart);
	else var s1=(txtarea.innerHTML).substring(0,selStart);
if(vl)var s2=(txtarea.value).substring(selStart,selEnd);
if(action=='del' && !s2){s1=s1.substring(0,selStart-1); selStart-=1;}
if(vl)var s3=(txtarea.value).substring(selEnd,selLength);
if(action=="clean_n"){
	if(s2.indexOf("\n\n")!=-1)var s2=s2.split("\n\n").join("\n");
	else var s2=s2.split("\n").join(" ");}
else if(action=="clean_mail"){var s2=s2.split("\n\n").join("#br#");
		var s2=s2.split("\n").join(" "); var s2=s2.split("#br#").join("\n\n");}
else if(action=="lowercase"){var s2=s2[0].toUpperCase()+s2.substring(1).toLowerCase();}
else if(action=="mktable"){var s2=s2.split("\n").join("¬\n"); s2=s2.split(",").join("|");
	s2='['+s2+':table]';}
else if(action=="delconn"){
	if(s2){var s2=connectors(s2,acm,'delconn');
		//if(acm=='list')s2=strreplace('|',"\n",s2);
		if(acm=='table')s2=strreplace(['|','¬'],["\t","\n"],s2);}
	else if(acm){var s1=s1+s3; s3=''; var s1=connectors(s1,acm,'delconn');}
	else{
		if(s1)var na=find_next(s1,0); if(s3)var nb=find_next(s3,1);
		var s2=s1.substr(na); var s1=s1.substr(0,na);
		var s2=s2+s3.substr(0,nb); var s3=s3.substr(nb);
		//alert("-s1="+s1+"\n-s2="+s2+"\n-s3="+s3);
		var s2=connectors(s2,'','delconn');}}
else if(action=='addopt'){//imgcapt
	var firstchar=(txtarea.value).substring(selStart,selStart+1);
	var lastchar=(txtarea.value).substring(selEnd-1,selEnd);
	if(firstchar=='['){selStart=selStart+1; s2=s2.substring(0,s2.length-1);}
	if(lastchar==']'){selEnd=selEnd-1; s3=']'+s3;}
	//var legend=prompt('legend'); clo='|'+legend+clo;
	var clo='|'+acm+clo;}
//else if(action=='editcl'){}
else if(action=='repl'){var s2=opn; opn='';}
else if(action=='del')var s2='';
if(vl)txtarea.value=s1+opn+s2+clo+s3;
else txtarea.innerHTML=s1+opn+s2+clo+s3;
selFin=selEnd+clo.length+opn.length;
if(action=='del'||action=='delconn')selFin=selStart; if(!s2)selStart=selFin;
window.setSelectionRange(txtarea,selStart,selFin);//selStart
txtarea.scrollTop=selTop;
txtarea.focus();
return s2;}

//conn
function find_next(d,p){//alert(d+p);
if(p)var n=d.indexOf("]")+1; else var n=d.lastIndexOf("[");
if(n==-1)return 0;//p?d.length:
var d1=d.substr(0,n); var d2=d.substr(n);
if(p)var n1=substr_count(d1,'['); else var n1=substr_count(d2,']');
	for(var ia=0;ia<n1;ia++){//not global
		if(p)var n=n+find_next(d2,p); else var n=find_next(d1,p);}
return n;}

function delconn(d,cn){
var na=d.lastIndexOf(':'); var nb=d.lastIndexOf('|'); var xt=d.substr(na+1);
if((d.substr(nb)).indexOf(']')!=-1)nb=-1;
if(xt==cn||!cn){
	if(d.substr(0,4)=='http' && !cn){
		if(nb!=-1)return d.substr(nb+1)+' ['+d.substr(0,nb)+']'; else return d;}
	else if(na!=-1){d=d.substr(0,na);if(nb!=-1)d=d.substr(0,nb);}
	else if(nb!=-1)d=d.substr(0,nb);
	if(cn=='list')d=strreplace('|',"\n",d);}
else d='['+d+']';
return d;}

function connectors(msg,cn,act){
var deb=''; var mid=''; var end='';
var ini=msg.indexOf("[");
if(ini!=-1){var deb=msg.substr(0,ini);
var msb=msg.substr(ini+1); var out=msb.indexOf("]");
if(out!=-1){var msb=msg.substr(ini+1,out);
	var nb_in=substr_count(msb,"[");
	if(nb_in>=1){
		for(var ia=1;ia<=nb_in;ia++){
			var out_tmp=ini+1+out+1;
			var msb=msg.substr(out_tmp);
			var out=out+msb.indexOf("]")+1;
			var msb=msg.substr(ini+1,out);
			var nb_in=substr_count(msb,"[");}
		var mid=msg.substr(ini+1,out);
		var mid=connectors(mid,cn,act);}
	else var mid=msb;
	if(act=='delconn')var mid=delconn(mid,cn);
	var end=msg.substr(ini+1+out+1);
	var end=connectors(end,cn,act);}
else var end=msg.substr(ini+1);}
else var end=msg;
return deb+mid+end;}

//embed
function embed(val,bid,cid,aid){//cid='txtarea',aid=target
var slctd=embedslct('','',cid);
if(val=='video' && slctd)ajaxcall('socket','video,extractid',[],[slctd],'repl');
else if(val=='url' && slctd)togglebub('mc,conns__'+bid+'_'+val+'_'+ajx(slctd)+'_'+aid+'_'+cid);
else if(val=='img' && slctd){
	//if(slctd.indexOf('|')==-1)slctd=embedslct('',':figure',cid,'addopt');//via alert
	if(slctd.indexOf('|')==-1)togglebub('mc,conns__'+bid+'_imgcapt_'+ajx(slctd)+'_'+aid+'_'+cid);//imgcapt
	}
else if(val=='nh' && slctd){var doc=getbyid(cid).value;
	if(doc.indexOf('['+slctd+':nh]')!=-1)slctd=embedslct('[',':nb]');
	else slctd=embedslct('[',':nh]',cid);}
else slctd=embedslct('[',':'+val+']',cid);
if(!slctd)togglebub('mc,conns__'+bid+'_'+ajx(val)+'__'+aid+'_'+cid);
//if(!slctd)tog_j(bid+'prg_mc,conns__'+bid+'_'+ajx(val)+'__'+aid+'_'+cid);
}

function saveb64(ob,id){//var ob=getbyid('imgarea');
if(ob.innerHTML)ajaxcall('txtarea','artim,b64imup',[id],[ob.innerHTML],'6');}//repl

function embedopt(val,opt,cid){
embedslct('[',(opt?'|'+opt:'')+':'+val+']',cid);}

function captslct(val){
var txt=getbyid('txtarea'); txt.focus(); var s2='';
var s2=(txt.value).substring(txt.selectionStart,txt.selectionEnd);
if(!s2)var s2=txt.value;
ajaxcall('popup','mc,conns',[val,s2],[],'');}

function edtmode(rid,id){var a=activeid('edtmd');
if(a)SaveJ(rid+'_mc,wygedt_txtarea_15_'+id+'_txtarea');
else SaveJ(rid+'_mc,wygoff_txtarea_15_'+id+'_txtarea');}

function autoslct(val){var id=val?val:'txtarea';
var txt=getbyid(id); txt.focus();
var s1=(txt.value).substring(0,txt.selectionStart); var sl=parseInt(s1.length);
var s3=(txt.value).substring(txt.selectionEnd);
var selStart=s1.lastIndexOf("["); var selFin=s3.indexOf("]")+1+sl;
window.setSelectionRange(txt,selStart,selFin);}

function embedurl(id,rid){
var p=getbyid('url').value; if(!p)return;
//var slctd=embedslct('','',rid,'');
slctd=embedslct('['+p,']',rid,'repl');
if(slctd==undefined)insert('['+p+']');}

function embedart(id,rid){
var val=getbyid('art').value; //var o=getbyid('cnp').value;
if(!val)embedslct('[',':art]',rid);
else{var slctd=embedslct('['+val+'|',':art]',rid);
	if(slctd==undefined)insert('['+val+':art]');}}

function embedcss(conn){
var val=getbyid('cnn').value;
if(val=="")return;
else embedslct('[','|'+val+':'+conn+']');}

function embedinp(id,conn,cid,typ){//use acm as content
var p=getbyid(id).value; if(!p)return;
embedslct('',conn,cid,typ,p);}

function insert_conn(cnn){
var va=getbyid('cnv').value;
var vp=getbyid('cnp').value;
if(va.indexOf('vk.com/clips')!==-1){var d=strfrom(va,'?z=clip'); var r=d.split('_');
	var oid=r[0].substr(7); var id=r[1];
	va='https://vk.com/video_ext.php?oid=-'+oid+'&id='+id+'&autoplay=0';}
if(va.indexOf('odysee.com/@')!==-1){va=va.replace('/@','/$/embed/@'); va=strto(va,':a');}
if(va.indexOf('rutube.ru/video')!==-1){va=va.replace('video/','play/embed/'); va=va.replace('/?r=plemwd','');}
if(vp!='')val=va+'|'+vp; else val=va;
if(va)insert('['+val+':'+cnn+']');}

//embed|insert
function insertmbd(deb,val,fin){
var slctd=embedslct(deb,fin);
if(slctd==undefined){insert(deb+val+fin);}}
function insert_jc(conn,id){
var val=getbyid(id).value;
if(val=="")return; else insert('['+val+':'+conn+']');}
function insert_close(text){insert(text);}

//insert
function insert(text,tg){var txtarea=getbyid(tg?tg:'txtarea');
if(txtarea.createTextRange && txtarea.caretPos){var caretPos=txtarea.caretPos;
	caretPos.text=caretPos.text+text+caretPos.text.charAt(caretPos.text.length-1);}
else mozWrap('',text,tg);}

function insert_b(text,tg){var ob=getbyid(tg?tg:'txtarea');
if(ob.createTextRange && ob.caretPos){var caretPos=ob.caretPos;
	caretPos.text=caretPos.text+text+caretPos.text.charAt(caretPos.text.length-1);}
else mozWrap('',text,tg);}

function insert_photo(txt,conn){
if(txt=="manual"){var txt=getbyid('source').value; txt=clean_entity("\n","",txt);}
if(conn=='slider'||conn=='sliderJ')mozWrap('','['+txt+':'+conn+']');
else if(txt!=null)mozWrap('','['+txt+':photo'+conn+']');
return;}

function insert_html(t,id){var ob=getbyid(id);
var range=window.getSelection().getRangeAt(0);
if(range.startContainer.nodeType===Node.TEXT_NODE){
range.startContainer.insertData(range.startOffset,t);}}

function autochar(e,id){var v,k;
var k=e.keyCode;//call 53.18.17, 52.18.17
//if(k==34)v='"';//lol
if(k==53)v=')';//41
if(k==91)v=']';//93
if(k==123)v='}';//125
if(k==164)v='="";';//=>61,51,51,59
if(v)insert_b(v,id);}

function cmd(e){var k=e.keyCode;//115/s
//if(getbyid('srch').value='')
if(k==110){ajaxcall('popup','bubs,call',['call','addart'],['txtarea'],'focus:addsrc');}}//n //getbyid('addurl').focus();
//addEvent(document,'keypress',function(){cmd(event)});

//toggles
function SaveBc(val){var dn=val.split('_');//artopen
var op=activeid('toggleart'+dn[1]); if(op)var nb=3; else var nb=dn[2];
ajaxcall(dn[0]+dn[1],'art,playc',[dn[1],nb,undefine(dn[4])],[],2);}

function active_list_finder(div,n){
var mnu=getbyid(div).getElementsByTagName("li");
for(i=0;i<mnu.length;i++){
var lnk=mnu[i].getElementsByTagName("a"); var chd=mnu[i].getElementsByTagName("ul");
if(i==n-1){
	if(lnk[0].className=='active' && chd[0].style.display=='block'){
		lnk[0].className=''; chd[0].style.display='none';}
	else if(lnk[0].className=='' && chd[0].style.display=='block'){
		lnk[0].className='active';}
	else{lnk[0].className='active'; chd[0].style.display='block';}}
else lnk[0].className='';}}

function active_list_bubble(ul){var li=ul.getElementsByTagName("li"); //change
if(li.length>0)for(i=0;i<li.length;i++){var liul=li[i].getElementsByTagName("ul");
	li[i].className=''; if(liul[0]){liul[0].style.display='none';}}}
function global_actlistbub(){var bubs=getbycss('inline');
for(var i=0;i<bubs.length;i++)active_list_bubble(bubs[i]);}
function findparentbub(ob){var pbub=ob.parentNode; if(pbub==null)return ob;
if(pbub.className=='inline')return pbub; else return findparentbub(pbub);}
function closeotherbubs(ob){
var bubs=getbycss('inline'); var not=findparentbub(ob);
for(var i=0;i<bubs.length;i++)if(bubs[i]!=not)active_list_bubble(bubs[i]);}
function closechild(li){var ul=li.getElementsByTagName("ul"); //desactive
for(i=0;i<ul.length;i++){ul[i].style.display='none';}}
function closebub(e){active_list_bubble(e.parentNode); eb=e.parentNode.parentNode;//btn
if(eb.parentNode)setTimeout(function(){closebub(eb)},100); else clbub(0,'');}
function closepbub(e,id){var pbu=e.parentNode.parentNode; active_list_bubble(pbu);
var li=pbu.getElementsByTagName("li");//if(id)e.parentNode.id=id;
for(i=0;i<li.length;i++){if(li[i]==e.parentNode && li[i].id)li[i].className='active';
	else li[i].className='';}}

//close bub
function clbub(op,bid){var div=getbyid('clbub');
if(op){addEvent(div,'mousedown',function(){clbub(0,bid)});
	div.style.width='100%'; div.style.height='100%';}
else{div.style.width=0; div.style.height=0;
	if(bid)Hide(bid); else{var bub=getbyid('bub');
	active_list_bubble(bub); global_actlistbub();}}}
//close popbub
function clpop(e,id){var n=clp.length; var fix='';
if(id)clp[n]=id; else if(n){if(e)var m=mouse(e); else m={x:0,y:0};
	for(i=0;i<n;i++){if(clp[i]){var bub=getbyid(clp[i]); if(bub){
		var p=getPosition(bub); var top=p.y; var fix=infixed(bub);
		//if(fix){var scr=pageYOffset; top+=scr;}//not relative parent
		if(fix){var scr=scrollinpos(bub); var scb=pageYOffset; top-=scr-scb; var my=m.y-scb;}
		else{var scr=0; var scb=0; var my=m.y;}
		if(m.x<p.x||m.x>(p.x+p.w)||my<top||my>(top+p.h)){//clickoutside
			if(clp[i].substr(0,3)=='pub')cltog(clp[i]);
			else if(clp[i].substr(0,2)=='bb')closechild(bub);
			else Remove(clp[i]);
			clp[i]=undefined;}}}}}}
//close togbub
function cltog(d){var op=getbyid(d); if(op)var ob=op.parentNode; Remove(d);
if(ob){var oa=ob.getElementsByTagName("a")[0]; activeob(oa);}}

//function onclickoutsisde(){}
function rmclp(d){for(i=0;i<clp.length;i++)if(clp[i]==d)clp[i]=undefined;}
function addclp(id){var n=clp.length; clp[n]=id;}//avoid to be closed just after click

function clbubothers(op,id){
for(i=0;i<op.length;i++){var pid=op[i].id;
	if(pid && pid.substr(0,2)=='bt' && pid.substr(2)!=id){
		var opa=op[i].getElementsByTagName("a"); if(opa[0])activeob(opa[0],1);
		//var bub=op[i].getElementsByTagName('div')[0];
		var bub=getbyid('pub'+(pid.substr(2)));
		if(bub){Remove(bub.id); rmclp(bub.id);}}}}

function togglebub(j){var dn=j.split('_'); var id=dn[2]; j=j;
var ob=getbyid('bt'+id);
if(ob)var oc=ob.getElementsByTagName('a')[0];
if(ob)var op=ob.parentNode.getElementsByTagName('span');
var act=activeob(oc);
if(act==1)ajaxcall('togbub',dn[0],[dn[3],dn[4],dn[5],dn[6]],[],dn[2]);
else Remove('pub'+id);}//{rmclp('pub'+id); //clbubothers(op,id);

function togbubjs(bt,id){popnb+=1; popz+=100;
var pos=getPosition(bt); bt.style.position='relative';//pin absolute
var cnt=getbyid('cnt'+id); var res=cnt.innerHTML;
var bub=document.createElement('div'); bub.innerHTML=res; bub.style.zIndex=popz;
bub.style.position='absolute'; bub.style.maxWidth='500px'; bub.style.minWidth='270px';
bub.className='bubble'; bub.id='pub'+id; bub.style.minWidth='240px'; bub.style.maxWidth='270px';
bt.appendChild(bub); bub.style.left=(pos.x)+'px';//to measure width
togrepos(bt,bub,pos); autoscroll(bub,1);
setTimeout(function(){addclp('pub'+id)},10);}

function togglebubjs(el,id){
var bt=el.parentNode;
if(bt)var oc=bt.getElementsByTagName('a')[0];
if(bt)var op=bt.parentNode.getElementsByTagName('span');
var act=activeob(oc);
if(act==1)togbubjs(bt,id);
else{Remove('pub'+id); rmclp('pub'+id);}
//clbubothers(op,id);
}

function bubjs2(ob,o){
var mp=mouse(event); var pp=getbyid('bubjs'); var res=ob.dataset.tx;
if(pp==null){var pp=document.createElement('div'); pp.id='bubjs';
pp.style='position:absolute; background-color:#444; color:#ccc; border:1px solid silver; padding:2px;';
getbyid('popup').appendChild(pp);}
if(o==1){pp.style.display='inline-block'; pp.style.zIndex+=1; pp.innerHTML=res;
pp.style.top=(mp.y-25)+'px'; pp.style.left=(mp.x-8)+'px';}
else{pp.style.display='none'; pp.innerHTML='';}}

function active_list(id,n){//dropmenu_h
var mnu=getbyid(id).getElementsByTagName('a');
//for(i=0;i<mnu.length;i++){if(i==n)mnu[i].classList.add("active"); else mnu[i].classList.remove("active");}
for(i=0;i<mnu.length;i++){if(i==n)mnu[i].className='active'; else mnu[i].className='';}}

function active_modlist(id,n){var mnu=getbyid(id).getElementsByTagName('a');
for(i=0;i<mnu.length;i++){if(mnu[i].id=='n'+n)mnu[i].className='active'; else mnu[i].className='';}}

function active_divlist(div,n){var mnu=div.getElementsByTagName('a');
for(i=0;i<mnu.length;i++){if(mnu[i].id=='n'+n)mnu[i].className='active'; else mnu[i].className='';}}

function SaveTg(val){var dn=val.split("_");
var mnu=getbyid('mnu'+dn[3]).getElementsByTagName('a');
for(i=0;i<mnu.length;i++){
	if(i==dn[4]){
		if(mnu[i].className=='active' && !dn[5]){//!notclosable
			mnu[i].className=''; falseClose(dn[0]);
			ajaxcall(dn[0],'sesmake',[dn[0],'0'],[],'');}
		else{mnu[i].className='active';
			ajaxcall(dn[0],dn[1],[dn[2],dn[3]],[],'');}}
	else mnu[i].className='';}}

function active_tg(val,nb,nob){//tabs
var op=getbyid(val+nb).className;
if(op=='txtab'){var css='txtaa'; var ret=1;
	if(nob){for(i=1;i<=nob;i++){
		if(i!=nb)getbyid(val+'bt'+i).className='txtab';}}}
else{var css='txtab'; var ret=0;}
getbyid(val+nb).className=css;
return ret;}

function tog_j(val,nb,nob){var dn=val.split("_");
var ob=getbyid(dn[0]); if(nb)ob.dataset.tognb=nb; else nb=ob.dataset.tognb;//dn=undefiner(dn,7);
if(nob)var ac=active_tg(dn[0],nb,nob); else var ac=activeid(dn[0]+nb);
if(ac)SaveJ(val); else falseClose(dn[0]);}

function tog_cl(el){
el=el.parentNode; if(el.id==null)el=el.parentNode;
var id=el.id; var nb=el.dataset.tognb;
tog_j(id,nb,'');}

function tog_jb(ja,jb,rid){
var ac=activeid(rid);
if(ac)SaveJ(ja); else SaveJ(jb);}

function toggle_block(id,p){//admin_menu
var act=activeid('bt'+id); var div=getbyid(id); var op=div.style.display;
if(op=='block'||p==1)div.style.display='none'; else div.style.display='block';}

/*function toggle_hidden(id,p){
var act=activeid('bt'+id); var div=getbyid(id); var hidden=getbyid('hid'+id).value;
if(act==1)div.innerHTML=hidden; else div.innerHTML='';}*/

function toggle_content(id,p){
var act=activeid('bt'+id); var div=getbyid(id);
if(act==1)div.style.display='block'; else div.style.display='none';}

function toggle_tab(tab,obj){//tabs_html
ajaxcall('socket','sesmake',['tbmd'+tab,obj],[],4);
var mnu=getbyid('mnuab'+tab).getElementsByTagName("a");
for(i=1;i<=mnu.length;i++){var b=i-1;
	if(i==obj){mnu[b].className='txtaa';
	getbyid('div'+tab+i).style.display='block';}
	else{mnu[b].className='txtab'; Hide('div'+tab+i);}}}

function swapbt(p,e,ic){
var d=p==1?e.dataset.bt1:e.dataset.bt0;
if(ic==1){e=e.childNodes[0]; e.className='philum ic-'+d;}
else e.innerHTML=d;}

//bubjs
function bubjs(ob,o){
var mp=mouse(event); var pp=getbyid('bubjs'); var res=ob.dataset.tx;
if(pp==null){var pp=document.createElement('div'); pp.id='bubjs';
pp.style='position:absolute; background-color:#444; color:#ccc; border:1px solid silver; padding:2px;';
getbyid('popup').appendChild(pp);}
if(o==1){pp.style.display='inline-block'; pp.style.zIndex+=1; pp.innerHTML=res;
pp.style.top=(mp.y-25)+'px'; pp.style.left=(mp.x-8)+'px';}
else{pp.style.display='none'; pp.innerHTML='';}}

function bubj(ob,o){
var mp=mouse(event); var pp=getbyid('bubj'); var j=ob.dataset.ja;
if(pp==null){var pp=document.createElement('div'); pp.id='bubj';
pp.style='position:absolute; background:#444; color:#ccc; border;1px solid silver; padding:2px;';
getbyid('popup').appendChild(pp);}
if(o==1){pp.style.display='inline-block'; pp.style.zIndex+=1; SaveJ('bubj_'+j);
pp.style.top=(mp.y+15)+'px'; pp.style.left=(mp.x-8)+'px';}
else{pp.style.display='none'; pp.innerHTML='';}}

function radiobtj(rid,id,v,n){active_list(rid,n); getbyid(id).value=v;}
function radioj(rid,id,v,n){active_list(rid,n); ajaxcall('socket','sesmake',[id,v],[],'');}

function modedit(arr,tar){
vn=arr.split("|"); var nm=""; var nb=new Array();
for(i=0;i<vn.length;i++){
	if(vn[i]){var val=getbyid(vn[i]).value;
		var np=(val); nb.push(np); if(i==0)var nm=np;
		else if(i==1||i==2||i==3)var nm=nm+'/'+np;
		else if(i==4){if(nm)var nm=nm+':'+np; else nm=np;}
		else if(i==5 && np)var nm=nm+'|'+np;}}
if(!nb[1] && !nb[2] && !nb[3])nm=nm.replace('///','');
if(!nb[0] && !nb[1] && !nb[2] && !nb[3])nm=nm.replace(':','');
var to=getbyid(tar).value; if(to)nm=to+',\n'+nm;
getbyid(tar).value=utflatin(nm);}


//mkforms
function jumpMenu_addtext(val){var dn=val.split("_");
var old=getbyid(dn[0]).value;
if(!old)var old=''; else var old=old+dn[4];
var dc=getbyid(dn[1]); var slct=dc.options[dc.selectedIndex].innerHTML;
var va=getbyid(dn[2]).value;
if(va){var va=va+dn[3]+slct;} else{var va=slct;}
getbyid(dn[0]).value=old+va;}

function log_finger(id){var va=getbyid(id).value;
var arr=['-',',','?',';','.',':','/','!','§',' ','"',"'",'(',')','_','=','+','$','*','%','<','>',' ','|','~','&','^','é','è','à','ç','ù','£','@','{','}','[',']','`','^','µ','¨','^','²'];
for(i=0;i<arr.length;i++)va=va.replace(arr[i],'');
if(Number(va.substr(0,1)))va=va.substr(1); //var va=va.toLowerCase();
getbyid(id).value=va;
return va;}

function num_finger(id,mx){var va=getbyid(id).value; var n=va.length;
if(!Number(va))va=va.substr(0,n-1);
if(n>mx)va=va.substr(0,mx);
getbyid(id).value=va;}

function num_mail(id){var v=getbyid(id); var va=v.value;//mk::form
if(va.indexOf("@")==-1)v.className='txtred';
else if(va.indexOf(".")==-1)v.className='txtred'; else v.className='';}

function log_goodname(id){let va=log_finger(id);
ajaxcall(id,'login,usdhub',[va],[],4);}

//editable
function editcell(el){
var j=getbyid('edtcom').value;
bjcall(el.id+'|'+j+',rid='+el.id+'|'+el.id);}

//storage
function locals(id,va){if(localStorage){//,com
//if(com=='x')localStorage.removeItem[id];
if(va)localStorage.setitem(id,va);
else return localStorage.getitem[id];}}

function mem_storage(tg,ka,cp,ty,id,dv){//tar,key,copy,type,id,div
tg=tg?tg:'txtarea'; var ob=getbyid(tg);
if(dv)active_list(dv,id);
if(ty)var obj=ob.innerHTML; else var obj=ob.value;
if(cp=='x')return mozWrap('','',tg,'del');
var txt=embedslct('','',tg);
if(cp){var lc=localStorage[ka];//paste
	if(id)getbyid('cka').value=ka;
	if(ty)ob.innerHTML=lc;
	else if(txt==undefined)insert_b(lc,tg);
	else ob.value=obj.replace(txt,lc);}
else{var val=txt?txt:(obj);//copy
	if(ka=='cka')var key=getbyid('cka').value; else var key=ka;
	localStorage[key]=val;}
if(id)sav_btn(id,dv);}

function sav_btn(id,div){var mnu=getbyid(div); var rmn=mnu.getElementsByTagName('a');
for(i=0;i<rmn.length;i++)if(rmn[i].id==id)rmn[i].className='active'; else rmn[i].className='';}

function conn(val){//?
var vn=val.split("_"); vn[0]=vn[0]?vn[0]:'txtarea';
return mozWrap('','',vn[0],vn[1],vn[2]);}

function delconnx(val){var d=getbyid(val).value;
return mozWrap('','','txtarea','delconn',d);}

//drag
var popz=1;
var cpop=0;
var cpop_difx=0;
var cpop_dify=0;
var popnb=0;
var curid=0;
var exs=[];//artlive

//selectable(element,false);
(function(w,u,o){w.selectable=function(a,b){
	if(typeof b==='boolean' && !b){a.setAttribute(u,'on');a.setAttribute(o,'return false;');}
	else{if(a.hasAttribute(u))a.removeAttribute(u); if(a.hasAttribute(o))a.removeAttribute(o);}}})
(window,'unselectable','onselectstart');

function zindex_sup(){
getbyid('pop'+curid).style.zIndex=popz+100;}
function zindex(id){popz++; curid=id;
getbyid('pop'+id).style.zIndex=popz;}

function popslide(ev){
if(cpop!=0){var souris=mouse(ev);
	cpop.style.left=(souris.x-cpop_difx)+'px';
	cpop.style.top=(souris.y-cpop_dify)+'px';}}

function artslide(e,id){var wpos=window.pageXOffset; var met=getbyid('meta'+id);
var pmet=getPosition(met); met.innerHTML=wpos+'-'+pmet.y+'-'+delta;
if(pmet.y<20)met.style.position='fixed';}

function listenart(e,id){addEvent(document,'mousewheel',function(){artslide(e,id)});}

//refresh
function relj(){
var rid=randid();
var head=getbytag('head')[0];
rejs(head,rid);
recss(head,rid);}

function rejs(head,rid){
var r=['lib','core','ajx'];
for(i in r){
var el=getbyid(r[i]); var nm=r[i];
if(nm)head.removeChild(el);
var ob=document.createElement('script');
ob.src='/progb/j/'+nm+'.js?'+rid; ob.id=nm;
if(nm)head.appendChild(ob);}}

function recss(head,rid){
var r=['_global',design];
for(i in r){
var el=getbyid(r[i]); var nm=r[i];
el.href='/css/'+nm+'.css?'+rid;}}

function switchcss(){var el=getbyid(design);
var nm=el.href; nm=strend(nm,'/'); nm=strto(nm,'.');
var dn=nm.split('_'); nm=dn[0]+'_'+dn[1]+'_'+dn[2]; if(!dn[3])nm+='_neg';
el.href='/css/'+nm+'.css?';
ajaxcall('swcs','usg,switchcss',[nm],[],'');}

//book
function scrolltxt(n){var v=n==1?1:(-1); doc.scrollTop=doc.scrollTop+v;}
function autoread(id,rid){doc=getbyid("scrll"+rid);
scrolltxt(1); timer=setTimeout(function(){autoread(id,rid)},100);}
function scrollt(n,rid){doc=getbyid("scrll"+rid);
for(i=0;i<200;i++){timer=setTimeout(function(){scrolltxt(n,rid)},i*4);}}

//jtim
function jtimb(j,n){SaveJ(j); jtime(j,n);}
function jtime(j,n){xt=setTimeout(function(){jtimb(j,n)},n?n:1000);}
function jtimbt(id,j,n){var ob=getbyid(id); var a=activeid(id);
if(a)jtime(j,n); else if(typeof xt!='undefined')clearTimeout(xt);}

function js_chat(d){
var fa='SaveJ(\'chtx'+d+'_chatxml,call__13_'+d+'\'); ';
var fb='xch=setTimeout(\'chatimer'+d+'()\',3000);';
return 'function chatimer'+d+'(){'+fa+fb+'} chatimer'+d+'();';}

//addjs
function addjs(res){
var head=getbytag('head')[0];
var el=getbyid('addjs');
if(el!=null)head.removeChild(el);
var ob=document.createElement('script');
ob.type="text/javascript"; ob.innerHTML=res; ob.id='addjs';
head.appendChild(ob);}

function opage(res){
var head=getbytag('head')[0]; var el=getbyid('opage');
if(el!=null)head.removeChild(el);
var r=JSON.parse(res);
for(i in r){
	var ob=document.createElement('script'); ob.type="text/javascript"; ob.id='opage';
	//var url='parent.frames["frame-'+i+'"].location.href = "'+(r[i])+'";';//encodeURIComponent
	var url='window.open("'+decodeURIComponent(atob(r[i]))+'","mozillaTab-'+i+'");';//
	ob.innerHTML=url; head.appendChild(ob);}}

//encodeURIComponent

function addjs_old(f,d,p){var head=getbytag('head')[0];
var js=document.createElement('script'); js.id='addjs'; var ob=getbyid('addjs');
if(f=='chatx')js.innerTEXT=js_chat(d); else js.innerTEXT=d;
if(p==1){if(ob!=null)ob.innerHTML=d; else head.appendChild(js);}
else clearTimeout(xch);}

function offon(f,d){
var v=getbyid('offon'+d); var p=v.value==1?0:1; v.value=p;
ajaxcall('socket','sesmake',['offon',p],[],'');
setTimeout(function(){addjs_old(f,d,p)},1000);
ajaxcall('offonbt'+d,'offon',[p],[],'');}

function poplist(id){var icon='='; var list='ý';//pictos
var bt=getbyid(id); var popu=getbyid('popu'+curid);
if(bt.innerHTML==icon){var c='pubart'; bt.innerHTML=list; var inl='display:inline;';}
else{var c='icones'; bt.innerHTML=icon; var inl='display:block;';}
var div=popu.getElementsByTagName('a');
for(i=1;i<div.length;i++){var dv=div[i].childNodes[0]; dv.className=c;
	var sp=dv.getElementsByTagName('div')[1]; sp.style=inl;}
poprepos();}

//fixtit
function fixdiv(){var scrl=pageYOffset;
var div=getbyid('fixtit'); //var pdiv=getPosition(div);
//var mnu=getbyid('fixit');
var mnu=getbytag('h1')[0];
if(mnu='undefined')return;
var pmnu=getPosition(mnu);
var bub=getbyid('bub'); var inl=bub.className;
var mna=mnu.getElementsByTagName('a');
if(mna[0]!=undefined)var mnt=mna[0]; else var mnt=mnu;
var bt='<a onclick="scrolltoup(0);" class="small"><span class="philum ic-arrow-top"></span>'+mnt.innerHTML+'</a> ';
if(scrl>pmnu.y && inl=='inline')div.innerHTML=bt; else div.innerHTML='';}
if(typeof read==='string' && read>0)addEvent(document,'scroll',function(event){fixdiv()});
function recuptit(){
var mnu=getbytag('h1')[0];
var mna=mnu.getElementsByTagName('a');
if(mna[0]!=undefined)var ret=mna[0].innerHTML; else var ret=mnu.innerHTML;
return ret.replace('&nbsp;',' ');}

//dock
function dock(id){
var pp=getbyid('pop'+curid); var ex=0;
var rd=getbyid('desktop').getElementsByTagName("a");
var bt=getbyid('dk'+id); var bta=bt.getElementsByTagName("span")[0];
for(i=0;i<rd.length;i++){var idb=rd[i].id; if(idb=='ic'+id)ex=1;}
if(ex){ajaxcall('desktop','favs,favdel',[id,'dock'],[],'');//Remove('ic'+id);
	bta.className='philum ic-input'; bt.title='ajouter au dock';}
else{ajaxcall('desktop','favs,favsav',[id,'dock','1'],[],'');
	bta.className='philum ic-output'; bt.title='retirer du dock';}}

//prw
function fold(id){
var bt=getbyid('fd'+id); var bta=bt.getElementsByTagName("span")[0];
var prw=bt.dataset.prw;
if(prw=='2'){ajaxcall(id,'art,playd',[id,'1'],[],'2');
	bta.className='philum drawer-off'; bt.title='fermer';}
else{ajaxcall(id,'art,playd',[id,'2'],[],'2');
	bta.className='philum drawer-on'; bt.title='ouvrir';}
Close('popup');}

//continuous scroll
function artlive2(div){var ret=''; var ia=0;
var content=getbyid(div);
if(typeof content!=='object'||typeof content==null||!content)return;
var scrl=pageYOffset+innerHeight;
var mnu=content.getElementsByTagName('section');
if(typeof mnu!=='object'||typeof mnu==null)return;
var load=mnu[mnu.length-4];
var pos=getPosition(load);
var last=mnu[mnu.length-1];
if(!last)return;
var id=last.id;
var idx=exs.indexOf(id);
if(idx==-1 && scrl>pos.y){exs.push(id);
	var rq=getbyid('hid'+div);
	if(rq.value!='undefined'){
		ajaxcall(div,'api,callj',[rq.value,'to:'+id],[],'after');}}}//addiv()
addEvent(document,'scroll',function(){artlive2('loadmodart')});

function artlive(){var ret=''; var ia=0; var nbyp=40;
var scrl=pageYOffset+innerHeight;
var mnud=getbyid('content');
if(mnud!=undefined){var mnu=mnud.getElementsByTagName("socket");
if(mnu.length)for(i=0;i<mnu.length;i++){var did=mnu[i].id; var id=did.substring(1);
	if(parseInt(id)>1){
		if(mnu[i].innerHTML==''){
			var pos=getPosition(mnu[i]); var pos=pos.y;
			if(scrl>pos){ia++;
				var idx=exs.indexOf(id);
				if(ia==nbyp)i=mnu.length;//stop loop
				if(idx==-1 && ia<nbyp){
					exs.push(id); if(mnu[i])var md=mnu[i].dataset.prw;
					ajaxcall(did,'art,playb',[id,md],[],'2');}}}}}}}
if(typeof read==='string' && flow==1)
addEvent(document,'scroll',function(){artlive()});

function upload(id){
var form=getbyid("upl"+id);
var type=getbyid("typ"+id).value;
var opt=getbyid("opt"+id).value;
var jo=type=='art'?'':'14';//portfolio
var fileSelect=getbyid("upfile"+id);
var files=fileSelect.files;
var fd=new FormData();
uploaded=0;
for(var i=0;i<files.length;i++){//1
	var time=Math.floor(Date.now()/1000);
	var file=files[i];
	var filename=file.name;
	//if(!file.type.match("image.*"))continue;
	fd.append("upfile"+id,file,filename);
	//waitmsg(id+'up');
	if(filename)upload_progress(id);
	var gets=jurl()+'&app=sav,uploadsav&g0='+id+'&g1='+type+'&g2='+opt;
	new AJAX(gets,id+'up',jo,fd);}}

function cancelupload(rid){clearTimeout(xb); uploaded=0; jumphtml(rid+'prg','');}
function cleartimeout(){clearTimeout(x);}

function upload_progress(rid){
if(uploaded>95){var div=''; clearTimeout(xb);}
else{var div='<progress value=\"'+uploaded+'\" max=\"100\"></progress><a onclick=\"cancelupload(\''+rid+'\')\" class=\"txtyl\">x</a>'; xb=setTimeout(function(){upload_progress(rid)},100);}
getbyid(rid+'prg').innerHTML=div;}

//apicom
function apijumptoarea(d,id){var res=[]; var ok=0;
var p=d.substr(3); var o=getbyid(d); var k=o.id; var v=o.value;
var content=getbyid(id);
var r=(content.value).split(',');
if(r)for(i=0;i<r.length;i++){var kv=r[i].split(':'); //if(r[i]=='undefined')r[i]='';
	if(kv[0]==p){if(v)res.push(p+':'+v); var ok=1;} else if(r[i])res.push(r[i]);}
if(!ok && v)res.push(p+':'+v);
var ret=res.join(','); if(ret!=undefined)content.value=ret;}

function apijumptoinputs(id){
var content=getbyid(id);
var r=(content.value).split(',');
for(i=0;i<r.length;i++){var kv=r[i].split(':');
	var ob=getbyid(id+kv[0]);
	if(ob!=undefined && kv[1]!=undefined)ob.value=kv[1];}}

//stabilo
function getrange(id){
var ob=getbyid(id);
elStart=0; elEnd=0;
var doc=ob.ownerDocument||ob.document;
var win=doc.defaultView||doc.parentWindow;
var sel;
if(typeof win.getSelection!="undefined"){
	sel=win.getSelection(); //sel=encode_utf8(sel);
	if(sel.rangeCount>0){
		var range=win.getSelection().getRangeAt(0);
		var preCaretRange=range.cloneRange();
		preCaretRange.selectNodeContents(ob);
		preCaretRange.setEnd(range.endContainer,range.endOffset);
		elEnd=preCaretRange.toString().length;}}
else if((sel=doc.selection) && sel.type!="Control"){
	var textRange=sel.createRange();
	var preCaretTextRange=doc.body.createTextRange();
	preCaretTextRange.moveToElementText(ob);
	preCaretTextRange.setEndPoint("EndToEnd",textRange);
	elEnd=preCaretTextRange.text.length;}
slct=sel.toString();
if(slct.substring(slct.length-1,slct.length)==' '){slct=slct.substring(0,slct.length-1); elEnd-=1;}
var elStart=elEnd-slct.length;
return{start:elStart,end:elEnd,txt:slct};}

function useslct(e,id){var d=getrange('art'+id);
if(d.txt){var ex=getbyid('edtrk'+id);
	if(ex)insert('['+d.txt+'|'+d.start+':callquote]'+"\n\n",'edtrk'+id);
	else ajaxcall('popup','tracks,form',[id,d.txt,d.start],[],'');}}

function callquote(id,s,pad,idt){
var ob=getbyid('art'+id); var t=ob.innerHTML;
ajaxcall('art'+id,'art,playq',[id,s,pad,idt],[],'');
setTimeout(function(){scrolltoob('qnh'+s,200)},300);}

function xltags(e,id,cnn){var d=getrange('art'+id);
if(d.txt){var tg=cnn=='all'?'popup':'art'+id; if(cnn=='all')cnn='';
	ajaxcall(tg,'ma,slctconn',[id,d.txt,d.start,cnn],[],'');}}

function rbt(e,id){var d=getrange('art'+id);
//if(d.txt){ajaxcall('popup','usg,rightbt',[d.txt],[],'');}
}
