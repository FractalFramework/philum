<?php
class pdf
{

	static function make_list_arts($v)
	{
		$der = explode("~", $v);
		$sq = [];
		$sq = ['nod' => ses('qb'), '!frm' => '_system', 're' => 1];
		foreach ($der as $va) {
			[$vaa, $vab] = explode("=", $va);
			switch ($vaa) {
				case ("dya"):
					if ($vab) $sq[] = ['<day' => $vab];
					break;
				case ("dyb"):
					if ($vab) $sq[] = ['>day' => $vab];
					break;
				case ("cat"):
					if ($vab) $sq[] = ['frm' => $vab];
					break;
				case ("nocat"):
					if ($vab) $sq[] = ['!frm' => $vab];
					break;
				case ("tag"):
					if ($vab) $sq[] = ['%thm' => $vab];
					break;
				case ("notag"):
					if ($vab) $notag[$vab] = true;
					break;
				case ("order"):
					if ($vab) $ord = $vab;
					break;
			}
		}
		$sq['_order'] = 'day ' . ($ord ? $ord : 'desc');
		$r = sql::read('id,frm,thm', 'qda', '', $sq);
		if ($r) {
			foreach ($r as $k => [$id, $frm, $thm]) {
				$stop = false; //obs
				$tags = explode(',', $thm);
				if ($tags) foreach ($tags as $vb) {
					if ($notag[trim($vb)] == true) $stop = true;
				}
				if (!$stop) $ret[$id] = 1;
			} //prw
			return $ret;
		}
	}

	static function arts_menus($dya, $dyb)
	{
		$cs = 'txtblc';
		$ret = divc('txtcadr', 'build_pdf_book') . br();
		$dya = $dya ? $dya : time();
		$dyb = $dyb ? $dyb : 0;
		$dt = [];
		$sq = 'day<' . $dya . ' and day>' . $dyb . ' AND re>"0"';
		$r = sql::read('id,frm,thm,day', 'qda', '', $sq);
		foreach ($r as $k => $v) {
			$dt['cat'][ajx($v['frm'], '')] += 1;
			//$tags=explode(',',ajx($v['thm'],''));
			//foreach($tags as $ka=>$va){$dt['tag'][ltrim($va)]+=1;}//self::tri_tags($r)
			if ($v['day'] < ses('daya')) $mind = $v['day'];
			if ($v['day'] > ses('dayb')) $maxd = $v['day'];
		}
		$ret .= 'from ' . input('dyb', date('d/m/Y', $mind)) . ' ';
		$ret .= 'to ' . input('dya', date('d/m/Y', $maxd)) . br() . br();
		if ($dt['cat']) $cts = implode('|', array_keys_b($dt['cat']));
		//if($dt['tag'])$tgs=implode('|',array_keys_b($dt['tag']));
		$ret .= 'cats: ' . input('cts', '') . ' ';
		$ret .= jump_btns('cts', $cts, ',') . br();
		$ret .= 'no-cats: ' . input('nct', '') . ' ';
		$ret .= jump_btns('nct', $cts, ',') . br();
		//$ret.='tags: '.input('tgs','').' ';
		//$ret.=jump_btns('tgs',$tgs,',').br();
		//$ret.='no-tags: '.input('ntg','').' ';
		//$ret.=jump_btns('ntg',$tgs,',').br();
		$ret .= 'order: ' . input('urd', '') . ' ';
		$ret .= jump_btns('ord', 'ASC|DESC', '') . br();
		$ret .= lj('txtbox', 'call_pdf,call_dya,dyb,cts,nct,tgs,ntg,ord', 'call');
		return $ret . br() . br();
	}

	static function arts($r)
	{
		$wh = implode('" or id="', array_keys_b($r)); //echo 
		$rq = sql::read('id,suj,day,frm,thm', 'qda', '', ['id' => $wh]);
		foreach ($r as $k => $v) {
			$rt[$v['id']] = [$v['suj'], date('ymd', $v['day']), $v['frm'], $v['thm']];
		}
		return tabler($rt);
	}

	static function little_split($v)
	{
		$unkill = explode(",", $v);
		$ret = [];
		foreach ($unkill as $su) {
			$su = trim($su);
			if ($su && $su != " ") $ret[$su] += $v;
		}
		return $ret;
	}

	static function tri_tags($r)
	{
		$ret = [];
		if (is_array($r)) {
			foreach ($r as $k => $v) {
				$rb = trimr($k);
				foreach ($rb as $ka => $va) if ($va) $ret[$va] += $v;
			}
		}
		return $ret;
	}

	//! very old thing
	static function call()
	{ //echo get('nom');
		$r = ['dya', 'dyb', 'cat', 'nocat', 'tag', 'notag', 'order'];
		$cll = explode('~', get('call'));
		$cal = '';
		$get = explode('_', get('nom'));
		foreach ($r as $k => $v) {
			if ($k) {
				$rb = self::tri_tags($r);
				if ($get[$k]) $cl[$v] = ajx($get[$k], 1); //else $cl[$v]=$cll[$k];
				if ($k == 0 or $k == 1) $cl[$v] = strtotime($cl[$v]);
			}
		}
		foreach ($cl as $k => $v) {
			$cal .= $k . '=' . $v . '~';
		}
		$_SESSION['call'] = $cal;
		$mart = self::make_list_arts($cal);
		//p($mart);
		$ids = implode('|', $mart);
		$bpd = lj('txtbox', 'call_pdf,produce_' . $ids, 'build');
		return self::arts($mart) . br() . $bpd;
	}

	static function produce()
	{
		include("pdf/phpToPDF.php");
		$PDF = new phpToPDF(); //?
		$PDF->AddPage();
		$PDF->SetFont("Arial", "B", 16);
		$PDF->Text(40, 10, "Uniquement un texte");
		$PDF->Output();
		//$PDF->Output("test.pdf","F");
		// affiche le document test.PDF dans une iframe.
		/*echo '
	<iframe src="test.pdf" width="100%" height="100%">
	[Your browser does <em>not</em> support <code>iframe</code>,
	or has been configured not to display inline frames.
	You can access <a href="./test.PDF">the document</a>
	via a link though.]</iframe>
';*/
	}

	static function home($p, $o)
	{
		$_SESSION['call'] = '';
		if (!$_GET['nom']) {
			head::add('csslink', '../css/_admin.css');
			head::add('jslink', '../progb/ajx.js');
			$ret = head::call();
		}
		$ret .= self::arts_menus(ses('daya'), ses('dayb'));
		$ret .= divd('call', '');
		$ret .= divd('pdf', '');
		return $ret;
	}
}
