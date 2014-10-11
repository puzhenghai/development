function uploadFile(url, id, csrf) {
	$.ajaxFileUpload({
		url : url,
		secureuri : false,
		elementId : id,
		dataType : 'json',
		data : {
			name : 'goods_master_image',
			id : id,
			_csrf : csrf
		},
		success:function(data) {
			if (data.status) {
				insertImg(data);
			}
		},
		error:function(data) {
			alert(22)
		}
	});
}

function insertImg(data) {
	$('#demo li').each(
		function(index, item) {
			if (!$(item).hasClass('has-img')) {
				$(item).addClass('has-img');
				$(item).children('.examp').find('input[type="hidden"]')
						.val(data.path);
				$(item).children('.examp').find('img').attr('src',
						data.path);
				$(item).children('.examp').find('.mask').hide();
				$(item).children('.examp').find('.desc').hide();
				$(item).mouseover(function() {
					$(item).addClass('img-hover');
				});
				$(item).mouseout(function() {
					$(item).removeClass('img-hover');
				});
				return false;
			}
			;
		});
}

function moveImg() {
	$('#demo li').each(function(index, item) {
		$(item).children('.operate').find('.toleft').click(function() {
			var cur = $(item);
			var nex = $(item).prev();
			cur.insertBefore(nex);
		});

		$(item).children('.operate').find('.toright').click(function() {
			var cur = $(item);
			var nex = $(item).next();
			nex.insertBefore(cur);
		});

		$(item).children('.operate').find('.del').click(function() {
			var cur = $(item).children('.examp');
			var path = $(item).children('.preview').find('img').attr('src');
			cur.find('input[type="hidden"]').val(path);
			cur.find('img').attr('src', path);
			cur.find('.desc').show();
			cur.find('.mask').show();
			$(item).removeClass('has-img');
			$(item).unbind('mouseover');
		});

	});

	$('.multimage-tabs').children('span').each(function(index, item) {
		$(item).click(function() {
			if (!$(item).hasClass('actived')) {
				$('.tab').removeClass("actived");
				$(item).addClass('actived');
				$('.panel').hide();
				$('.panel').get(index).style = "display:block";
			}
		});
	});
}
