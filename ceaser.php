<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-25 07:07:40
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-25 07:32:25
 */
?>
	<div class="container-fluid" id="ceaser">
		C = e(p) = (p + k) mod (26)
		<br> k = <input type="text" v-model="k" size="1">
		<br>Đoạn cần mã hóa <input type="text" v-model="input" size="1">
		<br> Kết quả: {{output}}
	</div>
	<script>
	'use strict';
	const censarApp = new Vue({
		el: '#ceaser',
		data: {
			k: 3,
			input: 'Anh'
		},
		methods: {

		},
		computed: {
			output: function() {
				this.k = parseInt(this.k);

				if(!Number.isInteger(this.k)) {return '???';}

				return this.input.toUpperCase().split('').map((item) => {
					item = item.charCodeAt(0) + this.k;
					if(item > 'Z'.charCodeAt(0)){
						item -= 26;
					}
					return String.fromCharCode(item);
				}).join('');
			}
		}
	});

	</script>
