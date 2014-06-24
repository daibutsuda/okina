<?php
Class Kanji {
	private $kanji = [
		"",
		"$B$/$7$D$N$X%N%U%X%l0l25$C!<!<P!P((B",
		"$B$$$&$3$F$H$R$a$j$k$m$s%"%$%+%/%3%9%;%=%H%J%K%L%O%R%^%`%a%d%f%i%j%k%oF~NOCz?MFsN;G5KtEa$Z%W%Z$#$%%!%#%c%e%sKNQ\R8P1lIlH!:RS(B",
		"$B$"$($+$1$5$9$;$=$A$K$_$b$d$f$h$i$l$o$p%&%(%*%-%1%5%7%?%A%D%F%_%b%h%m%q%r8J>e>.Bg@nEZ5]8}9);R@i@#>f5WK^;N=w;02<;3K44]43LiL&6R<[?OM<K^$0$8$E$Y$T%V%Y%Q%T$!$'$c$e$g%%%'%)%g%v%CVaVx:5Q:P28pW5P$US(B",
		"$B$-$?$L$M$O$U$^$`$r%M%[%pE7J80f:#8$Fb8aEMIW5Z2pJ}2=2PJR8x@ZLZ6TF|LS859&;M;Y;a?N?4?eC0B@Cf7n<j8MM';_H?Hf0zJ,>#M=:M2&5m7gIcIT1/G7GC0tD^Uz4"6'888_<\>/>iD$FVI$LhLq$4$G$I$S%,%0%4%:%<%>%I%P%S$*$)4#F{2gFw?QL`P;L^RFP6QB8{5XW7XyZ[1>[)P<(B",
		"$B$[$q7jFt4E8^@88y=P;T@P1J5V1{5p2D2CHi9CKL6g7;8<8E;%:8Gr<(;J<gKv@$@g@530Be9*B>EDL1N)E_I[J?J:JlK\LpM3MQNa;KI91&=<@j;E6LJqL\H>L$>$0J3p90B~C61,4$P'1;I%K31z3n4)5n6+:};.<:<|?=@MFLE[I,IUL7MD$,$2$6$:$<$>$B$Q$W%.%2%6%8%@%B%E%G%]?=@MIUL7MD$J?,8C2S%tUTPBJ[;FP#R[RITqPAJ&P@QVP?FcV'QFT)B|AYU`QGR]RHVb(B",
		"$BO;9gM-0B8r;j;e?'0u1'BG0aB?<}3F3%5Y6&5H4y5a7l8w9%:F:_Aa@><0<!?C<kA4@hBpC]CO;{G/F1Cg1)=.IzHAJF6J8~L>I4MS9T>"O76D<+2sB8C{Fy<iCnG!9M000K6)4l7=8`>1DuOK>g0g:c11:!EGL6<)=AHH0x4L4k4m5`7:7o9!;];z<*=\@eG$H2H^KQLQMyNsNtFdKr$.$@$P$V$]%\=#<5A$Z@1H[*Q^=?V(OJX|T*PDTlff0P@m[3[5QU=HggPCTr[4CP[7fP5I1%iHD_Qf:1(B",
		"$B@VB-JbCS8@GlLr9>Hx1dCKG&9n2~7A4@2f3Q3-407/6Q6c4t4u5f998b96:4:d:nN$;G?-;V;d?y=;=u?aB+B<C+9pMx>2H<EX=iJ<=(NIC"@.<V8+?ID.M>L/<7DoDcNdK7?H0I9(8cM$M{5|FSC$<.O$NbJc0}6z24AWDQ[8O4:AAT>sK:2@Lj9f1x5[K;Kh0L2?4^4w5Q686I7O9'9#:$:R:`;w=xAvBEDhDnEjF&G"G%H=H]JLMqLH;`ENM8J)$\AT2@Ljn7[<l5d}[9F]V`HPL]TcHF;ZPGl8Ts:3<^2|5b[:FrR_V*H_MEFER"WGR`R#U$U%PHT/Y,PE58<]U+Z]BqZAPFQ<QHU{T.owKJa5PJUU]hV,9eRb(B",
		"$B@DL@L#;P0!0M5oE~4d0Q<uKe@+>5;^0W1jGD2-@^2B2w3Y6bH`8G5~6(4q5(6u897h8I;y:+Dj:J<~;H=j<K?b@,B4=!BnCiIpCNDZE*E5<hD9>0D>NSI~H)G0H,K<I\J*4,>>KRE9L?LkLg9,5}OBCh@/4_1+ElHDF}=G41Mh>:1w6U6j8W:SJ~F`>;97:;PR2"=G2,I`9.5O:%B6Ri1bVgIlWI6j07AhN>5%5;93>6>uD@HcI^KWM^La1}272L2}2x3/596!6q6~7t8F9N9o:~;O;I;v?f@)@N@ODlFGFOGUHGHsJ|JtKgL(LUNc5j8LH\LR6FBA4&<R;x[FQ;P3PTWRKq]jEfc=Z_A$7#p2Q=9zHzGGV-75H!QbRtZbZaRKD!T3EFA;V.QkKmBR<3GV9:c+PQV309:*V277PLP7EJTt[CPUQXPS[@f5M`[AiIPK088H]b>*b3p0PNWX0?UW[BC3Ro[MRjU(Y2Y3[DY5ghV>Z^R$V0V1cVRvFY]pRp<v8s`(]nPPWWWp]mPMT0mBQ@(B",
		"$BAj=)><8|8eL}73K"M&@t5'0r0RH~2!201K<#3@=E7?2O3&2J4N3WIw9a=U6e5RI15*9H<s7z7W@'A0DbEYE\HtF=GqGHH42;B'8*BTFn3'<<LxJ]BYN'JY=S?.B/;Q@k1GBs@wClJA>J:=I=MWH*Dg>SIkLLC:AU;\K!CG5R7@:i@1>BB%CJCWFMDkIJI'FzN<:HNgKoI"DN0ZmoGp3A5@6i8QflKsM.?SDT<FFJI*fj:t7)1N6"e!9~J'B(1h5c5q6794;c>7@-@[CmCjDqE%GRGoHdHgInJ(JzK[Ku0%0y1V9D2M4G4'505T5^788N8O9Y8t:::r:o;W=@=b?)?/?c@7BQBUD{ICIiIuJXK?KAK_LsM)NRTwR&8UZeH}M(Wf^YDSU*b@2v18Zd4;T;LEQA0:QWpl4H0#_[Lb_W_X[+a(pjb#b?a8P]P^N70(QnUqKw]wT:2iYE2dP4S|9}[,[HWLT6[L[=ZfS&V5PXd~U-_Y[P[KBHgjP\T7c;RyW^WN4/`)JGI]W9]vYDYAGjoYY(0v9$Qo1e^$[Ibb1eV"T8bfKfH{Df]k]x[NTuWiY@Rw=6]uYB]}PW_\csY>(B",
		"$B==HJ@v0w2H3hKd0iGO>P@p28545/5\7s2F3t3J<m?@2V639;5$]f5i5-9L8u8K9?9W9b9d91E/??Eg;~=&:b:K>h=y:B?K<`@J@rADAGB9BwD?CaDEDmJ4F6N.;XDA:,86K'NQHn1WJvLfMNN1GK;}717,<G<M;fG<E81cAR8.:9>k;UKBF$HLG\2jMFN998Zg6^6M<S?A:s?8H;6\6kM47K7*='9INh3)S'1(F$=$5h2e2Q8*>k5N8ve&8TbC3|Wv<Z;U=z<r=cIgEm3x`a@4[_5NEV<eH+[YJ;KC=d?W7B8z;h3g6.9i:(=-=KD)GIGY0F2'2c323K628D8d9R9|:6:O:w<@=Z=q>,>I?+?1?h@&@IAEB)CMCQC\CoELEbE`E]FCG[GPHIHkHhI6IBJ6JoJpK$K6L<LWNANu<T2`=T^-^+7}8v=zZpBo14N?OAIg=$=c[YJwc-[aV<Gm0"4<d"lbE#gV|bU/{|a=GNU1GifQ5K@(gn3f7ef6|bA.^,Ki``jOJ`ZhU36*iNI?`E`CfMiO]V6fc,T=:u;9;/9O[[YK2zfBW2m;`]?DYOL=PjiJU.^0c.fV1LZi0DPdjV[^Y=Y<R'U0S,Ub[ZYIcu<&S)`Bn]cXWn_^PkWrT?T@P+WsT<P8V;V6a7Tyc?1*lCe$^(b.S/I3cmJBC?bAWq`D6}a<PnYN`_QO?VcAV7__:VPan[WmPhS.Zj^*^)Tx>%WtL0TBbDbEWMmtS(PiC):h(B",
		"$B>OKc:L4%0\9`>'F0F@IbG_1:1Q1Y3$BS8f65=*B&7x:04*4p4s5_5,:j5{6aAHK.9q6hR?7r7<8&9/5v;28g:Y>-=I>o>M?BLP;g<cAc@l@_@cGXAb?rA%D"D&D/N3D`DeE+BhIRF2LnK>HNJV7!:WO/69M#O2IXMGD%M*L26vMaL)D;4c>&B2D:L3DdID=,<PCkB^G~Ld041q9@IK</3}FRI7bHg}ZnFaM|2X:{cyM.WB7M0C234S3^Gt3a6|b):{=><n?}C,B]B^L3Dtj[NBIdPsG8D[Bo<6<DgwsN=h2>7^>r6l<Y0_2y4{64=vD<K&52;&>C?;F?HoJa0h3#45:';:<9<O<X<d=Q=n>D>Y>R?d@U@{A<AFAkCbFZFpG4GLGTG]GuI<IOI{JDJPJxM_MbN(N,N_0N7wHUN2]\hA768>8h;)<EZoAVD]DpVE>?;D<l=^<n=>K,[jVCV?T"V?FQ0SZmgUe+a*3=3uyuzb{Dcwa)z1f9guZEEHB53q9<[pVi?6^4BIUr>};BcxM0[kQ`2W[qyuz3{Dn_:kB[?Zbkfpgp:"S{gWpU^5U7g~YP7>^7CwU6Nj^6j^Pq^2Zk[uO5Dr@L8#[f<=X&BCpo_b[`UsVhgtZlE<VFVGZq[lgX1ke(3"c/^3goS6ZO8?c}RXYRU9iYQ]^:V=O,K#BOgx0'fDX"]KfYYQ33S0^%WOP:fqV@[hW:b(fte%KYR(B*`bU4VDY`c1S;I-gyTAe)a>qDfubGgrRT(B",
		"$B>=@u9S4v0m?"1@7CX*1[=0M:>!4(3]3+4W4n7J@6=J6Z5kAp9u8=:.:vCc:G>l>8>p<N?9?<=g>Q;k@9;lA1@2A3E:B:ABG=BXLT0Y@dCyCeDiE!EoE{EPE}F9FuHVH/C*GnGwI.7kO+R)NC@GEyKI?RD+2l4V4:3L>t5e?"<xC5C8C;9E6/Dx2mM}0+FXFWHe0<Mr3.6,6V5)CRDGAZC'=_?\C8e/4g4|5.ia:e8SA>ZnOFLIMd8'c~:fC^J%0@0q\*?zD[>lIH2hE3C16;6<:[;7;iL.N^0-0[1U2+2_365u95:N>j?x@K@\A]EiEpGS1S393d4>4=4~4}5=5J5w8:8[9J:>?];6;1<4=8="=[>Z>[>K>G?GL;AJAOASB_4.D6DKEzF8F_GcG^HqHaHbHwI>IaI|I}J=JsKGK@K9K5L5MmN!NLNvOGOSN:7fFhL:ml0TI2=WfFCv=R<l4|5.>]IY>9^<6,t!d-\#IZN0X)ov5P4!Ex^IA=A>c[b+Zn7vh$h71aN+ZrIL@TnXb+7Ue1iba\diH5D=6tTe0m`*HTNT6O;[0OT#HCZHI+^F`i`f`gH:G1jbk9Tff]YXb*:T0X^>@3U;a!J{TGi`5E9"N{b$^JX.TdD[H#SJh,SD1A1<o``JH&OPd%QZ`IXISFqH\'\/SAo\[yX-X,^A3?n9o]B{WSX0h%Mle,q$^LVJ_dSHW/^@[}^;<H^KTE\%^QWE\"THSBPzSC^=bmd#d$7ad7d8h'4-J7\,GA\2P|kEP0Y]VHd=mcpW?Y^NEqLe\)Ai\+Ug0ADO\-[s`5`4UZpVY[9{Qsj_n:^BX1X'Zsh!Y_^Gfx6we-\$^DYYJ2YWa4SGlLcp(B",
		"$B2qPr0&MH=kEv?70UHSN"1`1l1_T$1tA[442Y2r6P6K8(5A7I7P9A:P;LO)@;Aq;q;mNk@*B`CUDMEAQ#Im8]>HEOG-G@H-M5ErMkMpP,EE6W42JdEcM1DsNmNwHj6X79Au1vD7EBFD0$Zv0/0jGkFo:7DX=mLwBvL-KSNGO=h=H7\?Ivf{LmMLM/NV:@=XaD10T|`h>ECZEBK*DvI#=]6,6>:IB}FjZu\4M,p5A'LlAMG`1g4PH94P7TAK5U:UAwDIF(LB?0A^G:IS3i5S7G=MC&IA0.0{1|12494x<><QB,BFJgL{O-Mo0E2K2G7$2t3:3S464h5M6H6r727y8X8k:D:\:E;n=7=%=}>\?g@WA:B1CHDBDzEIF/HQHyLAMBOCOE;s=F?#K(kN?pps?s1gd*\@p61rL+bn2._j8P7~bJh7cHcIb,E62.L+y`^Zh0cP\7R-h;X:8ZF\6sikX4X;>`h6BKOMbLX9\Cy`{JZxN#GJA?SN:l_eGa\5^XkQ\;5t^P^S^\^OMiYdFkqRH|3Ce6e7h5X6@yh2lKEdf:KZ[?^Tnmna`OFNcGje^V^]8YO1nkAN\ASK^WG|e8\6SQTMORP~e9fhadC9ROV|^b7S\:nhdlYhU=h>c2\DEkmdE$\8U@TJ7X^[6YcF\>h.fi377"MCB7P9p;`kh<X5^Uh3jKL|Ztp4eFWCd(e4rlsk\9X3Tme5SMh/YedkbMZwZXh8_hYbY"X?ij^ah1mqnl3Cd+npM2gv`;bqTIsi(B",
		"$B>40]2N1I\F1nCV29A|4I;;7Z2Z;t6-4z5F6d74BV8;<w9k<BUiB$;@@??5<"=`@b@:@@C<DLO"9BMOM?MANNO:LJB.?^F<ES3j:Z?2MgCD<oBPUtBfHBJ!J99ZIq9vI!LDF):2;!OH9KG'KkL4@~0=2E?:?iDwJe>Tq%D*HlJK7'<$8j1MAnH%^f3!e::<@YK1eE9K0;1]?{7&^d:gEhA-kVt"L'hNAd?`?~DH;bAnI)kUdq8VKHFP74;|ld0)8j?T@Fsn8B9_>N?h@BA\C`2[566]7LCx92D1MI2R3l:q=p>)>~B;C2JhK0LGCBIP2U2I3U5?8m8l9=9s;o<{=N@=BLC%CdG+H3H6IeKMLVM6MYN=NP:a`vKj;|A-Th\RLCN/gPT%XFF:t&_f_gV~V}19\T`pcJNzV:EhL*gJ\WoadYCXh@mrG6{zTOT&hMjiQ%ipGs1B^pSX0neCjj3RXEh?\XC(d0d19^YjO9hG[!Ggp]pXe=DVfG\GfC<zJnhLl>>X0`mKYnbO^k06hRA9a,Q*ozd9VQXGkShKUuYl`obu^mf\bshD`m?*AX7HZ8D8\YW!Tk\QYmXBoyqIjmb8`qppd3REhEkX9PT}`Rdojk^h`S>(afjhntXDQ"luVP\Jf,nsd6SWmpiqhQ1^\He>3G6#UEFx_m_nXC(B",
		"$B51G.0p0o1!GdlN<?=o2/N86=Mn4A3N1F8-?t57Jk7D7u>^?JI_?XKO@aD4E&E0FAItHOJ"MUH"9-W"K`K|h_K~M\3ZNX9x3TCLHWJ>JT1i1o1T1\<q475yCFE)DyN}0*DP6pD3NJN\7E5#=f423k2o5#:<?[HuGkH(>@H$A}8R3~F!4eb|3_01HX<L2$2%2A?u=|JE0V;4=5?lBaG>M9;uArGQ34A)BZD2GyO00^2]2T4K4F5g6[7`9F;C;r<A=O>W?3?L@AAeCsDFE(F'GZGeHmI8IjJ@J^K+K=L%M+MRMzN@O@359r<'A2A~D'DRH1I:J#JiK}L!MMO3^{4r_f5CkY=fQ[sUA}LOgTGkF>t%QxQzQyQ{^`b{9w0HJ_h]`rlMA(eJCtUFUGz:I@G#p=IxEQh92\AfN-\[rmg6K/@}d>y~W$?_@fW\\]I&aieKhS_qmwN*cKW<ZKt$9m={\bb}JS1=@"O%mzrnrod;]`i}IFTSYug'`esOsPf~S\Q.IrQ3G,\g\dTXBDXThXh^bxVWnMqK^w`u\i\jajcMp<_"S]o~jnVSUHlweHf;bybTVq`smS?Up>VpKKhY>3RR^seI`tj"iz7Nc4]?p#5&iwTWqLk\hTg)(B",
		"$B6GFF7.1"4oD,=a1?1R2#3XU\3c<y7i5!7{JI7Vj%=D=B_'@E>{@!@QA,C#C[C_DDETEtEuF;F,66KaMjF3E1E|=tF+N&NM?F0>3r55s}6S5LAsMVM~Cv3{eQ8oBiC.N65xGEQ~CE<,g/D5ER3wpC;,P.4Rk]1PG{q18)eQ4Y:^N5Gf2a6x>F?kJWM70c>x@oIQ6E7F9]9U:&:x?n@0ByF^G3J3KEM"M;O?1Z2n;#@xBzJ/J.KPL[NrNqF41C_y<tM!PVZ|J+38hdb5Iog[1mK)pPjL4Bf`p9Ny>Up9NydthcXb0,L,dBdCK)g0<2eSR.4M\qF[<bm}D|_/p@IGhh1um|dA;p;Ab:\tNU1O1PKTd@@CJOdDoe`wk_c!60o#r:XZ<J>dKy=4`x_s@qkeeX=/m?rsbU>AFKmU\w9ypDXmr*l3_tF5_)hfhmDYG2SeU]X]_ub~hpX_QC_3o"TT5+;53<Y{l`r!qP\ohk?mD}rupBn(8Aj2j1LX1.jsj'Y|k^gKZ{(B",
		"$B1DS[1s1~Xf21CC8,6?3,7pQ-:XAzBt_7HKK%O#G;M[Jf6yAmA`N44[FH`WM%NeR/A/fa0kAoO!F7LoNfBc2b5G=YCIDU_:;8=lNFVV0~7(7-80<DFiI0[XeACEFPIE3`E|@S;-L_rwJk05TZ@<Br5qC4E@D~8!\}Bb8/A5=V3E3m5<6:9V9X:);$<U=9=L=~>LAgBuF%NE487cMXMJNl5:7bIfJ0Kl5r@SW=4\c78icOcOfbe_dL4ZAlzp|OI;{ic8[#9GbWdN|Og]dK16e`hz<C>af!o(Mf](f_N~DW[/hqc6kv2^:z_4\ye\?$BWhtdG`/TVD\XlXiq2>_XnQ4Z%RYVXl~_20G7Rg3\zg!["d,g1c$]!]"SfVYk1_}I(KnB=e]r|ko`yohoir=paeY1EfJL"b;b<=+dIokcc9hJ5(B",
		"$B?%4D53;(DCIM_@Nic96`5sZ)MK3M5"]EK-3y8qK{9c?w`"=l1-HYDJqFLYdO5lgQ0e:QE>N]3V3[4J4i:??&A6ACBjJ$JJL~NHNW<_McKD<WAxE,Iy>Vc&ZYZZ_;A7bYlSeZAy^9Eszph{]$o/3;]%p8p7cbo.eh]&AQJ\FTnAIsOOl4G(nP9jkps&a1[mfL2(RVAPsl]CY's#E'T]r2bZ`z<Ii#i"Shs!s"o0MPEn3\nZfKo1_>egs\_=jwr4j59t]'[nj|j{qVF"m[@XT^cR_?(B",
		"$B3(ei2:L86@<14X4QFqFl?E>cNo6_4+3HZ2N`BdNKK2226{N|3*5BNDCY<-1$4j7+<%GzJmN%3OKzB#D(Mt=CA&Gv0d;?=eA*A+:]Fe7_MZt#G)G*jYO<E"C@g<`ZNDC@g<opi+s);*bjEWBMdUE-sJ]+],O&a"i,rPGhj$>qi0g?i2[%[&E2_FHvi-=3rOi/_Cs(s,pm[1`{sSC~i)g>f@Gxf=f>E?L9lUpqpkk}G?o4_Hs'i3W*Tbejj8aFaGTU2ucSkzZ5i1j;lVaEj}]#Cu_L]*(B",
		"$B8770>b3Pk4B"i67Q>n@%JuUoBlO*MeMTMu3>;'ONO'E^<aLu8%?(5D6%7|@R7YIhA{F.5>Np4THrNY2{BmdzUpb_6Bzsn2oAOL[EH'UPzsq^l#F*F-nYrQTadys*iZ3B>mTa_Kf"eli5i7Sms^_Jq)q(Snc*m1i4ceekdVq=bh9\_OrYrWQ?o=sD[0(B",
		"$B:y]/LtB3etE4oEM@l%7\8nK]GFF#Da6`rtdX7]i:81B04O8\KbLvMsHMXg6ni.Ly2)oDnncTd[d\i;ever9lmDE;eus0mgR!IIqABx?on.6oq\c^3vi<n3r#V[_RoB`%Q6f#UejAs1Xrr^0sdW_Qr5r`q_Sr`|_PgbsMV$n1(B",
		"$B1#8"@]JUn4HZ1X6A>w02172*dF\^@`>v=1AtD04?CrFIMwLziCn5AIi?O6dxYpl&cdC-7%`}`~oIrM03qbiBFvmncU]0r$Xtgcgds:k5s9m6fep,pIgCsWd]]Di=(B",
		"$BBNqs829[NxXxJQ4`MvN[1XOIFg4U6C?q83A!oL]3V^p}m<m=_SNZKppTYx3Iews>oJqd3od^s<(B",
		"$BNn1pBk>y:m1vsE;=>zB!>|>yoNoOf3k+l*mAm@p/r&pKrgb`Z<k'gf(B",
		"$B4QHZjGD#dak7oPiGpO(B",
		"$BOQl-;>r-qgn6(B",
		"$Brin6oSoTrioUq#qiqhsb(B",
		"$B]6oX(B",
		"$B]515qk`&(B",
		"$BsB(B"
	];
	private $kakusu;
	
	public function Kanji() {
		for ($i = 0; $i < count($this->kanji); $i++) {
			$k = $i > 31 ? $i - 31 : $i;
			for ($j = 0; $j < mb_strlen($this->kanji[$i], "utf-8"); $j++) {
				$c = mb_substr($this->kanji[$i], $j, 1, "utf-8");
				$this->kakusu[$c] = $k;
			}
		}
	}
	
	public function kakusu($moji) {
		$k = $this->kakusu[$moji];
		return(is_numeric($k) ? $k : 0);
	}
}
?>
