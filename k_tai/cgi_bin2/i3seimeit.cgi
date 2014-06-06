#!/usr/local/bin/perl
$|=1;
require "jcode.pl";
require "cgi-lib.pl";
require "kakusu.pl";
require "reii.pl";
require "seikaku.pl";
require "kenkou.pl";

#短縮パス定義
#ディレクトリ.~kazu-y/k_taiのアクセスは、http://k-tai.net/acg.aspからのみ許可
$root = 'http://k-tai.net/acg.asp?U=http://www2.mahoroba.ne.jp/~kazu-y/k_tai';
$cgipath = 'http://k-tai.net/acg.asp';
$baseurl = 'http://www2.mahoroba.ne.jp/~kazu-y/k_tai';

# CGI変数取りこみ
&ReadParse();
$sei = $in{'sei'};
$mei = $in{'mei'};
$sex = $in{'sex'};
$marry = $in{'marry'};

$seimei = $sei.$mei;
$incode = &jcode'getcode(*seimei);
if ($incode ne "sjis") {
&jcode'convert(*sei, "sjis", $incode);
&jcode'convert(*mei, "sjis", $incode);
}

$sei =~ s/\s//g;
$mei =~ s/\s//g;

$sei =~ s/\x81\x40//g;
$mei =~ s/\x81\x40//g;

#姓名の入力がない場合は、入力画面に戻る
if ($sei eq "" || $mei eq "") {
	print "Location: $root/i-mode2.shtml\n\n";
	exit;
}

$sei1 = $sei;
$mei1 = $mei;

# 々の処理
$sei1 =~ s/(..)\x81\x58/$1$1/;
$mei1 =~ s/(..)\x81\x58/$1$1/;

# ゝの処理
$sei1 =~ s/(..)\x81\x54/$1$1/;
$mei1 =~ s/(..)\x81\x54/$1$1/;

# 仝の処理
$sei1 =~ s/(..)\x81\x57/$1$1/;
$mei1 =~ s/(..)\x81\x57/$1$1/;

# 天画・人画・地画・外画・総画の算出(結構ややこしい)
$kakusu{'tenkaku'} = 0;
$kakusu{'chikaku'} = 0;
$kakusu{'gaikaku'} = 0;
$kakusu{'soukaku'} = 0;
@error = ();

# 天画の算出
for ($i = 0; $i<length($sei1); $i+=2) {
	$kanji = substr($sei1, $i, 2);
	$kakusu = &kakusu($kanji);
	if ($kakusu == 0) {
		push (@error, $kanji);
	}
	$kakusu{'tenkaku'} += $kakusu;
}

# 一文字姓の処理
if (length($sei1) == 2) {
	$kakusu{'tenkaku'}++; # 一画借りる
	$kakusu{'gaikaku'}++;
	$kakusu{'soukaku'}--; # 一画返す
}

# 人画の算出
$kakusu{'jinkaku'} = &kakusu(substr($sei1, length($sei1)-2, 2)) + &kakusu(substr($mei1, 0, 2));

# 地画の算出
for ($i = 0; $i<length($mei1); $i+=2) {
	$kanji = substr($mei1, $i, 2);
	$kakusu = &kakusu($kanji);
	if ($kakusu == 0) {
		push (@error, $kanji);
	}
	$kakusu{'chikaku'} += $kakusu;
}

# 一文字名の処理
if (length($mei1) == 2) {
	$kakusu{'chikaku'}++; # 一画借りる
	$kakusu{'gaikaku'}++;
	$kakusu{'soukaku'}--; # 一画返す
}

# 総画・外画の算出
$kakusu{'soukaku'} += $kakusu{'tenkaku'} + $kakusu{'chikaku'};
$kakusu{'gaikaku'} += $kakusu{'soukaku'} - $kakusu{'jinkaku'};

# オーバーフロー処理 - ちなみに > 81は間違いではない。
foreach (keys %kakusu) {
	$kakusu{$_} %= 80 if ($kakusu{$_} > 81);
}

# 天画・人画・地画の下一桁の算出(10で割った余りを取るだけ)
$tenshimo = $kakusu{'tenkaku'} % 10;
$jinshimo = $kakusu{'jinkaku'} % 10;
$chishimo = $kakusu{'chikaku'} % 10;

# 性格診断の準備
$kakusu{'seikaku'} = $jinshimo;

# 陰陽五行のシリアル番号の算出(詳しくはkenkou.plを参照)
$kakusu{'kenkou'} = &f($tenshimo)*25 + &f($jinshimo) *5 + &f($chishimo);

# 占い結果の整形処理
foreach (keys %kakusu) {
	if ($_ eq "kenkou") {
		$res{$_} = $kenkou[$kakusu{$_}];
	} elsif ($_ eq "seikaku") {
		$res{$_} = $seikaku[$kakusu{$_}];
	} else {
		$res{$_} = $reii[$kakusu{$_}];
	}
	$res{$_} =~ s/\+n/<BR>/g;
	$res{$_} =~ s/\+w.*-w//g if ($sex ne "female");
	$res{$_} =~ s/\+m.*-m//g if ($sex ne "male");
	$res{$_} =~ s/\+k.*-k//g if ($marry ne "yes");
	$res{$_} =~ s/\+u.*-u//g if ($marry ne "no");
	$res{$_} =~ s/\+j.*-j//g if ($_ ne "jinkaku");
	$res{$_} =~ s/\+s.*-s//g if ($_ ne "soukaku");
	$res{$_} =~ s/\+o.*-o//g if ($_ ne "gaikaku");
	$res{$_} =~ s/\+e.*-e//g if ($kakusu{'chikaku'} != 11);
	$res{$_} =~ s/\+t.*-t//g if ($kakusu{'jinkaku'} != 26);
	$res{$_} =~ s/\+g.*-g//g if ($kakusu{'jinkaku'} != 10 && $kakusu{'jinkaku'} != 20);
	$res{$_} =~ s/[\-\+][a-z]//g;
	$res{$_} =~ s/<BR>$//g;
}

#以下結果HTML文表示
if ($#error >= 0) {
	# エラー漢字が一文字でもあればエラー表示
	$msg = <<"EOK";
Content-type: text/html
<HTML>
<HEAD>
   <TITLE>エラーメッセージ</TITLE>
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=SHIFT_JIS">
</HEAD>
<BODY BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#0000FF">
<P>
<HR>

<FONT COLOR="#FF0000">入力された漢字｢\$error｣が判別できません。</FONT><BR>

<HR>
誠に恐れ入りますが、下記の送信フォームをご確認後、｢送信｣ボタンを押して下さい。<BR>
正確な画数判定を行い、ＤＢを修正し、ご指定のメールアドレスまで連絡差し上げます。</P>

<P><FORM ACTION="$baseurl/cgi_bin2/i-n_mailt.cgi" METHOD=POST>
   <P>エラーになった漢字：<INPUT TYPE=hidden NAME=kanji VALUE="\$error" size=10 maxlength=10>\$error<BR>
   あなた様のお名前：<INPUT TYPE=text NAME=name2 VALUE="\$seimei" ISTYLE="1" SIZE=10 MAXLENGTH=10><BR>
   メールアドレス：<INPUT TYPE=text NAME=email2 VALUE="" ISTYLE="3" SIZE=16 MAXLENGTH=256><BR></P>
   <INPUT TYPE=submit NAME="送信" VALUE="送信"><BR>
   <INPUT TYPE=reset VALUE="取り消し">
</FORM></P>

<P>
<HR>
<A HREF="$baseurl/i-mode2.shtml" accesskey=1>1→もう一度鑑定する。</A><BR>
<A HREF="$baseurl/i-info.html" accesskey=3>3→翁からのお知らせを読む。</A><BR>
</P>
</BODY>
</HTML>
EOK
	&jcode'convert(*msg, "sjis", "euc");
	$msg =~ s/\$seimei/$sei $mei/g;
	$msg =~ s/\$error/@error/g;
	print $msg;
} else {
	# 判定結果表示
	$msg = <<"EOM";
Content-type: text/html
<HTML>
<HEAD>
   <TITLE>山本翁の鑑定結果(3/6)</TITLE>
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=SHIFT_JIS">
</HEAD>
<BODY BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#0000FF">
<P>
<HR>

\$seimeiさんへの助言(3/6)<BR>

<HR>
<FONT COLOR="#FF3300"><U>健康運(体調・精神)</U>
；例え吉数揃いの姓名であっても、健康に恵まれなければ活かさせません。</FONT></P>

<P>$res{'kenkou'}</P>

<P><FORM ACTION="$baseurl/cgi_bin2/i4seimeit.cgi" METHOD=POST>
   <P><INPUT TYPE=hidden NAME=sei VALUE="\$sei" size=10 maxlength=10>
   <INPUT TYPE=hidden NAME=mei VALUE="\$mei" size=10 maxlength=10>
   <INPUT TYPE=hidden NAME=sex VALUE="\$sex" size=10 maxlength=10>
   <INPUT TYPE=hidden NAME=marry VALUE="\$marry" size=10 maxlength=10></P>
   <INPUT TYPE=submit NAME="送信" VALUE="性格へ"><BR>
</FORM></P>

</BODY>
</HTML>
EOM
	&jcode'convert(*msg, "sjis", "euc");
	$msg =~ s/\$seimei/$sei $mei/g;
	$msg =~ s/\$sei/$sei/g;
	$msg =~ s/\$mei/$mei/g;
	$msg =~ s/\$sex/$sex/g;
	$msg =~ s/\$marry/$marry/g;
	print $msg;
}
_END_