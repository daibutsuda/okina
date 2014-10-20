<?php
Class Seimei {
	
	public $sei;
	public $mei;
	public $sex;
	
	public $tenkaku;
	public $jinkaku;
	public $chikaku;
	public $gaikaku;
	public $soukaku;
	
	public $seikaku;
	public $kenkou;
	
	public $error;

	public $jinshimo;
	
	private $sei1;
	private $sei2;
	private $tenshimo;
	private $chishimo;
	
	function meimei ($sex) {
		$meimei = New Meimei();
		return($meimei->getNewName($this->sei, $this->sei1, $this->sei2, $sex));
	}
	
	// 画数計算
	function shindan () {
		mb_regex_encoding("UTF-8");

		$sei = $this->sei;
		$mei = $this->mei;
		
		$kanji = New Kanji();
		
		$this->sei1 = $kanji->kakusu(mb_substr($this->sei, 0, 1, "utf-8"));
		$this->sei2 = $kanji->kakusu(mb_substr($this->sei, mb_strlen($this->sei, "utf-8") - 1, 1, "utf-8"));
		
		// 々ゝ仝の処理
		$sei = preg_replace("/(.)(々ゝ仝)/u", "$1$1", $sei);
		$mei = preg_replace("/(.)(々ゝ仝)/u", "$1$1", $mei);
		
		// 天画・人画・地画・外画・総画の算出(結構ややこしい)
		$this->tenkaku = 0;
		$this->jinkaku = 0;
		$this->chikaku = 0;
		$this->error = Array();
		
		// 天画の算出
		for ($i = 0; $i < mb_strlen($sei, "utf-8"); $i++) {
			$c = mb_substr($sei, $i, 1, "utf-8");
			$k = $kanji->kakusu($c);
			if ($k == 0) {
				push($this->error, $c);
			} else {
				$this->tenkaku += $k;
			}
		}
		
		// 一文字姓の処理
		if (mb_strlen($sei) == 1) {
			$this->tenkaku++; // 一画借りる
			$this->gaikaku++;
			$this->soukaku--; // 一画返す
		}
		
		// 人画の算出
		$this->jinkaku = $kanji->kakusu(mb_substr($sei, mb_strlen($sei, "utf-8")-1, 1, "utf-8"))
					   + $kanji->kakusu(mb_substr($mei, 0, 1, "utf-8"));
		
		// 地画の算出
		for ($i = 0; $i < mb_strlen($mei, "utf-8"); $i++) {
			$c = mb_substr($mei, $i, 1, "utf-8");
			$k = $kanji->kakusu($c);
			if ($k == 0) {
				push($this->error, $c);
			} else {
				$this->chikaku += $k;
			}
		}
		
		// 一文字名の処理
		if (mb_strlen($mei) == 1) {
			$this->chikaku++; // 一画借りる
			$this->gaikaku++;
			$this->soukaku--; // 一画返す
		}
		
		// 総画・外画の算出
		$this->soukaku = $this->tenkaku + $this->chikaku;
		$this->gaikaku = $this->soukaku - $this->jinkaku;
		
		// オーバーフロー処理 - ちなみに > 81は間違いではない。
		if ($this->tenkaku > 81) {
			$this->tenkaku %= 80;
		}
		if ($this->jinkaku > 81) {
			$this->jinkaku %= 80;
		}
		if ($this->chikaku > 81) {
			$this->chikaku %= 80;
		}
		if ($this->gaikaku > 81) {
			$this->gaikaku %= 80;
		}
		if ($this->soukaku > 81) {
			$this->soukaku %= 80;
		}
		
		// 天画・人画・地画の下一桁の算出(10で割った余りを取るだけ)
		$this->tenshimo = $this->tenkaku % 10;
		$this->jinshimo = $this->jinkaku % 10;
		$this->chishimo = $this->chikaku % 10;
		
		// 性格診断の準備
		$this->seikaku = $this->jinshimo; //人画の下一桁で決まる

		// 陰陽五行のシリアル番号の算出(詳しくはkenkou.phpを参照)
		$this->kenkou = $this->f($this->tenshimo) * 25 + $this->f($this->jinshimo) * 5 + $this->f($this->chishimo);
	}
	
	public function score ($kakusu) {
		$reii = New Reii();
		return $reii->score[$kakusu][$this->sex == 'M' ? 0 : 1];
	}
	
	public function grand_score () {
		$reii = New Reii();
		$kenkou_map = ['◎' => 1, '○' => 0.9, '△' => 0.7, '×' => 0.5];
		$kenkou = $kenkou_map[mb_substr($this->kenkou_description(), 6, 1, "utf-8")];
		if ($this->sex == 'M') {
			return
				($reii->score[$this->tenkaku][0] +
				$reii->score[$this->jinkaku][0] +
				$reii->score[$this->gaikaku][0] +
				$reii->score[$this->soukaku][0]) / 4 * $kenkou;
		} else {
			return
				($reii->score[$this->tenkaku][1] +
				$reii->score[$this->jinkaku][1] +
				$reii->score[$this->gaikaku][1]) / 3 * $kenkou;
		}
	}
	
	public function reii_description ($kakusu) {
		$reii = New Reii();
		return $reii->mongon[$kakusu][0];
	}

	public function seikaku_description () {
		$seikaku = New Seikaku();
		return $seikaku->mongon[$this->jinshimo][0];
	}

	public function kenkou_description () {
		$kenkou = New Kenkou();
		return $kenkou->mongon[$this->kenkou][0];
	}
	
	// 占い結果(文言)の出力
	public function mongon ($category) {
		mb_regex_encoding("UTF-8");
		// 数の霊位文言の初期化
		$reii = New Reii();
		// 健康文言の初期化
		$kenkou = New Kenkou();
		// 性格文言の初期化
		$seikaku = New Seikaku();
		
		switch ($category) {

			case 'tenkaku':
				$mongon = $reii->mongon[$this->tenkaku][1];
				break;
			
			case 'chikaku':
				$mongon = $reii->mongon[$this->chikaku][1];
				break;
			
			case 'gaikaku':
				$mongon = $reii->mongon[$this->gaikaku][1];
				break;
			
			case 'soukaku':
				$mongon = $reii->mongon[$this->soukaku][1];
				break;
			
			case 'jinkaku':
				$mongon = $reii->mongon[$this->jinkaku][1];
				break;
			
			case 'seikaku':
				$mongon = $seikaku->mongon[$this->seikaku][1];
				if ($this->jinkaku != 6) {
					$mongon = preg_replace("/\+6.*-6/u", "", $mongon);
				}
				if ($this->jinkaku != 16) {
					$mongon = preg_replace("/\+16.*-16/u", "", $mongon);
				}
				if ($this->jinkaku != 26) {
					$mongon = preg_replace("/\+26.*-26/u", "", $mongon);
				}
				if ($this->jinkaku != 36) {
					$mongon = preg_replace("/\+36.*-36/u", "", $mongon);
				}
				if ($this->jinkaku != 46) {
					$mongon = preg_replace("/\+46.*-46/u", "", $mongon);
				}
				if ($this->jinkaku != 24) {
					$mongon = preg_replace("/\+24.*-24/u", "", $mongon);
				}
				if ($this->jinkaku != 32) {
					$mongon = preg_replace("/\+32.*-32/u", "", $mongon);
				}
				break;
			
			case 'kenkou':
				$mongon = $kenkou->mongon[$this->kenkou][1];
				break;

			default:
		}
		if ($this->sex != "F") {
			$mongon = preg_replace("/\+w.*-w/u", "", $mongon);
		}
		if ($this->sex != "M") {
			$mongon = preg_replace("/\+m.*-m/u", "", $mongon);
		}
		if ($category != "jinkaku") {
			$mongon = preg_replace("/\+j.*-j/u", "", $mongon);
		}
		if ($category != "soukaku") {
			$mongon = preg_replace("/\+s.*-s/u", "", $mongon);
		}
		if ($category != "gaikaku") {
			$mongon = preg_replace("/\+o.*-o/u", "", $mongon);
		}
		if ($this->chikaku != 11) {
			$mongon = preg_replace("/\+e.*-e/u", "", $mongon);
		}
		if ($this->jinkaku != 26) {
			$mongon = preg_replace("/\+t.*-t/u", "", $mongon);
		}
		if ($this->jinkaku != 10 && $this->jinkaku != 20) {
			$mongon = preg_replace("/\+g.*-g/u", "", $mongon);
		}
		$mongon = preg_replace("/[\-\+][0-9a-z]+/u", "", $mongon);
		
		return($mongon);
	}
	
	private function f($i) {
		$i += $i % 2;
		$i = (int)($i / 2);
		if ($i == 0) {
			$i = 5;
		}
		$i -= 1;
		return($i);
	}
}
?>
