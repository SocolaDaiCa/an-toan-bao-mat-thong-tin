/*
 * @Author: Socola
 * @Date:   2018-04-24 12:13:51
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-24 21:41:35
 */
'use strict';
var nghichDaoModulo = new Vue({
	el: "#nghich-dao-modulo",
	data: {
		a: 16,
		b: 53
	},
	methods: {

	},
	computed: {
		run: function() {
			this.a = Number(this.a);
			this.b = Number(this.b);

			var check = !(
				isNaN(this.a) ||
				isNaN(this.b)
			);
			if (!check) { return false; }

			return true;
		},
		res: function() {
			return modulo(this.a, this.b);
		}
	}
});
