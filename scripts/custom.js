var now = new Date();
$(document).ready(function(){//Prices module
	if(originalPrice[0] === '<') originalPrice=900;
	if(discount[0] === '<') discount=50;
	if(newPrice[0] === '<') newPrice=499;
	if(discountEndDate[0] === "<") discountEndDate=now.getDate()+'.'+(now.getMonth()+1)+'.'+now.getFullYear();
	if(discountEndTime[0] === "<") discountEndTime='00:00';
	if(newPrice.length === 0) newPrice=(parseFloat(originalPrice)/100)*parseFloat(discount);

	$('.original-price-value').html(originalPrice);
	$('.discount-value').html(discount);
	$('.new-price-value').html(newPrice);
});

$(document).ready(function(){//Gallery module
	$('#screen-5 li img').on('click', function(){
		var src = $(this).attr('src');
		var img = '<img src="' + src + '" class="img-responsive"/>';
		$('#gallery-modal').on('shown.bs.modal', function(){
			$('#gallery-modal .modal-body').html(img);
		});
		$('#gallery-modal').on('hidden.bs.modal', function(){
			$('#gallery-modal .modal-body').html('');
		});
		$('#gallery-modal').modal();
	});
});

var order;
$(document).ready(function(){//Order module
	jQuery(function($){
		$("#phone, #special-phone").mask("+38 (099) 99-99-999");
	});

	$('#order, #special-order').click(function(){
		var prefix='';
		if(this.id === 'special-order') prefix='special-';

		if($('#'+prefix+'name').val() !== '' && $('#'+prefix+'phone').val() !== '' && $('#'+prefix+'surname').val() !== ''){
			alert('Спасибо, Ваш заказ принят!');
			$('#'+prefix+'form').submit();
		}
		else{
			alert('Заполните все поля формы.');
		}
	});
	order=function(){
		$('body').animate({'scrollTop': $('#screen-9').offset().top}, 500);
	};
	$('.order:not("#special-order")').click(order);
});

function discountTimer(){
	$timer=$('.discount-timer');
	now=new Date();
	var end={
		'date': discountEndDate,
		'time': discountEndTime,
	};
	var endDate=new Date(end.date.split('.')[2], end.date.split('.')[1]-1, end.date.split('.')[0], end.time.split(':')[0], end.time.split(':')[1]);
	var left={
		'days': (parseInt((endDate.getTime()-now.getTime())/1000/60/60/24, 0)+1).toString(),
		'hours': ((parseInt((endDate.getTime()-now.getTime())/1000/60/60, 0))%24).toString(),
		'minutes': ((parseInt((endDate.getTime()-now.getTime())/1000/60))%60).toString(),
		'seconds': ((parseInt((endDate.getTime()-now.getTime())/1000))%60).toString()
	};
	if(parseInt(endDate.getTime()-now.getTime()) < 0){
		clearInterval(timerUpdate);
		left.days='00';
		left.hours='00';
		left.minutes='00';
		left.seconds='00';
	}
	for(var i in left){
		left[i]=((left[i].length==1)?'0':'')+left[i];
	}
	$timer.find('.days .left').html(left.days[0]);
	$timer.find('.days .right').html(left.days[1]);
	$timer.find('.hours .left').html(left.hours[0]);
	$timer.find('.hours .right').html(left.hours[1]);
	$timer.find('.minutes .left').html(left.minutes[0]);
	$timer.find('.minutes .right').html(left.minutes[1]);
	$timer.find('.seconds .left').html(left.seconds[0]);
	$timer.find('.seconds .right').html(left.seconds[1]);
}
discountTimer();
var timerUpdate=setInterval(discountTimer, 1000);

var videoResettingDelay=5;
var videoResetting=0;
var videoRunning=false;
$(document).ready(function(){//Video module
	var $video=$('video');
	function videoClick(){
		clearTimeout(videoResetting);
		videoRunning?pause($video[0]):play($video[0]);
	}
	function play(){
		$video[0].play();
		videoRunning=true;
		clearTimeout(videoResetting);
	}
	function pause(){
		$video[0].pause();
		videoRunning=false;
		clearTimeout(videoResetting);
	}

	$('video').click(videoClick);

	$('#navbar-collapse-btn').on('activate.bs.scrollspy', function(){
		if($('li.active a').attr('href') === '#screen-4'){
			play();
		}
		else{
			pause();
			videoResetting=setTimeout(function(){
				$video[0].currentTime=0;
			}, videoResettingDelay*1000);
		}
	});
});