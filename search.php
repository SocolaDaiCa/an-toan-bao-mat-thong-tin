<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-26 05:46:21
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-26 06:12:08
 */
?>
	<div class="container-fluid" id="search">
		<input type="text" class="form-control" v-model="q">
		<ul>
			<li v-for="item in res">
				<b>{{item.quiz}}</b>
				<br> {{item.answer}}
			</li>
		</ul>
	</div>
	<script>
		const searchApp = new Vue({
			el: '#search',
			data: {
				q: '',
				bank: []
			},
			computed:{
				res: function() {
					return this.bank.filter((item) => {
						return item.quiz.toLowerCase().search(this.q.toLowerCase()) != -1;
					});
				}
			},
			created: function() {
				$.getJSON('bank.json', (res) => {
					this.bank = res;
				})
			}
		});
	</script>
