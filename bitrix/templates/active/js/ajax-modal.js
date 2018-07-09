function fileUploadSetName(el) {
	var filename = $(el).val();
	if (filename.substring(3, 11) == 'fakepath') {
		filename = filename.substring(12);
	}
	$("#upload-file-info").html(filename);
}

function hideModal(timeout) {
	timeout = timeout ? timeout : 3000;

	setTimeout(function() {
		$('.modal_ajax').modal('hide');
	}, timeout);
}

$(document).ready(function() {

	// MODAL AJAX
	var $modal = $('.modal_ajax');
	var $modalContent = $modal.find('.modal-content');

	function modalLoading() {
		$modal.removeClass('loaded').addClass('loading');
	}

	function modalLoaded() {
		$modal.removeClass('loading').addClass('loaded');
	}

	$modal.on('hidden.bs.modal', function(e) {
		$modal.removeClass('loaded');
		$modalContent.html('');
	});

	$(document).on('click', '.js_ajax_modal', function() {
		var self = $(this);

		$modal.modal('show');
		modalLoading();

		var params;
		try {
			params = JSON.parse(self.attr('data-params'));
		} catch (e) {
			params = '';
		}

		$.get(self.attr('data-href'), params)
			.done(function(data) {
				$modalContent.html(data);
				modalLoaded();
			})
			.fail(function() {
				$modalContent.html('<div class="modal-header bg-danger text-danger">' + 'Error' + '</div>');
				modalLoaded();
			});
	});

	// MODAL MOBILE FILTER
	var $f = $('.smartfilter');
	var $fsc = $('.bx-filter-section .panel-body');
	var $fm = $('#filter_mobile_modal');
	var $fmc = $('#filter_mobile_modal .modal-body');

	$fm.on('show.bs.modal', function(e) {
		$f.appendTo($fmc);
	});

	$fm.on('hidden.bs.modal', function(e) {
		$f.appendTo($fsc);
	});

	$(window).smartresize(function(event) {
		if (window.matchMedia("screen and (min-width: 768px)").matches) {
			$fm.modal('hide');
		}
	});
});
