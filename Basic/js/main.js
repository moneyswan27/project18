/* 1. 디바이스 사이즈 체크 */
$devWidth = $("body").width();	// 문서의 <body> 영역이 갖는 너비 구하기
$(window).resize(function(){
	$devWidth = $("body").width();
	// console.log($devWidth);
})

