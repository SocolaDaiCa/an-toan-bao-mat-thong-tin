<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-24 07:22:12
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-24 22:48:18
 */
?>
	<div class="container-fluid" id="dsa">
		<h2>DSA</h2> - Tạo khóa (p, q, g)
		<br> p =
		<input type="text" size="1" v-model="p">, q =
		<input type="text" size="1" v-model="q">, h =
		<input type="text" size="1" v-model="h">, g = ?
		<br> Người sử dụng chọn khóa riêng x<sub>A</sub> =
		<input type="text" size="1" v-model="xA">
		<br> Khóa công khai y<sub>A</sub> = ?
		<br> Tạo chữ ký
		<br> H M -> H(M) = <input type="text" size="1" v-model="hM">
		<br> Sinh ngẫu nhiên k =
		<input type="text" size="1" v-model="k">
		<br> Tính chữ ký (r, s) = ?
		<br>
		<br>
		<template v-if="run">
			<b><u>Giải</u></b>
			<br> - <b>Ta có:</b>
			<br>g = h<sup>(p - 1)/q</sup> mod p
			<br>&nbsp;&nbsp; = {{h}}<sup>{{p - 1}} / {{q}}</sup> mod {{p}}
			<br>&nbsp;&nbsp; = {{h}}<sup>{{(p - 1) / q}}</sup> mod {{p}}
			<br>&nbsp;&nbsp; = {{g}}
			<br>y<sub>A</sub> = g<sup>x<sub>A</sub></sup> mod p
			<br>&nbsp;&nbsp;&nbsp; = {{g}}<sup>{{xA}}</sup> mod {{p}}
			<mod-template v-bind:items="arr.yA" :p="p"></mod-template>
			<br>
			<br>- Tính chữ ký (r, s)
			<br>
			<br>r = (g<sup>k</sup> mod p) mod q
			<br>g<sup>k</sup> mod p = {{g}}<sup>{{k}}</sup> mod {{p}}
			<mod-template :items="arr.gkp" :p="p"></mod-template>
			<br>r = (g<sup>k</sup> mod p) mod q = {{gkp}} mod {{q}} = {{r}}
			<br> s = [k<sup>-1</sup> * (H(M) + x * r)] mod q
			<br> = [{{k}}<sup>-1</sup> * ({{hM}} + {{xA}} * {{r}})] mod {{q}}
			<br> = ({{k_}} * {{hM + xA * r}}) mod {{q}}
			<br> = {{s}}
			<br> Suy ra chữ ký (r, s) = ({{r}}, {{s}})
			<br>- Kiểm tra chữ ký
			<br>W = s<sup>-1</sup> mod q = {{s}}<sup>-1</sup> mod {{q}} = {{W}}
			<br>U<sub>1</sub> = [H(M) * W] mod q = {{hM}} * {{W}} mod  {{q}}= {{U1}}
			<br>U<sub>2</sub> = (r * W) mod q = {{r}} * {{W}} mod {{q}} = {{U2}}
			<br>V = [g<sup>U1</sup> * y<sup>U2</sup> mod p] mod q
			<br> = [{{g}}<sup>{{U1}}</sup> * {{yA}}<sup>{{U2}}</sup> mod {{p}}] mod {{q}}
			<br> = [({{gU1}} * {{yU2}}) mod {{p}}] mod {{q}}
			<br> = {{(gU1 * yU2) % p}} mod {{q}} = {{V}}
			<br>Kết luận: V <span v-if="V == r">= r (Chữ kí đúng)</span><span v-else>!= r (Chữ ký sai)</span>
		</template>
	</div>
	<script src="js/dsa.js"></script>
