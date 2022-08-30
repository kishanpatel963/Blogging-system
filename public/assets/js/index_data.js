var showsOffset = showViewLimitOffset
$(window).data("ajaxcalled", true).scroll(function(){
	if ($(window).data("ajaxcalled") != false && $(window).scrollTop() == $(document).height() - $(window).height() && isMoreShowsExists === 'true') {
		$(".showsLoader").css('display','block'), $(window).data("ajaxcalled", false);
		var url = $('#blogData').data("url") + "?offset=" + showsOffset;
		var sort = $('#sort_selected').find(":selected").val();
		$.ajax({
			url: url,
			type: "GET",
			data: {
				sort : sort
			},
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
			},
			success: function(e) {
				$(".showsLoader").css('display','none'),"success" === e.status ? ($("#blogData .container").append(e.view), showsOffset += showViewLimitOffset, 0 === e.isMoreShowsExists && (isMoreShowsExists = "false")) : isMoreShowsExists = "false", $(window).data("ajaxcalled", !0)
			},
			error: function(e) {
				$(".showsLoader").css('display','none');

			}
		})
	}
});


$(document).on('click', '.deleteBlogPost', function () {
	var id = $(this).data('id');     
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: '/blog-delete/'+ id,
		method: "DELETE",
		dataType: "json",
		success: function (data) {
			if (data.status == 'success') {
				$("#alertData").text(data.message);
				$("#alertBox").css('display','block')
				setTimeout(() => {
					$("#alertBox").css('display','none');
					location.reload();
				}, 2000);
			}
		}
	});
});


$(document).on('change', '#sort_selected', function () {
	var url = $('#pub_filter').data('action');
	var sort = $('#sort_selected').find(":selected").val();
	isMoreShowsExists = "true";
	showsOffset = showViewLimitOffset;
	var that = this;   
	$("#blogData .container").html('');
	$(this).attr('disabled',true);
	$.ajax({
		url: url,
		type: "GET",
		data: {
			sort : sort
		},
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
		},
		success: function (data) {
			$(that).attr('disabled',false);
			$(that).attr('data-filter','ASC');     
			if (data.status == 'success') {
				$("#alertData").html('<i class="fa fa-filter" aria-hidden="true"></i>Get Older By Publication Date');
				$("#blogData .container").html(data.view)
				$('#pub_filter').attr('data-is-called','1');
			}
		}
	});
});