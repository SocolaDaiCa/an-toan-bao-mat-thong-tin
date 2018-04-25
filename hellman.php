<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-24 21:28:17
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-25 20:40:28
 */
?>
	<div class="container-fluid" id="hellman">
		q =
		<input type="text" v-model="q" size="1">, anpha =
		<input type="text" v-model="anpha" size="1">
		<br> x<sub>A</sub> =
		<input type="text" v-model="xA" size="1">, y<sub>A</sub> = ?
		<br>x<sub>B</sub> =
		<input type="text" v-model="xB" size="1">, y<sub>B</sub> = ?
		<br>A tính k<sub>AB</sub>? B tính k<sub>AB</sub>?
		<template v-if="run">
			<br><b><u>Giải</u></b>
			<br>- Ta có:
			<br>y<sub>A</sub> = anpha<sup>x<sub>A</sub></sup> mod q
			<br> = {{anpha}}<sup>{{xA}}</sup> mod {{q}}
			<mod-template :items="arr.yA" :p="q"></mod-template>
			<br>
			<br>y<sub>B</sub> = anpha<sup>x<sub>B</sub></sup> mod q
			<br>&nbsp;&nbsp;&nbsp; = {{anpha}}<sup>{{xB}}</sup> mod {{q}}
			<mod-template :items="arr.yB" :p="q"></mod-template>
			<br>
			<br>- A tính k<sub>AB</sub> =y<sub>B</sub><sup>x<sub>A</sub></sup> mod q
			<br>&nbsp;&nbsp;&nbsp; = {{yB}}<sup>{{xA}}</sup> mod {{q}}
			<mod-template :items="arr.kAB" :p="q"></mod-template>
			<br>
			<br>- B tính k<sub>AB</sub> =y<sub>A</sub><sup>x<sub>B</sub></sup> mod q
			<br>&nbsp;&nbsp;&nbsp; = {{yA}}<sup>{{xB}}</sup> mod {{q}}
			<mod-template :items="arr.kBA" :p="q"></mod-template>
		</template>
	</div>
	<script>
	'use strict';
	const hellManApp = new Vue({
		el: '#hellman',
		data: {
			q: 809,
			anpha: 3,
			xA: 101,
			xB: 83,
			arr: {
				xA: [],
				yA: [],
				kAB: [],
				kBA: [],
			},
			yA: '',
			yB: '',
			kAB: '',
			kBA: '',
		},
		computed: {
			run: function() {
				this.q = parseInt(this.q);
				this.anpha = parseInt(this.anpha);
				this.xA = parseInt(this.xA);
				this.xB = parseInt(this.xB);

				if (
					isNaN(this.q) ||
					isNaN(this.anpha) ||
					isNaN(this.xA) ||
					isNaN(this.xB)
				) {console.log('fal'); return false; }

				this.arr.yA = mod(this.anpha, this.xA, this.q);
				this.yA = this.arr.yA[this.arr.yA.length - 1].le;

				this.arr.yB = mod(this.anpha, this.xB, this.q);
				this.yB = this.arr.yB[this.arr.yB.length - 1].le;

				this.arr.kAB = mod(this.yB, this.xA, this.q);
				this.arr.kBA = mod(this.yA, this.xB, this.q);

				return true;
			}
		}
	});

	</script>
