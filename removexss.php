<?php

   class check {
         //屏蔽html
		function checkhtml($html) {
			$html = stripslashes($html);
			// if(!checkperm('allowhtml')) {

				preg_match_all("/<([^<]+)>/is", $html, $ms);

				$searchs[] = '<';
				$replaces[] = '<';
				$searchs[] = '>';
				$replaces[] = '>';

				if($ms[1]) {
					$allowtags = 'img|a|font|div|table|tbody|caption|tr|td|th|br
								|p|b|strong|i|u|em|span|ol|ul|li|blockquote
								|object|param|embed';//允许的标签
					$ms[1] = array_unique($ms[1]);
					foreach ($ms[1] as $value) {
						$searchs[] = "<".$value.">";
						$value = htmlspecialchars($value);
						$value = str_replace(array('\\','/*'), array('.','/.'), $value);
						//屏蔽敏感字符串
						$skipkeys = array(
								'onabort','onactivate','onafterprint','onafterupdate',
								'onbeforeactivate','onbeforecopy','onbeforecut',
								'onbeforedeactivate','onbeforeeditfocus','onbeforepaste',
								'onbeforeprint','onbeforeunload','onbeforeupdate',
								'onblur','onbounce','oncellchange','onchange',
								'onclick','oncontextmenu','oncontrolselect',
								'oncopy','oncut','ondataavailable',
								'ondatasetchanged','ondatasetcomplete','ondblclick',
								'ondeactivate','ondrag','ondragend',
								'ondragenter','ondragleave','ondragover',
								'ondragstart','ondrop','onerror','onerrorupdate',
								'onfilterchange','onfinish','onfocus','onfocusin',
								'onfocusout','onhelp','onkeydown','onkeypress',
								'onkeyup','onlayoutcomplete','onload',
								'onlosecapture','onmousedown','onmouseenter',
								'onmouseleave','onmousemove','onmouseout',
								'onmouseover','onmouseup','onmousewheel',
								'onmove','onmoveend','onmovestart','onpaste',
								'onpropertychange','onreadystatechange','onreset',
								'onresize','onresizeend','onresizestart',
								'onrowenter','onrowexit','onrowsdelete',
								'onrowsinserted','onscroll','onselect',
								'onselectionchange','onselectstart','onstart',
								'onstop','onsubmit','onunload','javascript',
								'script','eval','behaviour','expression',
								'style','class'
							);
						$skipstr = implode('|', $skipkeys);
						$value = preg_replace(array("/($skipstr)/i"), '.', $value);
						if(!preg_match("/^[/|s]?($allowtags)(s+|$)/is", $value)) {
							$value = '';
						}
						//将这些敏感字符串替换为空
						$replaces[] = empty($value)?'':"<".str_replace('"', '"', $value).">";
					}
				}
				$html = str_replace($searchs, $replaces, $html);
			// }
			$html = addslashes($html);

			return $html;
		}

		//$a = '<b>afdfd</b><script>fdfasdfa</script>';
		//$b = checkhtml($a);
		//echo $b;
 
   }

?>