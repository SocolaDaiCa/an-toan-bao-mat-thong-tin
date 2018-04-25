<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-25 08:15:33
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-25 09:05:59
 */
?>
<div class="container-fluid" id="logarit-roi-rac">
	Ta có: a <sup>x</sup> mod b = c => log <sub>a</sub>(c) mod b = x
	<br> log <sub><input type="text" size="1" v-model="a"></sub>(c) mod <input type="text" size="1" v-model="b"> = x
	<logarit-roi-rac-template :items="res"></logarit-roi-rac-template>
</div>
<script>
	'use strict';
	const logaritRoiRacApp = new Vue({
		el: '#logarit-roi-rac',
		data: {
			a: 2,
			b: 9,
		},
		computed: {
			res: function() {
				this.a = parseInt(this.a);
				this.b = parseInt(this.b);

				if(isNaN(this.a) || isNaN(this.b)){
					console.log('lỗi');
					return [];
				}
				return logaritRoiRac(this.a, this.b);
			}
		}
	});
</script>
