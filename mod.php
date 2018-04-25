<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-25 07:36:18
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-25 10:37:15
 */
?>
<div class="container-fluid" id="mod">
	<input type="text" v-model="a" size="1"> <sup><input type="text" v-model="b" size="1"></sup> mod <input type="text" v-model="c" size="1"> = {{output}}
	<br>
	<mod-template :items="arr.res" :p="c"></mod-template>
</div>
<script>
	const modApp = new Vue({
		el: '#mod',
		data: {
			a: 3,
			b: 101,
			c: 809,
			arr: {
				res: []
			}
		},
		computed: {
			output: function() {
				this.a = parseInt(this.a);
				this.b = parseInt(this.b);
				this.c = parseInt(this.c);

				if(
					isNaN(this.a) ||
					isNaN(this.b) ||
					isNaN(this.c)
				){ return '???'}

				this.arr.res = mod(this.a, this.b, this.c);
				return this.arr.res[this.arr.res.length - 1].le;
			}
		}
	})
</script>
