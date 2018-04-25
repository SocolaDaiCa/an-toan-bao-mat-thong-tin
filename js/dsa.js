/*
 * @Author: Socola
 * @Date:   2018-04-23 07:09:01
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-24 22:48:52
 */
'use strict';
const dsa = new Vue({
	el: "#dsa",
	data: {
		p: 47,
		q: 23,
		h: 11,
		g: 0,
		xA: 9,
		hM: 12,
		k: 7,
		k_: '',
		gkp: '',
		r: '',

		arr: {
			g: [],
			gkp: [],
		},
		/* kiểm tra chữ ký*/
		s: '',
		W: '',
		U1: '',
		U2: '',
		V: '',
		gU1: '',
		yU2: '',
	},
	method: {
		mod: function(a, x, b) {
			return mod(a, x, b);
		}
	},
	computed: {
		run: function() {
			this.p = parseInt(this.p);
			this.q = parseInt(this.q);
			this.h = parseInt(this.h);
			this.k = parseInt(this.k);
			this.hM = parseInt(this.hM);

			var x = !(
				isNaN(this.p) ||
				isNaN(this.q) ||
				isNaN(this.h) ||
				isNaN(this.k) ||
				isNaN(this.hM)
			);
			console.log(`p:${this.p}, q:${this.q}, h:${this.h}, k:${this.k}`);
			console.log(x);
			if (!x) {return false;}

			try {
				this.g = Math.pow(this.h, (this.p - 1) / this.q) % this.p;

				if (!Number.isInteger(this.g)) {console.log(`g: ${this.g}`);return false;}

				this.arr.yA = mod(this.g, this.xA, this.p);
				this.yA = this.arr.yA[this.arr.yA.length - 1].le;
				if (!Number.isInteger(this.yA)) {console.log(`yA: ${this.yA}`);return false;}

				this.arr.gkp = mod(this.g, this.k, this.p);
				this.gkp = this.arr.gkp[this.arr.gkp.length - 1].le;
				if (!Number.isInteger(this.gkp)) {console.log(`gkp: ${this.gkp}`);return false;}

				this.r = this.gkp % this.q;
				if (!Number.isInteger(this.r)) {console.log(`r: ${this.r}`); return false; }

				this.k_ = modulo(this.k, this.q).pop().b2;
				if (!Number.isInteger(this.k_)) {console.log(`k_: ${this.k_}`); return false; }
				if (this.k_ < 0) this.k_ = this.q + this.k_;

				this.s = ((this.xA * this.r + this.hM) * this.k_) % this.q;
				// console.log(`${this.hM} ${this.xA} ${this.r} ${this.k_} ${this.q}`);
				if (!Number.isInteger(this.s)) {console.log(`s: ${this.s}`); return false; }

				this.W = modulo(this.s, this.q).pop().b2;
				if (!Number.isInteger(this.W)) {console.log(`W: ${this.W}`); return false; }
				if (this.W < 0) this.W = this.q + this.W;

				this.U1 = (this.hM * this.W) % this.q;
				if (!Number.isInteger(this.U1)) {console.log(`U1: ${this.U1}`); return false; }
				this.U2 = (this.r * this.W) % this.q;
				if (!Number.isInteger(this.U2)) {console.log(`U2: ${this.U2}`); return false; }
				this.gU1 = mod(this.g, this.U1, this.p).pop().le;
				if (!Number.isInteger(this.gU1)) {console.log(`gU1: ${this.gU1}`); return false; }
				this.yU2 = mod(this.yA, this.U2, this.p).pop().le;
				if (!Number.isInteger(this.yU2)) {console.log(`yU2: ${this.yU2}`); return false; }
				this.V = ((this.gU1 * this.yU2) % this.p) % this.q;
				if (!Number.isInteger(this.V)) {console.log(`V: ${this.V}`); return false; }
			} catch (e) {
				console.log(e);
				return false;
			}
			return true;
		}
	}
});
