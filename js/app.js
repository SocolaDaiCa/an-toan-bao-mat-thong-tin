/*
 * @Author: Socola
 * @Date:   2018-04-24 13:47:17
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-25 21:43:02
 */
'use strict';

function modulo(a, b) {
	var res = [];
	var row = { q: '', a1: 1, a2: 0, a3: b, b1: 0, b2: 1, b3: a };
	res.push({ ...row });
	var i = 0;
	while (row.b3 > 1) {
		var rowLast = { ...row };
		row.q = parseInt(rowLast.a3 / rowLast.b3);
		row.a1 = rowLast.b1;
		row.a2 = rowLast.b2;
		row.a3 = rowLast.b3;
		row.b1 = rowLast.a1 - row.q * rowLast.b1;
		row.b2 = rowLast.a2 - row.q * rowLast.b2;
		row.b3 = rowLast.a3 % rowLast.b3;
		res.push({ ...row });
		if (i++ > 10000) {
			break;
		}
	}

	return res;
}

function mod(a, x, b, le = 1) {
	// /* a mũ x mod b*/
	var res = [];
	var i = 0;
	if (a < b && x > 1) {
		while (a < b && x > 1) {
			if(x % 2 == 1){
				le = (le * a) % b;
			}
			x = parseInt(x / 2);
			a = (a * a) % b;
			res.push({ le, a, x });
		}
	}

	while (x > 0) {
		var duMin = b;
		let du = 1;
		let bac = 0;

		res.push({ le, a, x });
		for (let i = 1; i <= x; i++) {
			du = (du * a) % b;
			if (duMin >= du) {
				duMin = du;
				bac = i;
			}
		}
		x -= bac;
		le = (le * duMin) % b;
		if (x == 0) a = 1;
		res.push({ le, a, x });

		if (i++ > 100) break;
	}
	return res;
}

function gcd(a, b) {
	while (a !== 0) {
		if (a < b) {
			[a, b] = [b, a];
		}
		a %= b;
	}
	return b;
}

function canNguyenThuy(a, b) {
	var res = [];
	for (let i = 1; i < b; i++) {
		res.push({
			a,
			x: i,
			b,
			c: mod(a, i, b).pop().le
		});
	}
	return res;
}

function logaritRoiRac(a, b) {
	var res = [];
	for (let i = 1; i < b; i++) {
		var x;
		x = canNguyenThuy(a, b).filter((item) => {
			return item.c == i;
		});
		if (x.length != 0) {
			x = x.pop().x;
		} else {
			x = 'not found';
		}
		res.push({ a, c: i, b, x });
	}
	return res;
}

function checkCanNguyenThuy(a, b) {
	var check = {};
	for (let i = 0; i < b; i++) check[i] = 0;
	canNguyenThuy(a, b).forEach(function(item) {
		check[item.c]++;
	});
	for (let i = 1; i < b; i++) {
		if (check[i] != 1) return false;
	}
	return true;
}
Vue.component('mod-template', {
	props: ['items', 'p'],
	'template': `
	<template v-for="(index, item) in items">
		<template v-if="index == items.length - 1">
			<br>&nbsp;&nbsp;&nbsp; = {{item.le}}
		</template>
		<template v-else>
			<br>&nbsp;&nbsp;&nbsp; = <span v-if="item.le>1">{{item.le}}*</span>{{item.a}}<sup v-if="item.x > 1">{{item.x}}</sup> mod {{p}}
		</template>
	</template>
	`
});
Vue.component('modulo-template', {
	props: ['items'],
	template: `
	<table class="table table-bordered table-hover" style="width: auto">
		<thead>
			<tr>
				<th>Q</th>
				<th>A1</th>
				<th>A2</th>
				<th>A3</th>
				<th>B1</th>
				<th>B2</th>
				<th>B3</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in items">
				<td>{{item.q}}</td>
				<td>{{item.a1}}</td>
				<td>{{item.a2}}</td>
				<td>{{item.a3}}</td>
				<td>{{item.b1}}</td>
				<td>{{item.b2}}</td>
				<td>{{item.b3}}</td>
			</tr>
		</tbody>
	</table>
	`
})
Vue.component('can-nguyen-thuy-template', {
	props: ['items'],
	template: `
	<ul>
		<li v-for='item in items'>{{item.a}}<sup>{{item.x}}</sup> mod {{item.b}} = {{item.c}}</li>
	</ul>
	`
});
Vue.component('logarit-roi-rac-template', {
	props: ['items'],
	template: `
	<ul>
		<li v-for="item in items">log<sub>{{item.a}}</sub>({{item.c}}) mod {{item.b}} = {{item.x}}</li>
	</ul>
	`
})
const app = new Vue({
	el: '#app',
})
