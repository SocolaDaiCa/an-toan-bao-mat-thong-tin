<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-24 23:03:32
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-24 23:14:44
 */
?>
	<div class="container-fluid" id="gcd">
		gcd(
		<input type="text" size="1" v-model="a">,
		<input type="text" size="1" v-model="b">) = {{c}}
	</div>
	<script>
	'use strict';
	const gcdApp = new Vue({
		el: '#gcd',
		data: {
			a: 1,
			b: 1,
		},
		methods: {

		},
		computed: {
			c: function() {
				this.a = parseInt(this.a);
				this.b = parseInt(this.b);

				if (!Number.isInteger(this.a) || !Number.isInteger(this.b)) {
					return 'err';
				}
				if (this.a * this.b === 0) {
					return 'infinity';
				}
				console.log('x');
				return gcd(this.a, this.b);
			}
		}
	})

	</script>
