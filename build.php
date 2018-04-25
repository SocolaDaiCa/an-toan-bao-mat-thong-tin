<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-25 21:10:25
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-25 21:12:13
 */
	$html = file_get_contents('http://an-toan-bao-mat-thong-tin.devv/index-code.php');
	file_put_contents('index.html', $html);
?>
