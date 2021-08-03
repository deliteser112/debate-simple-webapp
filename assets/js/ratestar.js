function ratingStar(star){
	star.click(function(){
		var stars = $('.ratingW').find('li')
		stars.removeClass('on');
		var thisIndex = $(this).parents('li').index();
		for(var i=0; i <= thisIndex; i++){
			stars.eq(i).addClass('on');
		}
    putScoreNow(thisIndex+1);
	});
}

function putScoreNow(i){
  $('.scoreNow').html(i);
  $('#score').attr('value', i);
}


$(function(){
	if($('.ratingW').length > 0){
			ratingStar($('.ratingW li a'));
	}
});