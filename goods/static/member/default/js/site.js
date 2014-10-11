function reSizeImg() {
	var imgs = $('img[data-type=1]');
	if (imgs) {
		var maxWidth = 70;  
        var maxHeight = 70;  
        var zoomTimes;
		imgs.each(function(index, item) {
			var curWidth = $(this).width();
			var curHeight = $(this).height();
			if (curWidth > maxWidth) {
				$(this).width(maxWidth);
				zoomTimes = curWidth / maxWidth;
				$(this).height(curHeight / zoomTimes);
			} else if (curHeight > maxHeight) {
				$(this).height(maxHeight);
				zoomTimes = curHeight / maxHeight;
				$(this).width(curWidth / zoomTimes);
			}

		});
	}
}