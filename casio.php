<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-25 22:36:23
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-26 05:45:02
 */
?>
<style>
	#casio{
		/*position: fixed;*/
		height: 100vh;
		/*z-index: 100;*/
		/*top: 0px;
		left: 0px;
		bottom: 0px;
		right: 0px;*/
		background: white;
		/*max-width: 500px;*/
	}
	#casio input{
		height: 12.5%;
	}
	#casio button{
		width: 25%;
		height: 12.5%;
	}
</style>
<div id="casio">
	<input type="text" disabled class="form-control" v-model="input">
	<input type="text" disabled class="form-control" v-model="output">
	<template v-for="row in layout">
		<button class="btn btn-primary" v-for="item in row" v-on:click="click(item)">{{item}}</button>
	</template>
</div>
<script>
	'use strict';
	const casioApp = new Vue({
		el: '#casio',
		data: {
			layout: [
				[, , '<', ','],
				['Math.pow(', 'Math.sqrt(', 'Math.abs(', ')'],
				[7, 8, 9, '+'],
				[4, 5, 6, '-'],
				[1, 2, 3, '*'],
				['(', '0', '.', '/'],
			],
			input: '',
			output: '',
		},
		methods: {
			click: function(key) {
				if(key == '<'){
					this.input = this.input.split('');
					this.input.pop();
					this.input = this.input.join('');
					return;
				}
				this.input += key;
				this.output = eval(this.input);
			}
		}
	})
</script>
