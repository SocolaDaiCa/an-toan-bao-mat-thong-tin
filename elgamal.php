<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-25 21:08:49
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-25 22:18:38
 */
?>
<div class="container-fluid" id="elgamal">
	q = <input type="text" v-model="q" size="1">, g = <input type="text" v-model="g" size="1">
	<br>Người sử dụng A chọn x<sub>A</sub> = <input type="text" v-model="xA" size="1">
	<br> y<sub>A</sub> = ?
	<br>Người sử dụng B mã m = <input type="text" v-model="m" size="1">, k = <input type="text" v-model="k" size="1">, (c<sub>1</sub>,c<sub>2</sub>) = ?
	<template v-if="run">
		<br><b><u>Giải</u></b>
		<br>y<sub>A</sub> = g<sup>x<sub>A</sub></sup> mod q
		<br>&nbsp;&nbsp;&nbsp; = {{g}}<sup>{{xA}}</sup> mod {{q}}
		<mod-template :items="arr.yA" :p="q"></mod-template>
		<br>
		<br>Người sử dụng B mã m = {{m}}, k = {{k}}
		<br>C<sub>1</sub> = g<sup>k</sup> mod q
		<br>&nbsp;&nbsp;&nbsp; = {{g}}<sup>{{k}}</sup> mod {{q}}
		<mod-template :items="arr.C1" :p="q"></mod-template>
		<br>
		<br>C<sub>2</sub> = (m * y<sub>A</sub><sup>k</sup>) mod q
		<br>&nbsp;&nbsp;&nbsp; = ({{m}} * {{yA}}<sup>{{k}}</sup>) mod {{q}}
		<mod-template :items="arr.C2" :p="q"></mod-template>
		<br>
		=> (C1, C2) = ({{C1}}, {{C2}}) => A
		<br><br>Nguời sửa dụng A giải mã:
		<br> m = C<sub>2</sub> * (C<sub>1</sub><sup>x<sub>A</sub></sup>)<sup>-1</sup> mod q
		<br>&nbsp;&nbsp;&nbsp; = {{C2}} * ({{C1}}<sup>{{xA}}</sup>)<sup>-1</sup> mod {{q}}
		<br><br>
		{{C1}}<sup>{{xA}}</sup> mod {{q}} =
		<mod-template :items="arr.C1xA" :p="q"></mod-template>
		<br>
		<br>
		<modulo-template :items="arr.C1xAq" :p="q"></modulo-template>
		{{C1xA}}<sup>-1</sup> mod {{q}} = {{C1xAq}}
		<br>m = ({{C2}} * {{C1xAq}}) mod {{q}} = {{m2}}
		<br>KL : <span v-if="m == m2">Đúng</span><span v-else>sai</span>
	</template>
</div>
<script>
	'use strict';
	const elgamalApp = new Vue({
		el: '#elgamal',
		data: {
			q: 353,
			g: 3,
			xA: 91,
			m: 11,
			k: 41,
			arr: {
				yA: [],
				C1: [],
				yAkq: [],
				C1xA: [],
				C1xAq: [],
			},
			yAkq: '',
			C1xA: '',
			C1xAq: '',
			m2: ''
		},
		computed: {
			run: function() {
				this.q = parseInt(this.q);
				this.g = parseInt(this.g);
				this.xA = parseInt(this.xA);

				if(
					isNaN(this.q) ||
					isNaN(this.g) ||
					isNaN(this.xA)
				) {return false;}

				this.arr.yA = mod(this.g, this.xA, this.q);
				this.yA = this.arr.yA[this.arr.yA.length - 1].le;

				this.arr.C1 = mod(this.g, this.k, this.q);
				this.C1 = this.arr.C1[this.arr.C1.length - 1].le;

				this.arr.C2 = mod(this.yA, this.k, this.q, this.m);
				this.C2 = this.arr.C2[this.arr.C2.length - 1].le;

				this.arr.C1xA = mod(this.C1, this.xA, this.q);
				this.C1xA = this.arr.C1xA[this.arr.C1xA.length - 1].le;

				this.arr.C1xAq = modulo(this.C1xA, this.q);

				this.C1xAq = this.arr.C1xAq[this.arr.C1xAq.length - 1].b2;
				if(this.C1xAq < 0) this.C1xAq += this.q;

				this.m2 = (this.C2 * this.C1xAq) % this.q;
				return true;
			}
		}
	});
</script>
