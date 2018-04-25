<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-24 12:11:28
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-24 21:41:45
 */
?>
<div class="container-fluid" id="nghich-dao-modulo">
	<h3>Nghịch đảo modulo</h3>
	<input type="text" v-model="a" size="1"><sup>-1</sup> mod <input type="text" v-model="b" size="1">
	<br><br>
	<template v-if="run">
		<modulo-template :items="res"></modulo-template>
	</template>
</div>
<script src="js/nghich-dao-modulo.js"></script>
