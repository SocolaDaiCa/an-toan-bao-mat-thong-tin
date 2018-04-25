<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-24 14:00:36
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-25 08:13:25
 */
?>
	<div class="container-fluid" id="can-nguyen-thuy">
		<h3>Căn nguyên thủy</h3>
		Ta có: a <sup>x</sup> mod b = c => log <sub>a</sub>(c) mod b = x
		<input type="text" v-model="a" size="1"> có là căn nguyên thủy của
		<input type="text" v-model="b" size="1"> không ?

		<can-nguyen-thuy-template :items="arr.output"></can-nguyen-thuy-template>
		<br>{{a}} <span v-if="checkCanNguyenThuy != true">không</span> là căn nguyên thủy của {{b}}
	</div>
	<script>
	'use strict';
	const canNguyeThuyApp = new Vue({
		el: '#can-nguyen-thuy',
		data: {
			a: 2,
			b: 4,
			arr: {
				output: []
			}
		},
		methods: {

		},
		computed: {
			checkCanNguyenThuy: function() {
				this.a = parseInt(this.a);
				this.b = parseInt(this.b);

				if(isNaN(this.a) || isNaN(this.b)){
					return false;
				}
				this.arr.output = canNguyenThuy(this.a, this.b);

				return checkCanNguyenThuy(this.a, this.b);
			}
		}
	});
	</script>
