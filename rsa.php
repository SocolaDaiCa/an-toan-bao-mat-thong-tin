<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-24 07:25:12
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-26 07:02:47
 */
?>
	<div class="container-fluid" id="rsa">
		<h3>RSA</h3>
		p =
		<input type="text" size="1" v-model="p">, q =
		<input type="text" size="1" v-model="q">
		<br> N = ?, phi(N) = ?
		<br> A chọn e =
		<input type="text" size="1" v-model="e">
		<br> K
		<sub>prA</sub>, d = ?, K<sub>puA</sub> = ?
		<br> Kịch bản M
		<input type="text" v-model="M" size="1">
		<template v-if="run">
			<br>- Ta có N = p * q = {{p}} * {{q}} = {{N}}
			<br> phi(N) = (p - 1) * (q - 1) = {{p - 1}} * {{q - 1}} = {{phiN}}
			<br>d = e<sup>-1</sup> mod phi(N)
			<br>&nbsp;&nbsp; = {{e}}<sup>-1</sup> mod {{phiN}}
			<br>&nbsp;&nbsp; = {{d}}
			<br>Dùng thuật toán Ơclit mở rộng: gcd(a, b) = gcd(b, a mod b)
			<br>K<sub>prA</sub> = {d, p, q} = { {{d}}, {{p}}, {{q}} }
			<br>K<sub>puA</sub> = {e, N} = { {{e}}, {{N}} }
			<br>
			<br>Kịch bản 1: M = {{M}}
			<br> B mã M bằng khóa K<sub>puA</sub> và gửi cho A
			<br>
			<br>
			<br> C = M<sup>e</sup> mod N
			<br> = {{M}}<sup>{{e}}</sup> mod {{N}}
			<mod-template :items="arr.C" :p="N"></mod-template>
			<br>- A giải mã:
			<br>M = C<sup>d</sup> mod N
			<br> = {{C}}<sup>{{d}}</sup> mod {{N}}
			<mod-template :items="arr.M2" :p="N"></mod-template>
			<br> => Chữ ký <span v-if="M != M2">không</span> được xác minh.
		</template>
	</div>
	<script>
	'use strict';
	var rsa = new Vue({
		el: "#rsa",
		data: {
			p: 19,
			q: 29,
			e: 41,
			N: '',
			phiN: '',
			M: 5,
			d: '',
			arr: {
				C: [],
				d: [],
				M2: []
			},
			M2: ''
		},
		methods: {

		},
		computed: {
			run: function() {
				this.p = parseInt(this.p);
				this.q = parseInt(this.q);
				this.e = parseInt(this.e);
				this.M = parseInt(this.M);

				var x = !(
					isNaN(this.p) ||
					isNaN(this.q) ||
					isNaN(this.e)
				);
				if (!x) { console.log('er'); return false; }
				this.N = this.p * this.q;
				this.phiN = (this.p - 1) * (this.q - 1);
				this.arr.d = modulo(this.e, this.phiN);
				this.d = this.arr.d[this.arr.d.length - 1].b2;
				if (this.d < 0) { this.d = this.phiN + this.d; }
				this.arr.C = mod(this.M, this.e, this.N);
				this.C = this.arr.C[this.arr.C.length - 1].le;

				this.arr.M2 = mod(this.C, this.d, this.N);
				this.M2 = this.arr.M2[this.arr.M2.length - 1].le;
				return true;
			}
		}
	});

	</script>
